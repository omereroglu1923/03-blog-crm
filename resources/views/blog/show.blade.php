<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <a href="{{ route('blog.index') }}" class="text-sm text-blue-600">&larr; Blog'a dön</a>

        <h1 class="text-2xl font-bold mt-4">{{ $post->title }}</h1>
        <p class="text-sm text-gray-500">{{ $post->published_at->format('d.m.Y') }} — {{ $post->user->name }}</p>

        <div class="mt-4 whitespace-pre-line">{{ $post->body }}</div>

        <hr class="my-8">

        <h2 class="text-xl font-semibold mb-4">Yorumlar ({{ $post->comments->count() }})</h2>

        @forelse ($post->comments as $comment)
            <div class="mb-4 border-b pb-3">
                <p class="text-sm font-medium">{{ $comment->user->name }}</p>
                <p>{{ $comment->body }}</p>
            </div>
        @empty
            <p class="text-gray-500">Henüz yorum yok.</p>
        @endforelse
    </div>
</x-layout>
