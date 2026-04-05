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

    public ?int $editingId = null;

    public function openCreate(): void
    {
        $this->reset(['title', 'type', 'description', 'due_date', 'editingId']);
        $this->showForm = true;
    }

    public function save(): void
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:informe,documento,otro',
            'description' => 'nullable|string|max:1000',
            'due_date'    => 'nullable|date',
        ], $this->validationMessages());

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

    public function edit(int $id): void
    {
        $assignment = Assignment::findOrFail($id);
        $this->editingId   = $assignment->id;
        $this->title       = $assignment->title;
        $this->type        = $assignment->type;
        $this->description = $assignment->description ?? '';
        $this->due_date    = $assignment->due_date?->format('Y-m-d') ?? '';
        $this->showForm    = true;
    }

    public function update(): void
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:informe,documento,otro',
            'description' => 'nullable|string|max:1000',
            'due_date'    => 'nullable|date',
        ], $this->validationMessages());

        $assignment = Assignment::findOrFail($this->editingId);
        $assignment->update([
            'title'       => $this->title,
            'type'        => $this->type,
            'description' => $this->description ?: null,
            'due_date'    => $this->due_date ?: null,
        ]);

        $this->reset(['title', 'type', 'description', 'due_date', 'showForm', 'editingId']);
        session()->flash('success', 'Solicitud actualizada.');
    }

    public function cancelEdit(): void
    {
        $this->reset(['title', 'type', 'description', 'due_date', 'showForm', 'editingId']);
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

    private function validationMessages(): array
    {
        return [
            'title.required'   => 'El título es obligatorio.',
            'title.max'        => 'El título no debe exceder 255 caracteres.',
            'type.required'    => 'El tipo es obligatorio.',
            'type.in'          => 'El tipo debe ser informe, documento u otro.',
            'description.max'  => 'La descripción no debe exceder 1000 caracteres.',
            'due_date.date'    => 'La fecha límite debe ser una fecha válida.',
        ];
    }

    public function render()
    {
        $assignments = Assignment::withCount('documents')
            ->latest()
            ->get();

        return view('livewire.admin.assignment-manage', compact('assignments'));
    }
}
