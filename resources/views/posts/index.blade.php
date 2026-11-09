@extends('layouts.app')

@section('title', 'Barangay Bulletin - Purok Civiles')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-800 pb-4">
        <h1 class="text-2xl font-black text-white tracking-tight">Barangay Bulletin - Purok Civiles</h1>
    </div>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-3 bg-slate-900 p-4 rounded-xl border border-slate-800">
        <input 
            type="text" 
            name="q" 
            value="{{ request('q') }}" 
            placeholder="Search announcement title..." 
            class="flex-1 bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-emerald-500"
        >
        
        <select name="category" class="bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-emerald-500">
            <option value="">All Categories</option>
            @foreach ($categories as $c)
                <option value="{{ $c }}" {{ request('category') === $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold px-5 py-2 rounded-lg transition">
            Filter
        </button>

        @if(request('q') || request('category'))
            <a href="{{ route('posts.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 text-sm text-center px-4 py-2 rounded-lg transition">
                Reset
            </a>
        @endif
    </form>

    {{-- Announcement Card List --}}
    <div class="space-y-4">
        @forelse ($posts as $post)
            <article class="bg-slate-900 border {{ $post->is_pinned ? 'border-emerald-500/50 bg-slate-900/80' : 'border-slate-800' }} rounded-xl p-5 shadow-sm hover:border-slate-700 transition">
                <div class="flex items-center gap-2 mb-2">
                    @if ($post->is_pinned)
                        <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold font-mono px-2 py-0.5 rounded">
                            Pinned
                        </span>
                    @endif
                    <span class="bg-sky-500/20 text-sky-400 border border-sky-500/30 text-xs font-semibold px-2 py-0.5 rounded">
                        {{ $post->category }}
                    </span>
                </div>

                <h2 class="text-xl font-bold text-white mb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-emerald-400 transition">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-slate-400 text-sm line-clamp-2 mb-4">{{ $post->body }}</p>

                <div class="flex items-center justify-between text-xs font-mono text-slate-500 pt-3 border-t border-slate-800/60">
                    <span>Published: {{ $post->published_at ? $post->published_at->format('M d, Y') : 'N/A' }}</span>
                    <span class="flex items-center gap-3">
                        <span>Author ID: {{ $post->author_id }}</span>
                        <span class="text-slate-400">{{ $post->views }} views</span>
                    </span>
                </div>
            </article>
        @empty
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-8 text-center text-slate-400">
                <p>No posts match your search.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination Controls --}}
    <div class="pt-4 space-y-2">
        {{ $posts->links() }}
        <p class="text-xs font-mono text-slate-500 text-center">
            Showing {{ $posts->firstItem() ?? 0 }}-{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
        </p>
    </div>
</div>
@endsection