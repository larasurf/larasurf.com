@extends('layouts.app')

@section('title', 'How it works - LaraSurf')

@section('content')
    <div class="relative how-it-works documentation lg:mx-auto">
        <x-heading-1 id="title" margin-top="1">How it works</x-heading-1>
        <x-paragraph>LaraSurf is a turnkey solution for hitting the ground running with a fresh Laravel application in a matter of hours instead of days (or weeks), kickstarting your next application by simplifying environment prerequisites and interactions.</x-paragraph>
        <x-heading-2 id="mission">Mission</x-heading-2>
        <x-quote>To provide an end to end solution for new small to medium sized Laravel projects, lowering the barrier of entry for making it to the production and iteration phases of a project, as well as providing tools to enable rapid prototyping and implementation.</x-quote>
        <x-heading-2 id="overview">Overview</x-heading-2>
        <x-paragraph>LaraSurf combines Docker, CircleCI, and AWS to create an end to end solution for generating, deploying, and iterating upon Laravel applications. No more fiddling with different software versions and dockerizing new applications; LaraSurf provides everything needed to spin up a new project and start implementation as quickly as possible.</x-paragraph>
        <x-heading-2 id="guiding-principles">Guiding Principles</x-heading-2>
        <x-paragraph>LaraSurf was created with the following principles in mind:</x-paragraph>
        <ul class="my-3 text-lg">
            <li class="list-disc my-1">Customizing the infrastructure and CI/CD pipelines for LaraSurf projects should be supported</li>
            <li class="list-disc my-1">Laravel-provided authentication starter kits should be supported</li>
            <li class="list-disc my-1">Natively installed software for a local development environment should be limited as much as possible</li>
            <li class="list-disc my-1">AWS and CircleCI web console interaction should be limited as much as possible</li>
            <li class="list-disc my-1">Automation should be heavily preferred when possible</li>
            <li class="list-disc my-1">Application environments should match as closely as possible</li>
        </ul>
        <x-heading-2 id="audience">Audience</x-heading-2>
        <x-paragraph>LaraSurf is intended for Laravel developers looking to kickstart their next application and simplify environment prerequisites and interactions.</x-paragraph>
        <x-paragraph>To feel comfortable using LaraSurf, we recommend at least moderate familiarity with the following concepts:</x-paragraph>
        <ul class="my-3 text-lg">
            <li class="list-disc my-1">Using a Command Line Interface</li>
            <li class="list-disc my-1">Laravel Development</li>
            <li class="list-disc my-1">Images and Containers</li>
            <li class="list-disc my-1">Common Amazon Web Services</li>
        </ul>
        <x-callout>While we <strong>highly recommend</strong> reading the <a href="/docs">Documentation</a> in its entirety before getting started, you can check out the <a href="/docs#tldr-checklist">TL;DR Checklist</a> to guide you through local setup and launch within 90 minutes.</x-callout>
        <x-heading-2 id="opinions">Opinions</x-heading-2>
        <x-paragraph>LaraSurf comes with some opinions about how to interact with and build a Laravel application, allowing for a swift turn around time from inception to deployment and beyond.</x-paragraph>
        <x-paragraph>These opinions include matters of version control, CI/CD, cloud infrastructure, secrets management, Laravel features, and application environments (including local development).</x-paragraph>
        <x-paragraph>Of course, you are free to customize your project however you wish. Out-of-the-box LaraSurf is intended to be starting point and can be built on top of.</x-paragraph>
        <x-callout>For a more in depth description of assumptions made by LaraSurf, head on over to the <a href="/docs">Overview</a> section of the documentation.</x-callout>
    </div>
    <x-back-to-top-button css-class="lg:hidden"></x-back-to-top-button>
@endsection
