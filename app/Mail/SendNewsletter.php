<?php

namespace App\Mail;

use App\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletters)
    {
        $this->newsletter = $newsletters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gilbert.trinidad1@gmail.com')
            ->subject('Nouvelles promotion sur Atypikhouse')
            ->view('email.newsletters.index')->with('newsletters', $newsletters);
    }
}
