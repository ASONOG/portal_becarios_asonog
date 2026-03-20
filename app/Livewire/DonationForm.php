<?php

namespace App\Livewire;

use Livewire\Component;

class DonationForm extends Component
{
    public ?string $amount = null;
    public string $donor_name = '';
    public string $donor_email = '';
    public bool $anonymous = false;
    public bool $paid = false;

    protected function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:1', 'max:999999'],
            'donor_name' => ['required_unless:anonymous,true', 'nullable', 'string', 'max:150'],
            'donor_email' => ['required', 'email', 'max:150'],
            'anonymous' => ['boolean'],
        ];
    }

    public function selectAmount(string $value): void
    {
        $this->amount = $value;
    }

    public function validateDonation(): array
    {
        $this->validate();

        return [
            'amount' => $this->amount,
            'donor_name' => $this->anonymous ? null : $this->donor_name,
            'donor_email' => $this->donor_email,
            'anonymous' => $this->anonymous,
        ];
    }

    public function markAsPaid(): void
    {
        $this->paid = true;
    }

    public function render()
    {
        return view('livewire.donation-form');
    }
}
