<?php

namespace Tests\Feature;

use App\Livewire\Admin\AssignmentDocuments;
use App\Models\Assignment;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DocumentsReviewTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $becario;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
        $this->becario = User::factory()->create(['role' => 'becario']);
    }

    private function createDocumentForAssignment(Assignment $assignment, string $status = 'pendiente'): Document
    {
        return Document::create([
            'user_id' => $this->becario->id,
            'assignment_id' => $assignment->id,
            'title' => $assignment->title,
            'type' => 'informe',
            'file_path' => 'documentos/test.pdf',
            'file_name' => 'test.pdf',
            'file_mime_type' => 'application/pdf',
            'file_size' => 1024,
            'status' => $status,
        ]);
    }

    public function test_admin_can_view_assignment_documents(): void
    {
        $assignment = Assignment::create([
            'title' => 'Test Assignment',
            'type' => 'informe',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        $this->actingAs($this->admin)
            ->get(route('admin.documents.show', $assignment))
            ->assertOk();
    }

    public function test_admin_can_approve_document(): void
    {
        $assignment = Assignment::create([
            'title' => 'Review Test',
            'type' => 'documento',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        $doc = $this->createDocumentForAssignment($assignment);

        Livewire::actingAs($this->admin)
            ->test(AssignmentDocuments::class, ['assignment' => $assignment])
            ->call('startReview', $doc->id)
            ->assertSet('reviewingDocId', $doc->id)
            ->set('reviewStatus', 'aprobado')
            ->set('adminNotes', 'Buen trabajo')
            ->call('saveReview')
            ->assertSet('reviewingDocId', 0)
            ->assertHasNoErrors();

        $doc->refresh();
        $this->assertEquals('aprobado', $doc->status);
        $this->assertEquals('Buen trabajo', $doc->admin_notes);
        $this->assertEquals($this->admin->id, $doc->reviewed_by);
        $this->assertNotNull($doc->reviewed_at);
    }

    public function test_admin_can_reject_document(): void
    {
        $assignment = Assignment::create([
            'title' => 'Reject Test',
            'type' => 'documento',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        $doc = $this->createDocumentForAssignment($assignment);

        Livewire::actingAs($this->admin)
            ->test(AssignmentDocuments::class, ['assignment' => $assignment])
            ->call('startReview', $doc->id)
            ->set('reviewStatus', 'rechazado')
            ->set('adminNotes', 'Formato incorrecto')
            ->call('saveReview')
            ->assertHasNoErrors();

        $this->assertEquals('rechazado', $doc->fresh()->status);
    }

    public function test_review_validates_status(): void
    {
        $assignment = Assignment::create([
            'title' => 'Validation Test',
            'type' => 'documento',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        $doc = $this->createDocumentForAssignment($assignment);

        Livewire::actingAs($this->admin)
            ->test(AssignmentDocuments::class, ['assignment' => $assignment])
            ->call('startReview', $doc->id)
            ->set('reviewStatus', 'invalido')
            ->call('saveReview')
            ->assertHasErrors(['reviewStatus']);
    }

    public function test_documents_review_page_renders(): void
    {
        $this->actingAs($this->admin)
            ->get(route('admin.documents.index'))
            ->assertOk();
    }
}
