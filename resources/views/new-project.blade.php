@extends('layouts.app')

@section('title', 'New Project - LaraSurf')

@section('content')
    <div class="hidden lg:block static-menu-width">
        <div class="fixed" style="top:9.75rem;">
            <span class="block static-menu-width font-bold text-2xl pl-9 py-2">Generate Project</span>
        </div>
    </div>
    <div class="block lg:hidden">
        <span class="font-bold text-2xl py-2">Generate Project</span>
    </div>
    <div class="relative w-full lg:w-auto content" style="padding-top:1.34rem;">
        <div id="new-project"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/new.js') }}"></script>
@endsection
