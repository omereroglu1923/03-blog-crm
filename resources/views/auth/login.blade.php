<x-layout>
    <x-slot:title>Giriş Yap</x-slot:title>

    <div class="max-w-sm mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Giriş Yap</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">E-posta</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Şifre</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
            </div>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember"> Beni hatırla
            </label>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Giriş Yap</button>
        </form>

        <p class="mt-4 text-sm">
            Hesabın yok mu? <a href="{{ route('register.create') }}" class="text-blue-600">Kayıt ol</a>
        </p>
    </div>
</x-layout>
