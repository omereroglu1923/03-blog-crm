<x-layout>
    <x-slot:title>Müşteriyi Düzenle</x-slot:title>

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Müşteriyi Düzenle</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('crm.customers.update', $customer) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">İsim *</label>
                <input type="text" name="name" value="{{ old('name', $customer->name) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">E-posta</label>
                <input type="email" name="email" value="{{ old('email', $customer->email) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Şirket</label>
                <input type="text" name="company" value="{{ old('company', $customer->company) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Güncelle</button>
        </form>

        <form method="POST" action="{{ route('crm.customers.destroy', $customer) }}" class="mt-4"
            onsubmit="return confirm('Bu müşteriyi silmek istediğine emin misin?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 text-sm">Müşteriyi Sil</button>
        </form>
    </div>
</x-layout>
