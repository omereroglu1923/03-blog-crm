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

        <h2 class="text-xl font-semibold mb-4">Notlar</h2>
        <p class="text-gray-500">Not ekleme özelliği bir sonraki adımda gelecek.</p>
    </div>
</x-layout>
