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
        ], 
        [
            'name.required'  => 'El nombre es obligatorio.',
            'name.max'       => 'El nombre no debe exceder 255 caracteres.',
            'email.required' => 'El correo es obligatorio.',
            'email.email'    => 'El correo debe ser una dirección válida.',
            'email.max'      => 'El correo no debe exceder 255 caracteres.',
            'email.unique'   => 'Este correo ya está registrado.',
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
