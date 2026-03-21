<?php

namespace App\Livewire\Becario;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard - Portal ASONOG')]
class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        $documents = $user->documents();

        return view('becario.dashboard', [
            'completion'      => $user->profileCompletionPercentage(),
            'docs'            => $user->documents()->latest()->take(5)->get(),
            'pendingCount'    => (clone $documents)->where('status', 'pendiente')->count(),
            'approvedCount'   => (clone $documents)->where('status', 'aprobado')->count(),
            'rejectedCount'   => (clone $documents)->where('status', 'rechazado')->count(),
            'totalDocs'       => $documents->count(),
            'activeRequests'  => \App\Models\Assignment::where('status', 'activa')->count(),
        ]);
    }
}
