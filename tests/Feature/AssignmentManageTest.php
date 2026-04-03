<?php

namespace Tests\Feature;

use App\Livewire\Admin\AssignmentManage;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AssignmentManageTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
    }

    public function test_admin_can_view_assignments_page(): void
    {
        $this->actingAs($this->admin)
            ->get(route('admin.assignments.index'))
            ->assertOk();
    }

    public function test_admin_can_create_assignment(): void
    {
        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->call('openCreate')
            ->set('title', 'Informe Trimestral')
            ->set('type', 'informe')
            ->set('description', 'Entregar informe del trimestre')
            ->set('due_date', now()->addMonth()->format('Y-m-d'))
            ->call('save')
            ->assertSet('showForm', false)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('assignments', [
            'title' => 'Informe Trimestral',
            'type' => 'informe',
            'status' => 'activa',
            'created_by' => $this->admin->id,
        ]);
    }

    public function test_create_assignment_validates_required_fields(): void
    {
        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->set('title', '')
            ->set('type', '')
            ->call('save')
            ->assertHasErrors(['title', 'type']);
    }

    public function test_create_assignment_validates_type_enum(): void
    {
        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->set('title', 'Test')
            ->set('type', 'invalido')
            ->call('save')
            ->assertHasErrors(['type']);
    }

    public function test_admin_can_update_assignment(): void
    {
        $assignment = Assignment::create([
            'title' => 'Original',
            'type' => 'documento',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->call('edit', $assignment->id)
            ->assertSet('title', 'Original')
            ->set('title', 'Actualizado')
            ->call('update')
            ->assertSet('showForm', false)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('assignments', [
            'id' => $assignment->id,
            'title' => 'Actualizado',
        ]);
    }

    public function test_admin_can_toggle_assignment_status(): void
    {
        $assignment = Assignment::create([
            'title' => 'Toggle Test',
            'type' => 'documento',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->call('toggleStatus', $assignment->id);

        $this->assertEquals('cerrada', $assignment->fresh()->status);

        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->call('toggleStatus', $assignment->id);

        $this->assertEquals('activa', $assignment->fresh()->status);
    }

    public function test_admin_can_delete_assignment(): void
    {
        $assignment = Assignment::create([
            'title' => 'To Delete',
            'type' => 'otro',
            'created_by' => $this->admin->id,
            'status' => 'activa',
        ]);

        Livewire::actingAs($this->admin)
            ->test(AssignmentManage::class)
            ->call('delete', $assignment->id);

        $this->assertDatabaseMissing('assignments', ['id' => $assignment->id]);
    }
}
