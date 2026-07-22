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

    <nav class="bg-white border-b px-6 py-4 flex gap-4">
        <a href="{{ route('blog.index') }}" class="font-semibold">Blog</a>
        {{-- CRM linki Adım 6'da eklenecek --}}
    </nav>

    <main>
        {{-- Component'i kullanan sayfanın içeriği burada, "slot" olarak yer alır --}}
        {{ $slot }}
    </main>

</body>

</html>
