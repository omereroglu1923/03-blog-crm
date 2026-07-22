<x-layout>
    <x-slot:title>Postu Düzenle</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Postu Düzenle</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blog.update', $post) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Başlık</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">İçerik</label>
                <textarea name="body" rows="8" class="w-full border rounded px-3 py-2">{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Güncelle</button>
        </form>

        <form method="POST" action="{{ route('blog.destroy', $post) }}" class="mt-4"
            onsubmit="return confirm('Bu postu silmek istediğine emin misin?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 text-sm">Postu Sil</button>
        </form>
    </div>
</x-layout>
