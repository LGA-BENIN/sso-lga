<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'test:email';
    protected $description = 'Send a test email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $to_email = 'mmissikpode7@example.com'; // Remplacez par votre adresse email de test

        Mail::raw('This is a test email.', function ($message) use ($to_email) {
            $message->to($to_email)
                ->subject('Test Email');
        });

        $this->info('Test email sent successfully!');
    }
}
