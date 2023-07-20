<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoPass extends Mailable
{
    use Queueable, SerializesModels;
    public $contraseña;

    public function __construct($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function build(){
        return $this->view('Emails.passCorreo')
        ->subject('Bienvenido al programa Calculo de Huella de Carbono')
        ->with(['contraseña'=>$this->contraseña]);
    }
}
