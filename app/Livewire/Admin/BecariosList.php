<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Gestión de Becarios')]
class BecariosList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $becarios = User::where('role', 'becario')
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('institution', 'like', "%{$this->search}%");
            }))
            ->withCount('documents')
            ->latest()
            ->paginate(15);

        return view('livewire.admin.becarios-list', compact('becarios'));
    }
}
