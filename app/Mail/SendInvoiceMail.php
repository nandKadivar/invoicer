<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
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
        // $pdfPath = asset('/invoice/30/temp.pdf');
        // $file = [public_path('invoice/30/temp.pdf')];
        // $path = public_path('/invoice/30/');
        // if(file_exists($path)){
        //     // return response()->file($path);
        // }
        return $this->subject($this->data['subject'])->view('emails.invoice')->attach(public_path('/invoice/'.$this->data['invoice_id'].'/temp.pdf',[
            'as' => 'invoice.pdf',
        ]));
        // print_r($this->data['subject']);
    }
}
