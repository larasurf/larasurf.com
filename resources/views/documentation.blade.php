@extends('layouts.app')

@section('title', 'Documentation - LaraSurf')

@section('content')
    <div class="relative flex">
        <div class="hidden lg:block documentation-menu">
            <div id="docs-menu"></div>
        </div>
        <div class="documentation">
            @foreach($docs as $doc)
                <h1 id="{{ $doc['id'] }}" class="text-3xl font-bold mt-12 mb-6">
                    <span class="twa twa-ocean"></span> <a class="header-link" href="/docs#{{ $doc['id'] }}">{{ $doc['title'] }}</a>
                </h1>
                @foreach ($doc['content'] as $content)
                    @if($content['type'] === 'heading-1')
                        <h2 id="{{ $content['id'] }}" class="text-2xl font-bold mt-12 mb-3">
                            <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                        </h2>
                    @elseif($content['type'] === 'heading-2')
                        <h3 id="{{ $content['id'] }}" class="text-lg font-bold mt-6 mb-3">
                            <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                        </h3>
                    @elseif($content['type'] === 'paragraph')
                        <p class="my-3 text-lg">{!! $content['html'] !!}</p>
                    @elseif($content['type'] === 'callout')
                        <div class="my-3 p-3 text-lg flex bg-gray-100 rounded-lg">
                            <div class="flex-shrink pr-3">
                                <span class="twa twa-ocean"></span>
                            </div>
                            <div class="flex-grow">
                                <p>{!! $content['html'] !!}</p>
                            </div>
                        </div>
                    @elseif($content['type'] === 'code')
                        <div class="code-container text-right text-lg {{ $content['class'] ?? '' }}">
                            @if($content['show-copy-button'] ?? true)
                                <div class="relative copy-code-container">
                                    <div class="absolute w-24 overflow-x-hidden right-0 copy-code-gradient-container">
                                        <div class="rounded-lg transition z-10 absolute right-0 copy-code-gradient-right w-24 flex justify-end items-center"></div>
                                    </div>
                                    <button class="z-20 absolute right-0 mt-1 w-10 h-10 copy-code transition filter hover:invert" data-code="{{ $content['text'] }}"></button>
                                </div>
                            @endif
                            <div class="code my-3 p-3 pl-4 bg-gray-100 rounded-lg text-left flex dont-show-gradient-left">
                                <div class="absolute w-24 -mt-3 -ml-4 overflow-x-hidden copy-code-gradient-container">
                                    <div class="rounded-lg transition absolute w-24 copy-code-gradient-left"></div>
                                </div>
                                <pre class="pr-2">{{ $content['text'] }}</pre>
                                <div class="ml-6"></div>
                            </div>
                        </div>
                    @elseif($content['type'] === 'image')
                        <div class="my-6 flex justify-center">
                            <img class="object-contain {{ $content['class'] ?? '' }}" alt="{{ $content['alt'] }}" src="{{ $content['src'] }}"/>
                        </div>
                    @elseif($content['type'] === 'quote')
                        <div class="my-3 text-lg flex border-black border-l-4 pl-3">
                            <p class="italic">{!! $content['html'] !!}</p>
                        </div>
                    @elseif($content['type'] === 'checkbox')
                        <div class="flex my-2 text-lg">
                            <label class="checkbox bounce">
                                <span class="flex">
                                    <span><input type="checkbox">
                                        <svg viewBox="0 0 21 21">
                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                        </svg>
                                    </span>
                                    <span class="checkbox-content">{!! $content['html'] !!}</span>
                                </span>
                            </label>
                        </div>
                    @elseif($content['type'] === 'list')
                        <ul class="my-3 text-lg">
                            @foreach($content['items'] as $item)
                                @if (is_array($item))
                                    @foreach($item as $subitem)
                                        @if (is_array($subitem))
                                            @foreach ($subitem as $subsubitem)
                                                <li class="list-square my-1">{!! $subsubitem !!}</li>
                                            @endforeach
                                        @else
                                            <li class="list-circle my-1">{!! $subitem !!}</li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="list-disc my-1">{!! $item !!}</li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.larasurfDocs = @json($docs);
    </script>
    <script src="{{ asset('js/documentation.js') }}"></script>
@endsection
