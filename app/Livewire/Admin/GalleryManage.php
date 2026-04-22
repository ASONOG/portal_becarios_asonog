<?php

namespace App\Livewire\Admin;

use App\Models\GalleryPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

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
            'photo'       => 'required|file|mimetypes:image/jpeg,image/png,image/webp,image/heic,image/heif|max:2048',
        ], $this->validationMessages() + [
            'photo.required' => 'La foto es obligatoria.',
        ]);

        try {
            $path = $this->storeAsWebp($this->photo);
        } catch (Throwable $e) {
            $this->addError('photo', $this->photoProcessingErrorMessage($this->photo));
            return;
        }

        GalleryPhoto::create([
            'title'       => $this->title,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'image_path'  => $path,
            'image_name'  => pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME) . '.webp',
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
            'photo'       => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/heic,image/heif|max:2048',
        ], $this->validationMessages());

        $galleryPhoto = GalleryPhoto::findOrFail($this->editingId);

        $data = [
            'title'       => $this->title,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'size'        => $this->size,
        ];

        if ($this->photo) {
            try {
                $data['image_path'] = $this->storeAsWebp($this->photo);
            } catch (Throwable $e) {
                $this->addError('photo', $this->photoProcessingErrorMessage($this->photo));
                return;
            }

            Storage::disk('public')->delete($galleryPhoto->image_path);
            $data['image_name'] = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
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
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();
        session()->flash('success', 'Foto eliminada.');
    }

    private function storeAsWebp(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string
    {
        $path = 'gallery/' . Str::uuid() . '.webp';

        $encoded = Image::decodePath($file->getRealPath())
            ->encode(new WebpEncoder(quality: 82, strip: true));

        Storage::disk('public')->put($path, $encoded->toStream());

        return $path;
    }

    private function photoProcessingErrorMessage(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string
    {
        $mimeType = strtolower((string) $file->getMimeType());

        if (str_contains($mimeType, 'heic') || str_contains($mimeType, 'heif')) {
            return 'No pudimos procesar este archivo HEIC/HEIF en el servidor actual. Sube la imagen en JPG, PNG o WebP, o en iPhone cambia Camara > Formatos > Mas compatible.';
        }

        return 'No se pudo procesar la imagen seleccionada. Intenta con otro archivo JPG, PNG o WebP.';
    }

    private function validationMessages(): array
    {
        return [
            'title.required'    => 'El título es obligatorio.',
            'title.max'         => 'El título no debe exceder 255 caracteres.',
            'description.max'   => 'La descripción no debe exceder 500 caracteres.',
            'category.required' => 'La categoría es obligatoria.',
            'category.in'       => 'La categoría seleccionada no es válida.',
            'size.required'     => 'El tamaño es obligatorio.',
            'size.in'           => 'El tamaño seleccionado no es válido.',
            'photo.mimetypes'   => 'La imagen debe estar en formato JPG, PNG, WebP o HEIC.',
            'photo.max'         => 'La imagen no debe pesar más de 2 MB.',
        ];
    }

    public function render()
    {
        $photos = GalleryPhoto::orderBy('sort_order')->get();
        $count  = $photos->count();
        $limit  = GalleryPhoto::MAX_PHOTOS;

        return view('livewire.admin.gallery-manage', compact('photos', 'count', 'limit'));
    }
}
