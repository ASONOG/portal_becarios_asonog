<?php

namespace App\Livewire\Admin;

use App\Models\Assignment;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Solicitudes de Documentos')]
class AssignmentManage extends Component
{
    public bool $showForm = false;

    public string $title       = '';
    public string $type        = 'documento';
    public string $description = '';
    public string $due_date    = '';

    public function save(): void
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:informe,documento,otro',
            'description' => 'nullable|string|max:1000',
            'due_date'    => 'nullable|date',
        ]);

        Assignment::create([
            'title'       => $this->title,
            'type'        => $this->type,
            'description' => $this->description ?: null,
            'due_date'    => $this->due_date ?: null,
            'created_by'  => auth()->id(),
            'status'      => 'activa',
        ]);

        $this->reset(['title', 'type', 'description', 'due_date', 'showForm']);
        session()->flash('success', 'Solicitud creada. Los becarios ya pueden verla.');
    }

    public function toggleStatus(int $id): void
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->update([
            'status' => $assignment->status === 'activa' ? 'cerrada' : 'activa',
        ]);
    }

    public function delete(int $id): void
    {
        Assignment::findOrFail($id)->delete();
        session()->flash('success', 'Solicitud eliminada.');
    }

    public function render()
    {
        $assignments = Assignment::withCount('documents')
            ->latest()
            ->get();

        return view('livewire.admin.assignment-manage', compact('assignments'));
    }
}
