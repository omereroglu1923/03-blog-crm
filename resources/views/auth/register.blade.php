<x-layout>
    <x-slot:title>Kayıt Ol</x-slot:title>

    <div class="max-w-sm mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Kayıt Ol</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">İsim</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">E-posta</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Şifre</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Şifre (Tekrar)</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Kayıt Ol</button>
        </form>

        <p class="mt-4 text-sm">
            Zaten hesabın var mı? <a href="{{ route('login.create') }}" class="text-blue-600">Giriş yap</a>
        </p>
    </div>
</x-layout>
