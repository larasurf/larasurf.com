@extends('layouts.app')

@section('title', 'Documentation - LaraSurf')

@section('content')
    <div id="docs-search" class="hidden lg:block fixed w-full z-50"></div>
    <div class="relative block lg:flex">
        <div id="docs-menu" class="hidden lg:block"></div>
        <div class="documentation-menu lg:hidden">
            <div class="flex mb-3">
                <div class="text-2xl font-bold flex-grow">Documentation</div>
                <div class="text-xl font-bold text-center mt-1 ml-9 lg:mr-9">v1.0</div>
            </div>
            @foreach($docs as $doc)
                <a href="#{{ $doc['id'] }}" class="block menu-item bg-gray-100 font-bold pl-6 py-2 hover:text-gray-400 flex">
                    {{ $doc['title'] }}
                </a>
                @foreach($doc['content'] as $content)
                    @if ($content['type'] === 'heading-1')
                        <a href="#{{ $content['id'] }}" class="block menu-item font-medium pl-9 py-2 mr-9 hover:text-gray-400">
                            {{ $content['text'] }}
                        </a>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div id="documentation-content" class="mt-12 w-full lg:w-auto content">
            @foreach($docs as $doc)
                <x-heading-1 :id="$doc['id']">{{ $doc['title'] }}</x-heading-1>
                @foreach ($doc['content'] as $content)
                    @if($content['type'] === 'heading-1')
                        <x-heading-2 :id="$content['id']">{{ $content['text'] }}</x-heading-2>
                    @elseif($content['type'] === 'heading-2')
                        <x-heading-3 :id="$content['id']">{{ $content['text'] }}</x-heading-3>
                    @elseif($content['type'] === 'paragraph')
                        <x-paragraph>{!! $content['html'] !!}</x-paragraph>
                    @elseif($content['type'] === 'callout')
                        <x-callout>{!! $content['html'] !!}</x-callout>
                    @elseif($content['type'] === 'code')
                        <x-code-block :css-class="$content['class'] ?? ''" :show-copy-button="$content['show-copy-button'] ?? true">{{ $content['text'] }}</x-code-block>
                    @elseif($content['type'] === 'image')
                        <x-image :css-class="$content['class'] ?? ''" :alt="$content['alt']" :src="$content['src']"></x-image>
                    @elseif($content['type'] === 'quote')
                        <x-quote>{!! $content['html'] !!}</x-quote>
                    @elseif($content['type'] === 'checkbox')
                        <x-checkbox>{!! $content['html'] !!}</x-checkbox>
                    @elseif($content['type'] === 'list')
                        <ul class="my-3 text-md">
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
    <x-back-to-top-button></x-back-to-top-button>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.larasurfDocs = @json($docs);
    </script>
    <script src="{{ mix('js/documentation.js') }}"></script>
@endsection

@section('head')
    <link rel="canonical" href="{{ url()->to('/docs') }}" />
@endsection
