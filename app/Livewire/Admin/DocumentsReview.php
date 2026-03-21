<?php

namespace App\Livewire\Admin;

use App\Models\Assignment;
use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Revisión de Documentos')]
class DocumentsReview extends Component
{
    use WithPagination;

    #[Url]
    public string $statusFilter     = '';

    #[Url]
    public string $assignmentFilter = '';

    public int $reviewingDocId = 0;
    public string $reviewStatus = '';
    public string $adminNotes = '';

    public function updatingStatusFilter(): void     { $this->resetPage(); }
    public function updatingAssignmentFilter(): void { $this->resetPage(); }

    public function startReview(int $docId): void
    {
        $doc = Document::findOrFail($docId);
        $this->reviewingDocId = $docId;
        // 'pendiente' is not a valid review outcome — default to 'aprobado'
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
        $documents = Document::with(['user', 'assignment'])
            ->whereNotNull('assignment_id')
            ->when($this->statusFilter,     fn ($q) => $q->where('status', $this->statusFilter))
            ->when($this->assignmentFilter, fn ($q) => $q->where('assignment_id', $this->assignmentFilter))
            ->latest()
            ->paginate(20);

        $assignments = Assignment::orderBy('title')->get();

        $counts = [
            'total'     => Document::whereNotNull('assignment_id')->count(),
            'pendiente' => Document::whereNotNull('assignment_id')->where('status', 'pendiente')->count(),
            'aprobado'  => Document::whereNotNull('assignment_id')->where('status', 'aprobado')->count(),
            'rechazado' => Document::whereNotNull('assignment_id')->where('status', 'rechazado')->count(),
        ];

        return view('livewire.admin.documents-review', compact('documents', 'counts', 'assignments'));
    }
}
