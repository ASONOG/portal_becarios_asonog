<?php

namespace App\Livewire\Admin;

use App\Models\Assignment;
use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Entregas de Solicitud')]
class AssignmentDocuments extends Component
{
    public Assignment $assignment;

    #[Url]
    public string $statusFilter = '';

    public int $reviewingDocId = 0;
    public string $reviewStatus = '';
    public string $adminNotes = '';

    public function mount(Assignment $assignment): void
    {
        $this->assignment = $assignment;
    }

    public function startReview(int $docId): void
    {
        $doc = Document::findOrFail($docId);
        $this->reviewingDocId = $docId;
        $this->reviewStatus   = in_array($doc->status, ['aprobado', 'rechazado'])
            ? $doc->status
            : 'aprobado';
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
        session()->flash('success', 'Revisión guardada.');
    }

    public function cancelReview(): void
    {
        $this->reset(['reviewingDocId', 'reviewStatus', 'adminNotes']);
    }

    public function render()
    {
        $documents = $this->assignment->documents()
            ->with('user')
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->latest()
            ->get();

        $counts = [
            'total'     => $this->assignment->documents()->count(),
            'pendiente' => $this->assignment->documents()->where('status', 'pendiente')->count(),
            'aprobado'  => $this->assignment->documents()->where('status', 'aprobado')->count(),
            'rechazado' => $this->assignment->documents()->where('status', 'rechazado')->count(),
        ];

        return view('livewire.admin.assignment-documents', [
            'documents' => $documents,
            'counts'    => $counts,
        ]);
    }
}
