<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard Administrador - ASONOG')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalBecarios'  => User::where('role', 'becario')->count(),
            'totalDocs'      => Document::count(),
            'pendientes'     => Document::where('status', 'pendiente')->count(),
            'aprobados'      => Document::where('status', 'aprobado')->count(),
            'recentBecarios' => User::where('role', 'becario')->latest()->take(5)->get(),
            'pendingDocs'    => Document::with('user')->where('status', 'pendiente')->latest()->take(5)->get(),
        ]);
    }
}
