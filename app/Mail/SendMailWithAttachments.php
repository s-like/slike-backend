<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailWithAttachments extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

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
        
        if(isset($this->data['from'])){
            return $this->view($this->data['view'])
            ->from($this->data['from'])
            // ->subject($this->data['subject'])->attach($this->data['attachment'],$this->data['order_id'].'.pdf');
            ->subject($this->data['subject'])->attach($this->data['attachment']);
        }else{
            return $this->view($this->data['view'])
            ->from(config("app.mail_from_address"))
            // ->subject($this->data['subject'])->attach($this->data['attachment'],$this->data['order_id'].'.pdf');
            ->subject($this->data['subject'])->attach($this->data['attachment']);
        }
    }
}
