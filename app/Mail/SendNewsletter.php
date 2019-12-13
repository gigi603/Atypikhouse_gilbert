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
    protected $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newsletter = $this->newsletter;
        // dd('coco', $newsletter->price);
        return $this->from('gilbert.trinidad1@gmail.com')
            ->subject('Nouvelles promotion sur Atypikhouse')
            ->view('email.newsletters.index')
            ->with([
                'newsletterTitle' => $newsletter->title,
                'newsletterReduction' => $newsletter->reduction,
                'newsletterPrice' => $newsletter->price,
                'newsletterAdresse' => $newsletter->adresse,
                'newsletterDescription' => $newsletter->description
            ]);
    }
}
