<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class SendMailContacto extends Mailable
{
    use Queueable, SerializesModels;

    protected $datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // ini_set('max_execution_time', 0);
        $email = $this->view('emails.contacto')
            ->with([
                'datos' => $this->datos,
            ])
            ->subject('Mensaje de contacto');
        /*foreach ($this->purchase->attached as $file) {
            $email = $email->attach(public_path() . '/' . Storage::url($file));
        }*/
        return $email;
    }
}
