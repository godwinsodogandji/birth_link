<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayEmail extends Mailable

    {
        use Queueable, SerializesModels;
    
        public $title;
        public $content;
        public $imagePath;
    
        // Injection des variables
        public function __construct($title, $content, $imagePath)
        {
            $this->title = $title;
            $this->content = $content;
            $this->imagePath = $imagePath;
        }
    
        public function build()
        {
            return $this->subject($this->title)  // Titre de l'email
                        ->view('emails.birthday')  // Vue qui contient le contenu
                        ->with([
                            'content' => $this->content,
                            'imagePath' => $this->imagePath,
                        ]);
        }
    }