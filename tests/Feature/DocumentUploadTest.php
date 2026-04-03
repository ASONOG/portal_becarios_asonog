<?php

namespace Tests\Feature;

use App\Livewire\Becario\DocumentUpload;
use App\Models\Assignment;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class DocumentUploadTest extends TestCase
{
    use RefreshDatabase;

    private User $becario;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->becario = User::factory()->create(['role' => 'becario']);
        $this->admin = User::factory()->admin()->create();
    }

    private function createActiveAssignment(): Assignment
    {
        return Assignment::create([
            'title' => 'Informe Mensual',
            'type' => 'informe',
            'due_date' => now()->addWeek(),
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);
    }

    public function test_becario_can_view_document_upload_page(): void
    {
        $this->actingAs($this->becario)
            ->get(route('becario.documents'))
            ->assertOk();
    }

    public function test_becario_can_submit_document(): void
    {
        Storage::fake('public');
        $assignment = $this->createActiveAssignment();

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('informe.pdf', 1024, 'application/pdf'))
            ->set('notes', 'Mi informe mensual')
            ->call('submit')
            ->assertSet('activeAssignmentId', null)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('documents', [
            'user_id' => $this->becario->id,
            'assignment_id' => $assignment->id,
            'status' => 'pendiente',
        ]);
    }

    public function test_cannot_submit_duplicate_document(): void
    {
        Storage::fake('public');
        $assignment = $this->createActiveAssignment();

        Document::create([
            'user_id' => $this->becario->id,
            'assignment_id' => $assignment->id,
            'title' => $assignment->title,
            'type' => 'informe',
            'file_path' => 'documentos/test.pdf',
            'file_name' => 'test.pdf',
            'file_mime_type' => 'application/pdf',
            'file_size' => 1024,
            'status' => 'pendiente',
        ]);

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('otro.pdf', 512, 'application/pdf'))
            ->call('submit')
            ->assertHasErrors(['file']);
    }

    public function test_can_resubmit_after_rejection(): void
    {
        Storage::fake('public');
        $assignment = $this->createActiveAssignment();

        Document::create([
            'user_id' => $this->becario->id,
            'assignment_id' => $assignment->id,
            'title' => $assignment->title,
            'type' => 'informe',
            'file_path' => 'documentos/test.pdf',
            'file_name' => 'test.pdf',
            'file_mime_type' => 'application/pdf',
            'file_size' => 1024,
            'status' => 'rechazado',
        ]);

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('nuevo.pdf', 512, 'application/pdf'))
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('documents', [
            'user_id' => $this->becario->id,
            'assignment_id' => $assignment->id,
            'status' => 'pendiente',
        ]);
    }

    public function test_cannot_submit_to_overdue_assignment(): void
    {
        Storage::fake('public');

        $assignment = Assignment::create([
            'title' => 'Vencida',
            'type' => 'documento',
            'due_date' => now()->subDay(),
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('doc.pdf', 512, 'application/pdf'))
            ->call('submit')
            ->assertHasErrors(['file']);
    }

    public function test_file_validation_rejects_invalid_types(): void
    {
        $assignment = $this->createActiveAssignment();

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('virus.exe', 512))
            ->call('submit')
            ->assertHasErrors(['file']);
    }

    public function test_file_validation_rejects_oversized_files(): void
    {
        $assignment = $this->createActiveAssignment();

        Livewire::actingAs($this->becario)
            ->test(DocumentUpload::class)
            ->call('openUpload', $assignment->id)
            ->set('file', UploadedFile::fake()->create('big.pdf', 6000, 'application/pdf'))
            ->call('submit')
            ->assertHasErrors(['file']);
    }
}
