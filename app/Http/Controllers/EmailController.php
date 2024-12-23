<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailSender;
use App\Models\EmailModel;
use Carbon\Carbon;
use App\Http\Controllers\mutate_send_email as mutate_send_email;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function mutate_send_email()
    {
        $data = [
            'tujuan' => $this->emailData->destination_email,
            'url' => $this->emailData->url,
            'alamat' => $this->emailData->alamat,
            'nama' => $this->emailData->nama,
            'no_hp' => $this->emailData->no_hp,
            'program' => $this->emailData->program,
            'instansi' => $this->emailData->instansi,
            'call_center' => $this->emailData->call_center,
            'instanceEmail' => $this->emailData->instanceEmail
        ];

        Mail::send(new emailSender($data));

        if (Mail::failures()) {
            Log::info("email failed to send to: " . $this->emailData->destination_email);

            $queryUpdate = 'UPDATE table_email SET status="failed" where id=?';
            DB::statement($queryUpdate, [$this->emailData->id]);
        } else {
            Log::info("email sended to: " . $this->emailData->destination_email);

            $queryUpdate = 'UPDATE table_email SET status="sended",sended_at=? where id=?';
            DB::statement($queryUpdate, [Carbon::now('Asia/Jakarta'), $this->emailData->id]);
        }
    }
}
