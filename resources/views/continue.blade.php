@extends('layouts.app', ['show_header' => false])

@section('title', 'Continue with GitHub - LaraSurf')

@section('content')
    <div class="flex justify-center items-center" style="height: calc(100vh - 480px)">
        <div>
            <h1 class="text-4xl font-bold">LaraSurf</h1>
            <a href="/continue/github/redirect"
               id="link-continue-github">
                <div class="mt-6 w-full flex items-center justify-center filter
                       invert
                       hover:invert-0
                       hover:border-black
                       transition
                       bg-white
                       border
                       border-white
                       text-black
                       rounded-lg
                       py-3">
                    <img src="/svg/github.svg" alt="GitHub" class="inline mr-2" />
                    Continue with GitHub
                </div>
            </a>
            <div class="mt-4 text-xs">
                By clicking continue, you agree to our <a href="/terms" class="hover:text-gray-400 underline">Terms of Service</a> and <a href="/privacy" class="hover:text-gray-400 underline">Privacy Policy</a>.
            </div>
            <div class="mt-20 w-full border-gray-400 border-b"></div>
            <div class="mt-4 text-sm">
                We won't receive access to any of your repositories.
            </div>
        </div>
    </div>
@endsection
