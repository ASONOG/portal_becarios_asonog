@props([
    'title',
    'description',
])

<div class="mb-6">
    <h1 class="text-2xl font-bold text-zinc-900">{{ $title }}</h1>
    @if($description)
    <p class="text-zinc-500 text-sm mt-1">{{ $description }}</p>
    @endif
</div>
