<?php

namespace App\Livewire\Admin;

use App\Models\BankTransferDonation;
use App\Models\Donation;
use App\Models\InterestDonation;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Registro de Donaciones')]
class DonationsList extends Component
{
    use WithPagination;

    #[Url]
    public string $tab = 'paypal';

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

    public function updatingTab(): void
    {
        $this->resetPage();
        $this->reset(['search', 'status']);
    }

    public function updateTransferStatus(int $id, string $newStatus): void
    {
        $transfer = BankTransferDonation::findOrFail($id);
        $transfer->update(['status' => $newStatus]);

        $label = match ($newStatus) {
            'verificado' => 'verificada',
            'rechazado'  => 'rechazada',
            default      => 'actualizada',
        };

        session()->flash('success', "Transferencia {$label} correctamente.");
    }

    public function markInterestContacted(int $id): void
    {
        InterestDonation::where('id', $id)->update(['status' => 'contactado']);
        session()->flash('success', 'Marcado como contactado.');
    }

    public function render()
    {
        // PayPal stats (siempre visibles)
        $totalPaypal = Donation::count();
        $totalCompletadas = Donation::where('status', 'completed')->count();
        $montoPaypal = Donation::where('status', 'completed')->sum('amount');

        // Transfer stats
        $totalTransfers = BankTransferDonation::count();
        $transfersPendientes = BankTransferDonation::where('status', 'pendiente')->count();

        // Interest stats
        $totalInterest = InterestDonation::count();
        $interestPendientes = InterestDonation::where('status', 'pendiente')->count();

        // Data por tab
        $donations = null;
        $transfers = null;
        $interests = null;

        if ($this->tab === 'paypal') {
            $donations = Donation::query()
                ->when($this->search, fn ($q) => $q->where(function ($q) {
                    $q->where('donor_name', 'like', "%{$this->search}%")
                      ->orWhere('donor_email', 'like', "%{$this->search}%")
                      ->orWhere('paypal_order_id', 'like', "%{$this->search}%");
                }))
                ->when($this->status, fn ($q) => $q->where('status', $this->status))
                ->latest()
                ->paginate(15);
        } elseif ($this->tab === 'transfers') {
            $transfers = BankTransferDonation::query()
                ->when($this->search, fn ($q) => $q->where(function ($q) {
                    $q->where('donor_name', 'like', "%{$this->search}%")
                      ->orWhere('bank_name', 'like', "%{$this->search}%");
                }))
                ->when($this->status, fn ($q) => $q->where('status', $this->status))
                ->latest()
                ->paginate(15);
        } else {
            $interests = InterestDonation::query()
                ->when($this->search, fn ($q) => $q->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%");
                }))
                ->when($this->status, fn ($q) => $q->where('status', $this->status))
                ->latest()
                ->paginate(15);
        }

        return view('livewire.admin.donations-list', compact(
            'donations',
            'transfers',
            'interests',
            'totalPaypal',
            'totalCompletadas',
            'montoPaypal',
            'totalTransfers',
            'transfersPendientes',
            'totalInterest',
            'interestPendientes',
        ));
    }
}
