@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <a href="{{ route('posts.index') }}" class="inline-flex items-center text-xs font-mono text-emerald-400 hover:underline">
        &larr; Back to all announcements
    </a>

    <article class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8 space-y-4">
        <div class="flex items-center gap-2">
            @if ($post->is_pinned)
                <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold font-mono px-2 py-0.5 rounded">
                    Pinned
                </span>
            @endif
            <span class="bg-sky-500/20 text-sky-400 border border-sky-500/30 text-xs font-semibold px-2 py-0.5 rounded">
                {{ $post->category }}
            </span>
        </div>

        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">{{ $post->title }}</h1>

        <div class="flex items-center justify-between text-xs font-mono text-slate-400 py-3 border-y border-slate-800">
            <span>Published: {{ $post->published_at->format('M d, Y') }}</span>
            <span>Views: {{ $post->views }}</span>
        </div>

        <div class="text-slate-300 text-sm leading-relaxed whitespace-pre-line pt-2">
            {{ $post->body }}
        </div>
    </article>
</div>
@endsection