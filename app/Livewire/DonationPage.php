<?php

namespace App\Livewire;

use App\Models\BankTransferDonation;
use App\Models\InterestDonation;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Livewire\WithFileUploads;

class DonationPage extends Component
{
    use WithFileUploads;

    public string $tab = 'paypal';

    // Transferencia bancaria
    public string $bank_donor_name = '';
    public string $bank_amount = '';
    public string $bank_name = '';
    public $bank_receipt = null;
    public bool $bankSent = false;

    // Formulario de interés
    public string $interest_name = '';
    public string $interest_email = '';
    public string $interest_phone = '';
    public string $interest_message = '';
    public bool $interestSent = false;

    public function selectTab(string $tab): void
    {
        $this->tab = $tab;
        $this->resetErrorBag();
    }

    public function submitBankTransfer(): void
    {
        $key = 'bank-transfer:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('bank_receipt', 'Demasiados intentos. Intenta de nuevo más tarde.');
            return;
        }

        RateLimiter::hit($key, 120);

        $this->validate([
            'bank_donor_name' => 'required|string|max:150',
            'bank_amount'     => 'required|numeric|min:1|max:999999',
            'bank_name'       => 'required|string|max:150',
            'bank_receipt'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'bank_donor_name.required' => 'El nombre es obligatorio.',
            'bank_donor_name.max'      => 'El nombre no debe exceder 150 caracteres.',
            'bank_amount.required'     => 'El monto es obligatorio.',
            'bank_amount.numeric'      => 'El monto debe ser un número válido.',
            'bank_amount.min'          => 'El monto mínimo es 1.',
            'bank_name.required'       => 'El nombre del banco es obligatorio.',
            'bank_name.max'            => 'El nombre del banco no debe exceder 150 caracteres.',
            'bank_receipt.required'    => 'El comprobante es obligatorio.',
            'bank_receipt.file'        => 'El comprobante debe ser un archivo válido.',
            'bank_receipt.mimes'       => 'El comprobante debe ser JPG, PNG o PDF.',
            'bank_receipt.max'         => 'El comprobante no debe pesar más de 5 MB.',
        ]);

        $path = $this->bank_receipt->store('comprobantes', 'public');

        BankTransferDonation::create([
            'donor_name'   => $this->bank_donor_name,
            'amount'       => $this->bank_amount,
            'bank_name'    => $this->bank_name,
            'receipt_path' => $path,
            'receipt_name' => $this->bank_receipt->getClientOriginalName(),
        ]);

        $this->reset(['bank_donor_name', 'bank_amount', 'bank_name', 'bank_receipt']);
        $this->bankSent = true;
    }

    public function submitInterest(): void
    {
        $key = 'interest-donation:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('interest_email', 'Demasiados intentos. Intenta de nuevo más tarde.');
            return;
        }

        RateLimiter::hit($key, 120);

        $this->validate([
            'interest_name'    => 'required|string|max:150',
            'interest_email'   => 'required|email|max:150',
            'interest_phone'   => 'nullable|string|max:30',
            'interest_message' => 'required|string|max:2000',
        ], [
            'interest_name.required'    => 'El nombre es obligatorio.',
            'interest_name.max'         => 'El nombre no debe exceder 150 caracteres.',
            'interest_email.required'   => 'El correo es obligatorio.',
            'interest_email.email'      => 'El correo debe ser una dirección válida.',
            'interest_email.max'        => 'El correo no debe exceder 150 caracteres.',
            'interest_phone.max'        => 'El teléfono no debe exceder 30 caracteres.',
            'interest_message.required' => 'El mensaje es obligatorio.',
            'interest_message.max'      => 'El mensaje no debe exceder 2000 caracteres.',
        ]);

        InterestDonation::create([
            'name'    => $this->interest_name,
            'email'   => $this->interest_email,
            'phone'   => $this->interest_phone ?: null,
            'message' => $this->interest_message,
        ]);

        $this->reset(['interest_name', 'interest_email', 'interest_phone', 'interest_message']);
        $this->interestSent = true;
    }

    public function render()
    {
        return view('livewire.donation-page');
    }
}
