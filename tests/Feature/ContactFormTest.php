<?php

namespace Tests\Feature;

use App\Livewire\ContactForm;
use App\Mail\ContactoMensaje;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders(): void
    {
        $this->get(route('contact'))->assertOk();
    }

    public function test_contact_form_sends_email(): void
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Juan')
            ->set('last_name', 'Pérez')
            ->set('email', 'juan@example.com')
            ->set('subject', 'Consulta')
            ->set('message', 'Hola, quiero más información.')
            ->call('submit')
            ->assertSet('sent', true)
            ->assertSet('name', '')
            ->assertSet('email', '');

        Mail::assertSent(ContactoMensaje::class);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->set('last_name', '')
            ->set('email', '')
            ->set('subject', '')
            ->set('message', '')
            ->call('submit')
            ->assertHasErrors(['name', 'last_name', 'email', 'subject', 'message']);
    }

    public function test_contact_form_validates_email_format(): void
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'not-an-email')
            ->call('submit')
            ->assertHasErrors(['email']);
    }

    public function test_contact_form_validates_max_lengths(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', str_repeat('a', 101))
            ->set('subject', str_repeat('b', 201))
            ->set('message', str_repeat('c', 2001))
            ->call('submit')
            ->assertHasErrors(['name', 'subject', 'message']);
    }
}
