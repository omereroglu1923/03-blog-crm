<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <a href="{{ route('blog.index') }}" class="text-sm text-blue-600">&larr; Blog'a dön</a>

        <h1 class="text-2xl font-bold mt-4">{{ $post->title }}</h1>
        <p class="text-sm text-gray-500">{{ $post->published_at->format('d.m.Y') }} — {{ $post->user->name }}</p>

        <div class="mt-4 whitespace-pre-line">{{ $post->body }}</div>

        @can('update', $post)
            <div class="mt-2">
                <a href="{{ route('blog.edit', $post) }}" class="text-sm text-blue-600">Düzenle</a>
            </div>
        @endcan

        <hr class="my-8">

        <h2 class="text-xl font-semibold mb-4">Yorumlar ({{ $post->comments->count() }})</h2>

        @auth
            <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-6">
                @csrf
                <textarea name="body" rows="3" placeholder="Bir yorum yaz..." class="w-full border rounded px-3 py-2"></textarea>
                @error('body')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded text-sm">Yorum Yap</button>
            </form>
        @else
            <p class="text-sm text-gray-500 mb-6">
                Yorum yapmak için <a href="{{ route('login.create') }}" class="text-blue-600">giriş yap</a>.
            </p>
        @endauth

        @forelse ($post->comments as $comment)
            <div class="mb-4 border-b pb-3">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium">{{ $comment->user->name }}</p>

                    @can('delete', $comment)
                        <form method="POST" action="{{ route('comments.destroy', [$post, $comment]) }}"
                            onsubmit="return confirm('Yorumu silmek istediğine emin misin?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 text-xs">Sil</button>
                        </form>
                    @endcan
                </div>
                <p>{{ $comment->body }}</p>
            </div>
        @empty
            <p class="text-gray-500">Henüz yorum yok.</p>
        @endforelse
    </div>
</x-layout>
