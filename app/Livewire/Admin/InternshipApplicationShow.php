<?php

namespace App\Livewire\Admin;

use App\Models\InternshipApplication;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detalle de Solicitud')]
class InternshipApplicationShow extends Component
{
    public InternshipApplication $application;

    public string $status = '';
    public string $admin_notes = '';

    public function mount(InternshipApplication $application): void
    {
        $this->application = $application;
        $this->status = $application->status;
        $this->admin_notes = $application->admin_notes ?? '';
    }

    public function updateStatus(): void
    {
        $this->validate([
            'status'      => 'required|in:' . implode(',', array_keys(InternshipApplication::STATUSES)),
            'admin_notes' => 'nullable|string|max:2000',
        ], [
            'status.required' => 'Debe seleccionar un estado.',
            'status.in'       => 'El estado seleccionado no es válido.',
            'admin_notes.max' => 'Las notas no deben exceder 2000 caracteres.',
        ]);

        $this->application->update([
            'status'      => $this->status,
            'admin_notes' => $this->admin_notes,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        session()->flash('success', 'Solicitud actualizada correctamente.');
    }

    public function deleteApplication(): void
    {
        $this->application->delete();

        session()->flash('success', 'Solicitud eliminada correctamente.');
        $this->redirect(route('admin.internships.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.internship-application-show');
    }
}
