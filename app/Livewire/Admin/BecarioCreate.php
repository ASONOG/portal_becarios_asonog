<?php

namespace App\Livewire\Admin;

use App\Mail\BecarioInvitacion;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Nuevo Becario')]
class BecarioCreate extends Component
{
    public string $name  = '';
    public string $email = '';

    public bool $created = false;

    public function save(): void
    {
        $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ]);

        $user = User::create([
            'name'              => $this->name,
            'email'             => $this->email,
            'password'          => Str::random(32),
            'role'              => 'becario',
            'email_verified_at' => now(),
        ]);

        $token = Password::createToken($user);
        $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));

        Mail::to($user->email)->send(new BecarioInvitacion($user, $resetUrl));

        $this->created = true;
        $this->reset(['name', 'email']);
        session()->flash('success', "Cuenta creada para {$user->name}. Se envió un correo de invitación a {$user->email}.");
    }

    public function render()
    {
        return view('livewire.admin.becario-create');
    }
}
