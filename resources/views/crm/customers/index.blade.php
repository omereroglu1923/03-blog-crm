<x-layout>
    <x-slot:title>CRM - Müşteriler</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">Müşteriler</h1>

        <form method="GET" action="{{ route('crm.customers.index') }}" class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="İsim veya e-postaya göre ara..." class="w-full border rounded px-3 py-2">
        </form>

        <a href="{{ route('crm.customers.create') }}" class="text-sm text-blue-600 mb-4 inline-block">+ Yeni Müşteri</a>

        @forelse ($customers as $customer)
            <article class="mb-4 border-b pb-3">
                <h2 class="text-lg font-semibold">
                    <a href="{{ route('crm.customers.show', $customer) }}"
                        class="hover:underline">{{ $customer->name }}</a>
                </h2>
                <p class="text-sm text-gray-500">{{ $customer->company ?? '—' }} · {{ $customer->email ?? '—' }}</p>
            </article>
        @empty
            <p>Henüz müşteri eklenmemiş.</p>
        @endforelse
    </div>
</x-layout>
