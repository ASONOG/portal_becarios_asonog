<?php

namespace App\Livewire\Becario;

use App\Models\Assignment;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Mis Solicitudes')]
class DocumentUpload extends Component
{
    use WithFileUploads;

    public ?int $activeAssignmentId = null;
    public $file = null;
    public string $notes = '';

    public function openUpload(int $assignmentId): void
    {
        $this->activeAssignmentId = $assignmentId;
        $this->reset(['file', 'notes']);
        $this->resetErrorBag();
    }

    public function cancelUpload(): void
    {
        $this->reset(['activeAssignmentId', 'file', 'notes']);
        $this->resetErrorBag();
    }

    public function submit(): void
    {
        $this->validate([
            'file'  => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'notes' => 'nullable|string|max:500',
        ]);

        $assignment = Assignment::where('id', $this->activeAssignmentId)
            ->where('status', 'activa')
            ->firstOrFail();

        // Evitar entregas duplicadas (excepto si la anterior fue rechazada)
        $alreadySubmitted = Document::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->whereNotIn('status', ['rechazado'])
            ->exists();

        if ($alreadySubmitted) {
            $this->addError('file', 'Ya enviaste un archivo para esta solicitud.');
            return;
        }

        $path = $this->file->store('documentos/' . Auth::id(), 'public');

        Document::create([
            'user_id'        => Auth::id(),
            'assignment_id'  => $assignment->id,
            'title'          => $assignment->title,
            'type'           => in_array($assignment->type, ['informe', 'documento', 'asignacion'])
                                    ? $assignment->type
                                    : 'documento',
            'description'    => $this->notes ?: null,
            'file_path'      => $path,
            'file_name'      => $this->file->getClientOriginalName(),
            'file_mime_type' => $this->file->getMimeType(),
            'file_size'      => $this->file->getSize(),
            'status'         => 'pendiente',
        ]);

        $this->reset(['activeAssignmentId', 'file', 'notes']);
        session()->flash('success', 'Archivo enviado correctamente. Está pendiente de revisión.');
    }

    public function deleteSubmission(int $id): void
    {
        $doc = Document::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pendiente') // solo se puede eliminar si aún está pendiente
            ->firstOrFail();

        Storage::disk('public')->delete($doc->file_path);
        $doc->delete();
        session()->flash('success', 'Entrega eliminada.');
    }

    public function render()
    {
        // Solicitudes activas con la entrega del becario actual (si existe)
        $assignments = Assignment::where('status', 'activa')
            ->with(['documents' => fn ($q) => $q->where('user_id', Auth::id())])
            ->latest()
            ->get();

        // Historial completo de entregas del becario
        $submissions = Document::where('user_id', Auth::id())
            ->with('assignment')
            ->whereNotNull('assignment_id')
            ->latest()
            ->get();

        return view('livewire.becario.document-upload', compact('assignments', 'submissions'));
    }
}

