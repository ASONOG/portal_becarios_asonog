<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_admin_routes(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk();
    }

    public function test_becario_cannot_access_admin_routes(): void
    {
        $becario = User::factory()->create(['role' => 'becario']);

        $this->actingAs($becario)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_cannot_access_becario_routes(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('becario.dashboard'))
            ->assertForbidden();
    }

    public function test_becario_can_access_becario_routes(): void
    {
        $becario = User::factory()->create(['role' => 'becario']);

        $this->actingAs($becario)
            ->get(route('becario.dashboard'))
            ->assertOk();
    }

    public function test_guest_cannot_access_protected_routes(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));

        $this->get(route('becario.dashboard'))
            ->assertRedirect(route('login'));
    }
}
