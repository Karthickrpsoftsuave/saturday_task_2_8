<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class SendEmailJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $resetLink;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $resetLink)
    {
        $this->email = $email;
        $this->resetLink = $resetLink;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
     
        Mail::raw("Click here to reset your password: {$this->resetLink}", function ($message) {
            $message->to($this->email)->subject('Reset Your Password');
        });
    }
}
