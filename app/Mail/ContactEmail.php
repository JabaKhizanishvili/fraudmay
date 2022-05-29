<?php
/**
 *  app/Mail/ContactEmail.php
 *
 * User:
 * Date-Time: 21.12.20
 * Time: 13:49
 * @author suspended values
 */
namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

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
        $mailFromName = env("MAIL_FROM_NAME");
        $mailFrom = env('MAIL_USERNAME');
        if ($mailFrom) {
            if (isset($this->data['view'])){
                if (isset($this->data['name'])){
                    return $this->from($mailFrom, $this->data['name'])->subject($this->data['subject'])->view('client.email.contact', ['data' => $this->data]);

                }
                return $this->from($mailFrom, $mailFromName??'Suspended values')->subject($this->data['subject'])->view($this->data['view'], ['data' => $this->data]);

            }
            return $this->from($mailFrom, $this->data['name'])->subject($this->data['subject'])->view('client.email.contact', ['data' => $this->data]);
        }

    }
}
