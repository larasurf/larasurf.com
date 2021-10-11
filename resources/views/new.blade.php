@extends('layouts.app')

@section('title', 'New Project - LaraSurf')

@section('content')
    <div class="relative">
        <div class="mt-6">
            <h1 class="text-5xl font-medium">Generate My Project</h1>
        </div>
        <div class="w-full border-b border-black my-12"></div>
        <div id="new-project"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/new.js') }}"></script>
@endsection
