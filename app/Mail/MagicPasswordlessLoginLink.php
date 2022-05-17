<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MagicPasswordlessLoginLink extends Mailable
{
  use Queueable, SerializesModels;

  public $url;

  public function __construct($url)
  {
      $this->url = $url;
  }

  public function build()
  {
    return $this->subject(
      config('app.name') . ' Login Verification'
    )->markdown('emails.magic-login-link', [
      'url' => $this->url
    ]);
  }
}
