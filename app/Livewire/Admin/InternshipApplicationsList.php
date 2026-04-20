<?php

namespace App\Livewire\Admin;

use App\Models\InternshipApplication;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Solicitudes de Prácticas')]
class InternshipApplicationsList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $status = '';

    #[Url]
    public string $type = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function updatingType(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $totalApplications = InternshipApplication::count();
        $pendingCount = InternshipApplication::where('status', 'pendiente')->count();
        $acceptedCount = InternshipApplication::where('status', 'aceptada')->count();

        $applications = InternshipApplication::query()
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('full_name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('institution', 'like', "%{$this->search}%");
            }))
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->when($this->type, fn ($q) => $q->where('internship_type', $this->type))
            ->latest()
            ->paginate(15);

        return view('livewire.admin.internship-applications-list', compact(
            'applications',
            'totalApplications',
            'pendingCount',
            'acceptedCount',
        ));
    }
}
