<?php

namespace App\Livewire\Becario;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard - Portal de Becas ASONOG')]
class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        return view('becario.dashboard', [
            'completion' => $user->profileCompletionPercentage(),
            'docs'       => $user->documents()->latest()->take(3)->get(),
        ]);
    }
}
