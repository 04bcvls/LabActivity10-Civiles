<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Barangay Bulletin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col font-sans">
    <header class="bg-slate-900 border-b border-slate-800 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="{{ route('posts.index') }}" class="text-emerald-400 font-black text-lg tracking-tight">
                Barangay Bulletin
            </a>
            <span class="text-slate-600">|</span>
            <span class="text-xs font-mono text-slate-400">Purok Civiles Desk</span>
        </div>
    </header>

    <main class="flex-1 max-w-5xl w-full mx-auto p-6 md:p-8">
        @yield('content')
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 px-6 py-4 text-center text-xs text-slate-500">
        Barangay Bulletin &copy; 2026 Matina Crossing, Davao City. Built by Christian Civiles.
    </footer>
</body>
</html>