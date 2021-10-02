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
                <div class="mt-16 max-w-screen-md documentation">
                    @foreach($docs as $doc)
                        <h1 class="text-3xl font-bold mb-6">{{ $doc['title'] }}</h1>
                        @foreach ($doc['content'] as $content)
                            @if($content['type'] === 'heading-1')
                                <h2 id="{{ $content['id'] }}" class="text-2xl font-bold mt-6 mb-3">
                                    <span class="twa twa-ocean"></span> <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                                </h2>
                            @elseif($content['type'] === 'heading-2')
                                <h3 id="{{ $content['id'] }}" class="text-xl font-bold mt-6 mb-3">
                                    <a class="header-link" href="/docs#{{ $content['id'] }}">{{ $content['text'] }}</a>
                                </h3>
                            @elseif($content['type'] === 'paragraph')
                                <p class="my-3">{!! $content['html'] !!}</p>
                            @elseif($content['type'] === 'callout')
                                <div class="my-3 flex bg-gray-100 rounded p-3">
                                    <div class="flex-shrink pr-3">
                                        <span class="twa twa-ocean"></span>
                                    </div>
                                    <div class="flex-grow">
                                        <p>{!! $content['html'] !!}</p>
                                    </div>
                                </div>
                            @elseif($content['type'] === 'image')
                                <div class="my-6">
                                    <img class="object-contain w-full" alt="{{ $content['alt'] }}" src="{{ $content['src'] }}"/>
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
