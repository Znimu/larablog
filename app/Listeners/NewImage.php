<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Envoie mail pour prévenir de l'enregistrement d'une nouvelle image
        Mail::to('b.morot.sir@gmail.com')->send(new \App\Mail\NewImage());

        // $to_name = 'Blaise Morot-Sir';
        // $to_email = 'b.morot.sir@gmail.com';
        // $data = array('name'=>"Sam Jose", "body" => "Test mail");
            
        // Mail::send('emails.newImage', $data, function($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)
        //             ->subject('Laravel Testing Mail');
        //     $message->from('b.morot.sir@gmail.com','Moa');
        // });
    }
}
