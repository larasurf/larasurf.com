@extends('layouts.app')

@section('title', 'Custom Projects - LaraSurf')

@section('content')
    @if (empty($is_submitted))
        <div class="hidden lg:block static-menu-width">
            <div class="fixed" style="top:9.75rem;">
                <a href="#title" class="block static-menu-width bg-gray-100 font-bold pl-9 py-2 hover:text-gray-400">Custom Projects</a>
                <a href="#services" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">Services</a>
                <a href="#how-it-works" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">How it works</a>
                <a href="#project-details" class="block static-menu-width font-medium pl-12 py-2 hover:text-gray-400">Project Details</a>
            </div>
        </div>
        <div class="relative content w-full lg:w-auto pt-2">
            <x-heading-1 id="title" margin-top="1">Custom Projects</x-heading-1>
            <x-heading-2 id="services">Services</x-heading-2>
            <x-paragraph>Do you need a custom built solution? We offer services ranging from custom infrastructure and CI/CD pipelines to implementing a full MVP.</x-paragraph>
            <x-heading-2 id="how-it-works">How it works</x-heading-2>
            <x-paragraph>1. Send us your requirements</x-paragraph>
            <x-paragraph>2. If we're a good fit, we will provide a quote and draft a contract</x-paragraph>
            <x-paragraph>3. We always receive 50% of the payment upfront and the remaining 50% upon delivery</x-paragraph>
            <x-heading-2 id="project-details">Submit your project details</x-heading-2>
            <form method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2 text-gray-700" for="name">
                        Your Name (First & Last)
                    </label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('name') border-red-700 @else border-gray-700 @enderror" id="name" name="name" type="text" placeholder="Sam Smith" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2 text-gray-700" for="email">
                        Your Email
                    </label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('email') border-red-700 @else border-gray-700 @enderror" id="email" name="email" type="email" placeholder="sam.smith@example.com" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2 text-gray-700" for="budget">
                        What is your estimated budget?
                    </label>
                    <div>
                        <div class="select-wrap">
                            <select class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('budget') border-red-700 @else border-gray-700 @enderror" id="budget" name="budget">
                                <option value="" disabled {{ empty(old('budget')) ? 'selected' : '' }}>Please select an option</option>
                                <option value="less-than-5000" {{ old('budget') === 'less-than-5000' ? 'selected' : '' }}>Less than $5,000</option>
                                <option value="5000-10000" {{ old('budget') === '5000-10000' ? 'selected' : '' }}>$5,000 to $10,000</option>
                                <option value="10000-25000" {{ old('budget') === '10000-25000' ? 'selected' : '' }}>$10,000 to $25,000</option>
                                <option value="25000-50000" {{ old('budget') === '25000-50000' ? 'selected' : '' }}>$25,000 to $50,000</option>
                                <option value="50000-100000" {{ old('budget') === '50000-100000' ? 'selected' : '' }}>$50,000 to $100,000</option>
                                <option value="more-than-100000" {{ old('budget') === 'more-than-100000' ? 'selected' : '' }}>More than $100,000</option>
                            </select>
                        </div>
                    </div>
                    @error('budget')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2 text-gray-700" for="deadline">
                        When do you need this project completed?
                    </label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('deadline') border-red-700 @else border-gray-700 @enderror" id="deadline" name="deadline" type="date" placeholder="mm/dd/yyyy" min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" value="{{ old('deadline') }}">
                    @error('deadline')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2 text-gray-700" for="description">
                        Please describe your project in detail
                    </label>
                    <textarea rows="6" minlength="100" maxlength="10000" class="border  rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('description') border-red-700 @else border-gray-700 @enderror" id="description" name="description" placeholder="I would like help creating...">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 text-right">
                    <button class="transition bg-black hover:bg-white border border-black text-white hover:text-black active:bg-black active:text-white px-5 py-3" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    @else
        <div class="relative w-full lg:w-auto pt-2 pb-0 mb-52 lg:pb-64 lg:mb-96">
            <h1 class="text-3xl font-bold my-12">Thanks!</h1>
            <x-paragraph>We appreciate your interest. Your message has been received and we'll be in touch soon!</x-paragraph>
        </div>
    @endif
@endsection
