@extends('layouts.app')

@section('title', 'New Project - LaraSurf')

@section('content')
    <div class="relative" style="max-width: 825px">
        <div class="mt-6">
            <h1 class="text-5xl font-medium">You're almost set!</h1>
        </div>
        <div class="mt-6">
            <h2 class="text-2xl font-medium">Here is the command to generate your project <span class="font-bold">{{ request()->query('name') }}</span></h2>
            <div class="mt-1">
                Copy and paste this into your terminal with a working directory of where you'd like the project to be generated.
            </div>
            <div class="mt-1">
                Be sure to copy the entire command!
            </div>
            <x-code-block>{{ $command }}</x-code-block>
        </div>
        <div class="mt-6 w-full">
            It will take ~15 minutes to generate your project once you have pasted the command into your terminal.
        </div>
        <div class="flex flex-wrap">
            <div class="mt-6 bg-gray-100 px-6 py-4 w-full lg:w-5/6">
                <div>If this is your first time using LaraSurf, we strongly recommend following the documentation.</div>
                <div class="text-right">
                    <a class="font-bold filter transition p-3" href="/docs"><span class="underline">Go to Documentation</span> <img class="ml-1 inline" src="/img/cta-arrow.png"></a>
                </div>
            </div>
            <div class="mt-6 bg-gray-100 px-6 py-4 w-full lg:w-5/6">
                <div>If this is not your first time using LaraSurf, you can follow the TL;DR Checklist for setting up a new project and deploying to Stage and Production.</div>
                <div class="text-right">
                    <a class="font-bold filter transition p-3" href="/docs#tldr-checklist"><span class="underline">Go to Checklist</span> <img class="ml-1 inline" src="/img/cta-arrow.png"></a>
                </div>
            </div>
        </div>
    </div>
@endsection