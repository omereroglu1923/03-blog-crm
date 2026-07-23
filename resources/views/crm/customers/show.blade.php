<x-layout>
    <x-slot:title>{{ $customer->name }}</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <a href="{{ route('crm.customers.index') }}" class="text-sm text-blue-600">&larr; Müşterilere dön</a>

        <div class="flex justify-between items-start mt-4">
            <h1 class="text-2xl font-bold">{{ $customer->name }}</h1>

            @can('update', $customer)
                <a href="{{ route('crm.customers.edit', $customer) }}" class="text-sm text-blue-600">Düzenle</a>
            @endcan
        </div>

        <p class="text-sm text-gray-500 mt-2">
            {{ $customer->company ?? '—' }} · {{ $customer->email ?? '—' }} · {{ $customer->phone ?? '—' }}
        </p>
        <p class="text-xs text-gray-400 mt-1">Ekleyen: {{ $customer->user->name }}</p>

        <hr class="my-8">

        <h2 class="text-xl font-semibold mb-4">Notlar ({{ $customer->notes->count() }})</h2>

        <form method="POST" action="{{ route('crm.notes.store', $customer) }}" class="mb-6">
            @csrf
            <textarea name="body" rows="3" placeholder="Bir not ekle..." class="w-full border rounded px-3 py-2"></textarea>
            @error('body')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded text-sm">Not Ekle</button>
        </form>

        @forelse ($customer->notes()->latest()->get() as $note)
            <div class="mb-4 border-b pb-3">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium">{{ $note->user->name }} <span class="text-gray-400 font-normal">—
                            {{ $note->created_at->format('d.m.Y H:i') }}</span></p>

                    @can('delete', $note)
                        <form method="POST" action="{{ route('crm.notes.destroy', [$customer, $note]) }}"
                            onsubmit="return confirm('Notu silmek istediğine emin misin?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 text-xs">Sil</button>
                        </form>
                    @endcan
                </div>
                <p>{{ $note->body }}</p>
            </div>
        @empty
            <p class="text-gray-500">Henüz not eklenmemiş.</p>
        @endforelse
    </div>
</x-layout>
