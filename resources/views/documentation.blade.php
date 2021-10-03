@extends('layouts.app')

@section('title', 'Documentation - LaraSurf')

@section('content')
    <div class="relative px-6">
        <div class="flex justify-center">
            <div class="hidden lg:block w-1/6"></div>
            <div class="hidden lg:block w-1/6">
                Menu
            </div>
            <div class="w-full lg:w-2/3">
                <div class="max-w-screen-md documentation">
                    @foreach($docs as $doc)
                        <h1 id="{{ $doc['id'] }}" class="text-3xl font-bold mt-12 mb-6"><a class="header-link" href="/docs#{{ $doc['id'] }}">{{ $doc['title'] }}</a></h1>
                        @foreach ($doc['content'] as $content)
                            @if($content['type'] === 'heading-1')
                                <h2 id="{{ $content['id'] }}" class="text-2xl font-bold mt-12 mb-3">
                                    <span class="twa twa-ocean"></span> <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                                </h2>
                            @elseif($content['type'] === 'heading-2')
                                <h3 id="{{ $content['id'] }}" class="text-xl font-bold mt-6 mb-3">
                                    <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                                </h3>
                            @elseif($content['type'] === 'heading-3')
                                <h4 id="{{ $content['id'] }}" class="text-lg font-bold mt-6 mb-3">
                                    <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                                </h4>
                            @elseif($content['type'] === 'paragraph')
                                <p class="my-3">{!! $content['html'] !!}</p>
                            @elseif($content['type'] === 'callout')
                                <div class="my-3 p-3 flex bg-gray-100 rounded">
                                    <div class="flex-shrink pr-3">
                                        <span class="twa twa-ocean"></span>
                                    </div>
                                    <div class="flex-grow">
                                        <p>{!! $content['html'] !!}</p>
                                    </div>
                                </div>
                            @elseif($content['type'] === 'code')
                                <div class="code-container text-right">
                                    <div class="code mt-3 p-3 bg-gray-100 rounded text-left">
                                        <pre>{{ $content['text'] }}</pre>
                                    </div>
                                    @if($content['show-copy-button'] ?? true)
                                        <div>
                                            <button class="copy-code transition bg-black hover:bg-white border-2 border-black text-white hover:text-black active:text-white active:bg-black px-4 py-2 rounded-lg" data-code="{{ $content['text'] }}">Copy</button>
                                        </div>
                                    @endif
                                </div>
                            @elseif($content['type'] === 'image')
                                <div class="my-6 flex justify-center">
                                    <img class="object-contain {{ $content['class'] ?? '' }}" alt="{{ $content['alt'] }}" src="{{ $content['src'] }}"/>
                                </div>
                            @elseif($content['type'] === 'quote')
                                <div class="my-3 flex border-black border-l-4 pl-3">
                                    <p class="italic">{!! $content['html'] !!}</p>
                                </div>
                            @elseif($content['type'] === 'list')
                                <ul class="my-3">
                                    @foreach($content['items'] as $item)
                                        @if (is_array($item))
                                            @foreach($item as $subitem)
                                                <li class="list-circle my-1 ml-12">{!! $subitem !!}</li>
                                            @endforeach
                                        @else
                                            <li class="list-disc my-1 ml-6">{!! $item !!}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
