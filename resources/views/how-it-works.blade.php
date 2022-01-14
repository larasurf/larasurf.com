@extends('layouts.app')

@section('title', 'How it works - LaraSurf')

@section('content')
    <div class="hidden lg:block static-menu-width">
        <div class="fixed static-side-menu">
            <a href="#title" class="block static-menu-width bg-gray-100 font-bold pl-9 py-2 hover:text-gray-400">How it works</a>
            <a href="#project-generation" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">Project Generation</a>
            <a href="#assumed-needs" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">Assumed Needs</a>
            <a href="#cloud-infrastructure" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">Cloud Infrastructure</a>
            <a href="#circleci-pipeline" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">CircleCI Pipeline</a>
        </div>
    </div>
    <div class="relative content w-full lg:w-auto pt-2">
        <x-heading-1 id="title" margin-top="1">How it works</x-heading-1>
        <x-paragraph>LaraSurf combines Docker, CircleCI, and AWS to create an end to end solution for generating, deploying, and iterating upon Laravel applications. No more fiddling with different software versions and dockerizing new applications; LaraSurf provides everything needed to spin up a new project and start implementation as quickly as possible.</x-paragraph>
        <x-heading-2 id="project-generation">Project Generation</x-heading-2>
        <x-paragraph>LaraSurf projects start with configuring your desired options. A fresh Laravel project is generated by running the provided project generation command. When the command has finished, you'll have a ready-to-go development environment that mirrors what will be deployed to the cloud.</x-paragraph>
        <x-image css-class="w-full lg:w-4/5" alt="LaraSurf Project Generation" src="/svg/project-generation.svg"></x-image>
        <x-heading-2 id="assumed-needs">Assumed Needs</x-heading-2>
        <x-paragraph>LaraSurf projects come with a preconfigured CloudFormation template, a preconfigured CircleCI configuration, and CLI commands to help along the way.</x-paragraph>
        <x-paragraph>Out of the box, LaraSurf assumes your project will need all of the following:</x-paragraph>
        <div class="flex flex-col lg:flex-row">
            <ul class="my-3 text-md lg:w-1/3">
                <li class="list-disc my-1">Application Load Balancer</li>
                <li class="list-disc my-1">Webserver (NGINX)</li>
                <li class="list-disc my-1">FastCGI daemon for <br/>PHP 8 (PHP-FPM)</li>
                <li class="list-disc my-1">MySQL 8 database</li>
                <li class="list-disc my-1">Private S3 bucket</li>
            </ul>
            <ul class="my-3 text-md lg:w-1/3">
                <li class="list-disc my-1">Redis cluster</li>
                <li class="list-disc my-1">Queue worker support</li>
                <li class="list-disc my-1">Scheduled commands</li>
                <li class="list-disc my-1">Environment variables</li>
                <li class="list-disc my-1">Centralized Logging</li>
            </ul>
            <ul class="my-3 text-md lg:w-1/3">
                <li class="list-disc my-1">DNS record</li>
                <li class="list-disc my-1">TLS certificate</li>
                <li class="list-disc my-1">Outbound emails</li>
                <li class="list-disc my-1">Vulnerability scanning</li>
                <li class="list-disc my-1">CI/CD</li>
            </ul>
        </div>
        <x-paragraph>But don't worry, you are free to customize the provided CloudFormation template and CircleCI configuration however you see fit.</x-paragraph>
        <x-heading-2 id="cloud-infrastructure">Cloud Infrastructure</x-heading-2>
        <x-paragraph>The default cloud infrastructure that will be created by LaraSurf is, at a high level, outlined in the below diagram.</x-paragraph>
        <x-image css-class="w-full lg:w-4/5" alt="LaraSurf Default Cloud Infrastructure" src="/svg/cloud-infrastructure.svg"></x-image>
        <x-heading-2 id="circleci-pipeline">CircleCI Pipeline</x-heading-2>
        <x-paragraph>The default CircleCI pipeline as configured by LaraSurf will required container images, run PHPUnit tests, publish container images, scan container images and dependencies for known vulnerabilities, update the relevant CloudFormation stack (including environment variables), and run database migrations.</x-paragraph>
        <x-paragraph>A high level diagram outlining this pipeline is below.</x-paragraph>
        <x-image css-class="w-full lg:w-4/5" alt="LaraSurf Default CircleCI Pipeline" src="/svg/circleci-pipeline.svg"></x-image>
        <x-paragraph>Before getting started with LaraSurf, you are <strong>strongly encouraged</strong> to <a href="/docs">read the documentation</a>.</x-paragraph>
        <x-paragraph>If you encounter a bug or need some help troubleshooting, don't hesitate to open an issue on GitHub or join or Slack workspace. Happy building!</x-paragraph>
    </div>
    <x-back-to-top-button css-class="lg:hidden"></x-back-to-top-button>
@endsection
