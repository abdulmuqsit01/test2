<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmailController as EmailController;
use App\Models\EmailModel;
use Carbon\Carbon;
use Exception;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mail-cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is command for cron job email sender';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (env('MAIL_ENABLED') == true) {
            $queryEmail = 'select * from table_email where status = "pending" or status = "failed"';
            $emailData = DB::select($queryEmail);

            foreach ($emailData as $item) {
                $queryUpdate = 'UPDATE table_email SET status="sending",email_send_attempts_count=email_send_attempts_count+1 where id=?';
                DB::statement($queryUpdate, [$item->id]);
            }

            foreach ($emailData as $item) {
                try {
                    $sendEmailController = new EmailController($item);
                    $sendEmailController->mutate_send_email();
                } catch (Exception $th) {
                    $queryUpdate = 'UPDATE table_email SET status="failed" where id=?';
                    DB::statement($queryUpdate, [$item->id]);
                }

                $this->info("Sent email to: " . $item->destination_email);
            }
        }
    }
}
