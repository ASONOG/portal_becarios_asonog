<?php

namespace App\Livewire\Admin;

use App\Models\Donation;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Registro de Donaciones')]
class DonationsList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $status = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Donation::query()
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('donor_name', 'like', "%{$this->search}%")
                  ->orWhere('donor_email', 'like', "%{$this->search}%")
                  ->orWhere('paypal_order_id', 'like', "%{$this->search}%");
            }))
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest();

        $donations = $query->paginate(15);

        $totalDonaciones = Donation::count();
        $totalCompletadas = Donation::where('status', 'completed')->count();
        $totalPendientes = Donation::where('status', 'pending')->count();
        $montoTotal = Donation::where('status', 'completed')->sum('amount');

        return view('livewire.admin.donations-list', compact(
            'donations',
            'totalDonaciones',
            'totalCompletadas',
            'totalPendientes',
            'montoTotal',
        ));
    }
}
