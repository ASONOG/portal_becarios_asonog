<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Becario')]
class BecarioShow extends Component
{
    public User $user;

    public int $reviewingDocId = 0;
    public string $reviewStatus = '';
    public string $adminNotes = '';

    public function mount(User $user): void
    {
        abort_if($user->role !== 'becario', 404);
        $this->user = $user;
    }

    public function startReview(int $docId): void
    {
        $doc = Document::findOrFail($docId);
        $this->reviewingDocId = $docId;
        $this->reviewStatus   = $doc->status;
        $this->adminNotes     = $doc->admin_notes ?? '';
    }

    public function saveReview(): void
    {
        $this->validate([
            'reviewStatus' => 'required|in:aprobado,rechazado',
            'adminNotes'   => 'nullable|string|max:1000',
        ]);

        Document::where('id', $this->reviewingDocId)->update([
            'status'      => $this->reviewStatus,
            'admin_notes' => $this->adminNotes,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        $this->reset(['reviewingDocId', 'reviewStatus', 'adminNotes']);
        session()->flash('success', 'Revisión guardada correctamente.');
    }

    public function cancelReview(): void
    {
        $this->reset(['reviewingDocId', 'reviewStatus', 'adminNotes']);
    }

    public function render()
    {
        return view('livewire.admin.becario-show', [
            'documents' => $this->user->documents()->with('reviewer')->latest()->get(),
        ]);
    }
}
