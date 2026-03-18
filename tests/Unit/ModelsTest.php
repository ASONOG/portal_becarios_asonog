<?php

namespace Tests\Unit;

use App\Models\Assignment;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_is_admin(): void
    {
        $admin = User::factory()->admin()->create();
        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($admin->isBecario());
    }

    public function test_user_is_becario(): void
    {
        $becario = User::factory()->create(['role' => 'becario']);
        $this->assertTrue($becario->isBecario());
        $this->assertFalse($becario->isAdmin());
    }

    public function test_user_profile_completion_percentage(): void
    {
        $user = User::factory()->create([
            'role' => 'becario',
            'name' => 'Test',
            'email' => 'test@example.com',
            'phone' => null,
            'national_id' => null,
            'institution' => null,
            'career' => null,
        ]);

        // name + email filled = 2/6 = 33%
        $this->assertEquals(33, $user->profileCompletionPercentage());

        $user->update(['phone' => '12345', 'national_id' => 'ID001', 'institution' => 'UNAH', 'career' => 'Ing.']);
        $user->refresh();
        $this->assertEquals(100, $user->profileCompletionPercentage());
    }

    public function test_user_initials(): void
    {
        $user = User::factory()->create(['name' => 'María López']);
        $this->assertEquals('ML', $user->initials());

        $user2 = User::factory()->create(['name' => 'Carlos']);
        $this->assertEquals('C', $user2->initials());
    }

    public function test_user_has_many_documents(): void
    {
        $user = User::factory()->create(['role' => 'becario']);
        $this->assertCount(0, $user->documents);

        Document::create([
            'user_id' => $user->id,
            'title' => 'Test Doc',
            'type' => 'informe',
            'file_path' => 'docs/test.pdf',
            'file_name' => 'test.pdf',
            'file_mime_type' => 'application/pdf',
            'file_size' => 1024,
            'status' => 'pendiente',
        ]);

        $this->assertCount(1, $user->fresh()->documents);
    }

    public function test_assignment_type_label(): void
    {
        $assignment = new Assignment(['type' => 'informe']);
        $this->assertEquals('Informe', $assignment->type_label);

        $assignment->type = 'documento';
        $this->assertEquals('Documento', $assignment->type_label);
    }

    public function test_assignment_is_active_and_overdue(): void
    {
        $assignment = new Assignment([
            'status' => 'activa',
            'due_date' => now()->subDay(),
        ]);
        $assignment->exists = true;

        $this->assertTrue($assignment->isActive());
        $this->assertTrue($assignment->isOverdue());

        $assignment->status = 'cerrada';
        $this->assertFalse($assignment->isActive());
        $this->assertFalse($assignment->isOverdue());
    }

    public function test_document_status_labels(): void
    {
        $doc = new Document(['status' => 'pendiente']);
        $this->assertEquals('Pendiente', $doc->status_label);

        $doc->status = 'aprobado';
        $this->assertEquals('Aprobado', $doc->status_label);

        $doc->status = 'rechazado';
        $this->assertEquals('Rechazado', $doc->status_label);
    }

    public function test_document_file_size_formatted(): void
    {
        $doc = new Document(['file_size' => 500]);
        $this->assertEquals('500 B', $doc->file_size_formatted);

        $doc->file_size = 2048;
        $this->assertEquals('2 KB', $doc->file_size_formatted);

        $doc->file_size = 1572864;
        $this->assertEquals('1.5 MB', $doc->file_size_formatted);
    }

    public function test_assignment_submission_by_user(): void
    {
        $admin = User::factory()->admin()->create();
        $becario = User::factory()->create(['role' => 'becario']);

        $assignment = Assignment::create([
            'title' => 'Test Assignment',
            'type' => 'informe',
            'created_by' => $admin->id,
            'status' => 'activa',
        ]);

        $this->assertNull($assignment->submissionByUser($becario->id));

        $doc = Document::create([
            'user_id' => $becario->id,
            'assignment_id' => $assignment->id,
            'title' => 'My submission',
            'type' => 'asignacion',
            'file_path' => 'docs/sub.pdf',
            'file_name' => 'sub.pdf',
            'file_mime_type' => 'application/pdf',
            'file_size' => 512,
            'status' => 'pendiente',
        ]);

        $this->assertNotNull($assignment->submissionByUser($becario->id));
        $this->assertEquals($doc->id, $assignment->submissionByUser($becario->id)->id);
    }
}
