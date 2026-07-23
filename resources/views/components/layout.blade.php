<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- $title, x-slot:title ile dışarıdan gönderilecek --}}
    <title>{{ $title ?? 'Blog + CRM' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 antialiased">

    <nav class="bg-white border-b px-6 py-4 flex gap-4 items-center">
        <a href="{{ route('blog.index') }}" class="font-semibold">Blog</a>
        <a href="{{ route('crm.customers.index') }}" class="font-semibold">CRM</a>
        <div class="ml-auto flex gap-4 items-center text-sm">
            @auth
                <span>Merhaba, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600">Çıkış Yap</button>
                </form>
            @else
                <a href="{{ route('login.create') }}">Giriş Yap</a>
                <a href="{{ route('register.create') }}">Kayıt Ol</a>
            @endauth
        </div>
    </nav>

    <main>
        {{-- Component'i kullanan sayfanın içeriği burada, "slot" olarak yer alır --}}
        {{ $slot }}
    </main>

</body>

</html>
