<?php

namespace App\Livewire\Admin;

use App\Models\GalleryPhoto;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Galería de Fotos')]
class GalleryManage extends Component
{
    use WithFileUploads;

    public bool $showForm = false;

    public string $title       = '';
    public string $description = '';
    public string $category    = 'becarios';
    public string $size        = 'landscape';
    public $photo;

    public ?int $editingId = null;

    public function openCreate(): void
    {
        if (GalleryPhoto::hasReachedLimit()) {
            session()->flash('error', 'Se alcanzó el límite de ' . GalleryPhoto::MAX_PHOTOS . ' fotos. Elimina alguna antes de agregar otra.');
            return;
        }

        $this->reset(['title', 'description', 'category', 'size', 'photo', 'editingId']);
        $this->showForm = true;
    }

    public function save(): void
    {
        if (GalleryPhoto::hasReachedLimit()) {
            session()->flash('error', 'Se alcanzó el límite de ' . GalleryPhoto::MAX_PHOTOS . ' fotos.');
            return;
        }

        $this->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category'    => 'required|in:becarios,voluntariados,eventos,comunidades',
            'size'        => 'required|in:landscape,portrait,landscape-lg',
            'photo'       => 'required|image|max:2048',
        ]);

        $path = $this->photo->store('gallery', 'public');

        GalleryPhoto::create([
            'title'       => $this->title,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'image_path'  => $path,
            'image_name'  => $this->photo->getClientOriginalName(),
            'size'        => $this->size,
            'sort_order'  => GalleryPhoto::max('sort_order') + 1,
            'uploaded_by' => auth()->id(),
        ]);

        $this->reset(['title', 'description', 'category', 'size', 'photo', 'showForm']);
        session()->flash('success', 'Foto agregada a la galería.');
    }

    public function edit(int $id): void
    {
        $photo = GalleryPhoto::findOrFail($id);

        $this->editingId   = $photo->id;
        $this->title       = $photo->title;
        $this->description = $photo->description ?? '';
        $this->category    = $photo->category;
        $this->size        = $photo->size;
        $this->photo       = null;
        $this->showForm    = true;
    }

    public function update(): void
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category'    => 'required|in:becarios,voluntariados,eventos,comunidades',
            'size'        => 'required|in:landscape,portrait,landscape-lg',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $galleryPhoto = GalleryPhoto::findOrFail($this->editingId);

        $data = [
            'title'       => $this->title,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'size'        => $this->size,
        ];

        if ($this->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($galleryPhoto->image_path);
            $data['image_path'] = $this->photo->store('gallery', 'public');
            $data['image_name'] = $this->photo->getClientOriginalName();
        }

        $galleryPhoto->update($data);

        $this->reset(['title', 'description', 'category', 'size', 'photo', 'showForm', 'editingId']);
        session()->flash('success', 'Foto actualizada.');
    }

    public function cancelEdit(): void
    {
        $this->reset(['title', 'description', 'category', 'size', 'photo', 'showForm', 'editingId']);
    }

    public function toggleActive(int $id): void
    {
        $photo = GalleryPhoto::findOrFail($id);
        $photo->update(['is_active' => !$photo->is_active]);
    }

    public function delete(int $id): void
    {
        $photo = GalleryPhoto::findOrFail($id);
        \Illuminate\Support\Facades\Storage::disk('public')->delete($photo->image_path);
        $photo->delete();
        session()->flash('success', 'Foto eliminada.');
    }

    public function render()
    {
        $photos = GalleryPhoto::orderBy('sort_order')->get();
        $count  = $photos->count();
        $limit  = GalleryPhoto::MAX_PHOTOS;

        return view('livewire.admin.gallery-manage', compact('photos', 'count', 'limit'));
    }
}
