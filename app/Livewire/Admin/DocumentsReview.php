<?php

namespace App\Livewire\Admin;

use App\Models\Assignment;
use App\Models\Document;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Revisión de Documentos')]
class DocumentsReview extends Component
{
    #[Url]
    public string $assignmentFilter = '';

    public function render()
    {
        $assignments = Assignment::withCount([
                'documents as total_documents_count',
                'documents as pending_count' => fn($q) => $q->where('status', 'pendiente'),
            ])
            ->when($this->assignmentFilter, fn($q) => $q->where('id', $this->assignmentFilter))
            ->latest()
            ->get();

        $allAssignments = Assignment::orderBy('title')->get();

        $counts = [
            'total'     => Document::whereNotNull('assignment_id')->count(),
            'pendiente' => Document::whereNotNull('assignment_id')->where('status', 'pendiente')->count(),
            'aprobado'  => Document::whereNotNull('assignment_id')->where('status', 'aprobado')->count(),
            'rechazado' => Document::whereNotNull('assignment_id')->where('status', 'rechazado')->count(),
        ];

        $totalBecarios = User::where('role', 'becario')->count();

        return view('livewire.admin.documents-review', [
            'assignments'    => $assignments,
            'allAssignments' => $allAssignments,
            'counts'         => $counts,
            'totalBecarios'  => $totalBecarios,
        ]);
    }
}
