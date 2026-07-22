<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Blog</h1>
        @auth
            <a href="{{ route('blog.create') }}" class="text-sm text-blue-600 mb-4 inline-block">+ Yeni Post</a>
        @endauth

        @forelse ($posts as $post)
            <article class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500">{{ $post->published_at->format('d.m.Y') }} — {{ $post->user->name }}</p>
                <p class="mt-2">{{ Str::limit($post->body, 150) }}</p>
            </article>
        @empty
            <p>Henüz yayınlanmış post yok.</p>
        @endforelse
    </div>
</x-layout>
