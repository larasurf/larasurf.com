@extends('layouts.app')

@section('content')
    <div class="relative">
        <div class="flex justify-center mt-16 lg:mt-48 mb-32 lg:mb-48">
            <div class="text-center absolute">
                <h1 class="text-3xl lg:text-5xl font-medium">Build with LaraSurf</h1>
                <div class="text-md lg:text-2xl mt-6 mx-3 lg:mx-6">
                    <div id="home-typer"></div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-12 lg:mt-18">
            <div class="flex flex-wrap w-full lg:w-3/5 items-center justify-center">
                <div class="w-1/3 flex items-center justify-center mt-3 md:mt-0">
                    <div class="hero-icon generate absolute bg-white border border-black rounded-full p-8 mb-6 filter transition hover:invert hover:bg-white"></div>
                    <div class="text-md lg:text-lg mt-24 font-medium">1. Generate</div>
                </div>
                <div class="w-1/3 flex items-center justify-center mt-3 md:mt-0">
                    <div class="hero-icon implement absolute bg-white border border-black rounded-full p-8 mb-6 filter transition hover:invert hover:bg-white"></div>
                    <div class="text-md lg:text-lg mt-24 font-medium">2. Implement</div>
                </div>
                <div class="w-1/3 flex items-center justify-center mt-3 md:mt-0">
                    <div class="hero-icon deploy absolute bg-white border border-black rounded-full p-8 mb-6 filter transition hover:invert hover:bg-white"></div>
                    <div class="text-md lg:text-lg mt-24 font-medium">3. Deploy</div>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-16 max-w-2xl">
            <span class="text-lg">
                LaraSurf combines Docker, CircleCI, and AWS to create an end to end solution for implementing and deploying new Laravel applications.
            </span>
        </div>
        <div class="mx-auto mt-4 max-w-2xl">
            <span class="text-lg">
                A fully functional AWS CloudFormation template paired with a preconfigured CircleCI configuration file mean you're up and running quickly with cloud infrastructure CI/CD and pipelines for your Stage or Production environments.
            </span>
        </div>
        <div class="mx-auto mt-4 max-w-2xl">
            <span class="text-lg">
                LaraSurf is not a middle-man charging you to sublet AWS; we only charge a single payment per project.
            </span>
        </div>
        <div class="mx-auto mt-4 max-w-2xl">
            <span class="text-lg">
                Interacting with a containerized local development environment or your cloud infrastructure is a piece of cake with the LaraSurf CLI.
            </span>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
