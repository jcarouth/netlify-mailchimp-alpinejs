<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description }}">
        <title>{{ $page->title }}</title>
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
        <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
    </head>
    <body class="min-h-screen text-gray-900 font-sans antialiased">
        <div class="flex flex-col min-h-screen">
            <header class="bg-gray-800 text-white">
                <div class="container max-w-6xl mx-auto py-12">
                    <div class="text-3xl">{{ $page->title }}</div>
                </div>
            </header>

            <main class="container h-full max-w-6xl mx-auto mb-auto py-12">
                @yield('body')
            </main>

            <aside class="bg-gray-600 text-white">
                @include('_components/newsletter-footer')
            </aside>

            <footer class="bg-gray-800 py-10 text-white">
                <div class="max-w-6xl mx-auto text-center">
                    This project is <a class="underline" href="https://github.com/jcarouth/netlify-mailchimp-alpinejs/">open source on Github</a>. Created by <a class="underline" href="https://twitter.com/jcarouth">@jcarouth</a>.
                </div>
            </footer>
        </div>
    </body>
</html>
