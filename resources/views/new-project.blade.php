@extends('layouts.app')

@section('title', 'New Project - LaraSurf')

@section('content')
    <div class="hidden lg:block static-menu-width">
        <div class="fixed static-side-menu flex">
            <div class="flex-shrink pt-4 mr-3">
                <img src="/svg/arrow-down.svg" alt="menu" />
                <div class="border-l border-gray-100 relative static-side-menu-line"></div>
            </div>
            <div class="flex-grow">
                <span class="block static-menu-width font-medium text-lg pl-6 py-2 hover:text-gray-400 cursor-pointer">Generate Project</span>
                <span class="block static-menu-width font-medium pl-9 py-2 hover:text-gray-400 cursor-pointer">Project Name</span>
                <span class="block static-menu-width font-medium pl-9 py-2 hover:text-gray-400 cursor-pointer">Environments</span>
                <span class="block static-menu-width font-medium pl-9 py-2 hover:text-gray-400 cursor-pointer">Preset</span>
                <span class="block static-menu-width font-medium pl-9 py-2 hover:text-gray-400 cursor-pointer">Miscellaneous</span>
                <span class="block static-menu-width font-medium pl-9 py-2 hover:text-gray-400 cursor-pointer">Local Ports</span>
            </div>
        </div>
    </div>
    <div class="relative w-full lg:w-auto content pt-6">
        <div id="new-project"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/new.js') }}"></script>
@endsection

@section('head')
    <link rel="canonical" href="{{ url()->to('/new') }}" />
@endsection
