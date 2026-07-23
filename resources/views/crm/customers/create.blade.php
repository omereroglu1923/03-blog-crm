<x-layout>
    <x-slot:title>Yeni Müşteri</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Yeni Müşteri</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('crm.customers.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">İsim *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">E-posta</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Şirket</label>
                <input type="text" name="company" value="{{ old('company') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Kaydet</button>
        </form>
    </div>
</x-layout>
