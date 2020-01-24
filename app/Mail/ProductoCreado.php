<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductoCreado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $nombre;
    public $precio;
    
    public function __construct($nombre,$precio)
    {
        $this->$nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('El producto ha sidio creado con exito')
                    ->view('mails.producto');
    }
}
