<?php

namespace App\Livewire;

use App\Mail\DonacionInteres;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DonationForm extends Component
{
    public ?string $amount = null;
    public string $frequency = 'once';
    public string $donor_name = '';
    public string $donor_email = '';
    public bool $anonymous = false;
    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:50', 'max:999999'],
            'frequency' => ['required', 'in:once,monthly,yearly'],
            'donor_name' => ['required_unless:anonymous,true', 'nullable', 'string', 'max:150'],
            'donor_email' => ['required', 'email', 'max:150'],
            'anonymous' => ['boolean'],
        ];
    }

    public function selectAmount(string $value): void
    {
        $this->amount = $value;
    }

    public function submit(): void
    {
        $validated = $this->validate();

        $frequencyLabels = [
            'once' => 'Única vez',
            'monthly' => 'Mensual',
            'yearly' => 'Anual',
        ];

        $data = [
            'amount' => $validated['amount'],
            'frequency' => $frequencyLabels[$validated['frequency']] ?? $validated['frequency'],
            'donor_name' => $validated['anonymous'] ? 'Anónimo' : $validated['donor_name'],
            'donor_email' => $validated['donor_email'],
            'anonymous' => $validated['anonymous'],
        ];

        Mail::to(config('mail.from.address'))->send(new DonacionInteres($data));

        $this->reset(['amount', 'frequency', 'donor_name', 'donor_email', 'anonymous']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.donation-form');
    }
}
