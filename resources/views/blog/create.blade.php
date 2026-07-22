<x-layout>
    <x-slot:title>Yeni Post</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Yeni Post</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blog.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Başlık</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">İçerik</label>
                <textarea name="body" rows="8" class="w-full border rounded px-3 py-2">{{ old('body') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Yayınla</button>
        </form>
    </div>
</x-layout>
