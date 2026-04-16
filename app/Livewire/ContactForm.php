<?php

namespace App\Livewire;

use App\Mail\ContactoMensaje;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $last_name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';
    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ];
    }

    public function submit(): void
    {
        $key = 'contact-form:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('email', 'Demasiados intentos. Intenta de nuevo más tarde.');
            return;
        }

        RateLimiter::hit($key, 60);

        $validated = $this->validate();

        Mail::to(config('mail.notification_email', config('mail.from.address')))->send(new ContactoMensaje($validated));

        $this->reset(['name', 'last_name', 'email', 'subject', 'message']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
