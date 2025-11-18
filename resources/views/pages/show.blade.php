@extends('layouts.base')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-4 lg:px-8 py-12">
    <article class="bg-gray-50 shadow-sm rounded-lg overflow-hidden">
        {{-- Page Title --}}
        <header class="p-4 sm:py-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">
                {{ $page->title }}
            </h1>
        </header>

        {{-- Page Content --}}
        <div class="prose lg:prose-md prose-hr:m-2 max-w-none px-6 pb-2">
            {!! $page->content !!}
        </div>
    </article>
</div>
@endsection
