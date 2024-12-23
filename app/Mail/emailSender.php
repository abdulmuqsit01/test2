<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (env('MAIL_NOTIFICATION_METHOD') == 'user_only' and $this->data['tujuan']) {
            $tujuan = $this->data['tujuan'];
        } else if (env('MAIL_NOTIFICATION_METHOD') == 'instance_only' and $this->data['instanceEmail']) {
            $tujuan =  $this->data['instanceEmail'];
        } else if (env('MAIL_NOTIFICATION_METHOD') == 'both') {
            if ($this->data['instanceEmail']) {
                $tujuan = [$this->data['tujuan'], $this->data['instanceEmail']];
            } else {
                $tujuan = $this->data['tujuan'];
            }
        }

        return $this
            ->from([env('MAIL_FROM_ADDRESS')])
            ->subject('Pos Pintar Digides - Registrasi Program')
            ->to($tujuan)
            ->view('email.view');
    }
}
