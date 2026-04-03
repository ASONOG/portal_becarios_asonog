<?php

namespace Tests\Feature;

use App\Livewire\Admin\BecarioCreate;
use App\Mail\BecarioInvitacion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class BecarioCreateTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_becario_create_page(): void
    {
        $this->actingAs($this->admin)
            ->get(route('admin.becarios.create'))
            ->assertOk();
    }

    public function test_admin_can_create_becario(): void
    {
        Mail::fake();

        Livewire::actingAs($this->admin)
            ->test(BecarioCreate::class)
            ->set('name', 'María López')
            ->set('email', 'maria@example.com')
            ->call('save')
            ->assertSet('created', true)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'maria@example.com',
            'role' => 'becario',
        ]);

        Mail::assertSent(BecarioInvitacion::class, function ($mail) {
            return $mail->hasTo('maria@example.com');
        });
    }

    public function test_create_becario_validates_required_fields(): void
    {
        Livewire::actingAs($this->admin)
            ->test(BecarioCreate::class)
            ->set('name', '')
            ->set('email', '')
            ->call('save')
            ->assertHasErrors(['name', 'email']);
    }

    public function test_create_becario_validates_unique_email(): void
    {
        User::factory()->create(['email' => 'existing@example.com']);

        Livewire::actingAs($this->admin)
            ->test(BecarioCreate::class)
            ->set('name', 'Duplicado')
            ->set('email', 'existing@example.com')
            ->call('save')
            ->assertHasErrors(['email']);
    }

    public function test_create_becario_validates_email_format(): void
    {
        Livewire::actingAs($this->admin)
            ->test(BecarioCreate::class)
            ->set('name', 'Test')
            ->set('email', 'not-an-email')
            ->call('save')
            ->assertHasErrors(['email']);
    }
}
