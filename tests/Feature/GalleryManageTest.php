<?php

namespace Tests\Feature;

use App\Livewire\Admin\GalleryManage;
use App\Models\GalleryPhoto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryManageTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->admin()->create();
        Storage::fake('public');
    }

    public function test_admin_can_view_gallery_page(): void
    {
        $this->actingAs($this->admin)
            ->get(route('admin.gallery.index'))
            ->assertOk();
    }

    public function test_admin_can_upload_photo(): void
    {
        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->call('openCreate')
            ->assertSet('showForm', true)
            ->set('title', 'Evento 2026')
            ->set('description', 'Foto del evento')
            ->set('category', 'eventos')
            ->set('size', 'landscape')
            ->set('photo', UploadedFile::fake()->image('evento.jpg', 800, 600))
            ->call('save')
            ->assertSet('showForm', false)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('gallery_photos', [
            'title' => 'Evento 2026',
            'category' => 'eventos',
            'uploaded_by' => $this->admin->id,
        ]);
    }

    public function test_upload_validates_required_fields(): void
    {
        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->set('title', '')
            ->set('photo', null)
            ->call('save')
            ->assertHasErrors(['title', 'photo']);
    }

    public function test_upload_validates_category_enum(): void
    {
        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->set('title', 'Test')
            ->set('category', 'invalida')
            ->set('photo', UploadedFile::fake()->image('test.jpg'))
            ->call('save')
            ->assertHasErrors(['category']);
    }

    public function test_admin_can_edit_photo_metadata(): void
    {
        $photo = GalleryPhoto::create([
            'title' => 'Original',
            'category' => 'becarios',
            'image_path' => 'gallery/test.webp',
            'image_name' => 'test.webp',
            'size' => 'landscape',
            'sort_order' => 1,
            'uploaded_by' => $this->admin->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->call('edit', $photo->id)
            ->assertSet('title', 'Original')
            ->set('title', 'Actualizada')
            ->set('category', 'eventos')
            ->call('update')
            ->assertSet('showForm', false)
            ->assertHasNoErrors();

        $this->assertDatabaseHas('gallery_photos', [
            'id' => $photo->id,
            'title' => 'Actualizada',
            'category' => 'eventos',
        ]);
    }

    public function test_admin_can_toggle_photo_visibility(): void
    {
        $photo = GalleryPhoto::create([
            'title' => 'Toggle Test',
            'category' => 'becarios',
            'image_path' => 'gallery/test.webp',
            'image_name' => 'test.webp',
            'size' => 'landscape',
            'sort_order' => 1,
            'is_active' => true,
            'uploaded_by' => $this->admin->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->call('toggleActive', $photo->id);

        $this->assertFalse($photo->fresh()->is_active);
    }

    public function test_admin_can_delete_photo(): void
    {
        Storage::disk('public')->put('gallery/delete-me.webp', 'fake');

        $photo = GalleryPhoto::create([
            'title' => 'Delete Me',
            'category' => 'becarios',
            'image_path' => 'gallery/delete-me.webp',
            'image_name' => 'delete-me.webp',
            'size' => 'landscape',
            'sort_order' => 1,
            'uploaded_by' => $this->admin->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->call('delete', $photo->id);

        $this->assertDatabaseMissing('gallery_photos', ['id' => $photo->id]);
        Storage::disk('public')->assertMissing('gallery/delete-me.webp');
    }

    public function test_cannot_exceed_photo_limit(): void
    {
        for ($i = 0; $i < GalleryPhoto::MAX_PHOTOS; $i++) {
            GalleryPhoto::create([
                'title' => "Photo {$i}",
                'category' => 'becarios',
                'image_path' => "gallery/{$i}.webp",
                'image_name' => "{$i}.webp",
                'size' => 'landscape',
                'sort_order' => $i,
                'uploaded_by' => $this->admin->id,
            ]);
        }

        Livewire::actingAs($this->admin)
            ->test(GalleryManage::class)
            ->call('openCreate')
            ->assertSet('showForm', false);
    }
}
