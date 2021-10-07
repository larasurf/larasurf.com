<div class="code-container text-right text-lg {{ $cssClass }}">
    @if($showCopyButton)
        <div class="relative copy-code-container">
            <div class="absolute w-24 overflow-x-hidden right-0 copy-code-gradient-container">
                <div class="transition z-10 absolute right-0 copy-code-gradient-right w-24 flex justify-end items-center"></div>
            </div>
            <button class="z-20 absolute right-0 mt-1 w-10 h-10 copy-code transition filter hover:invert" data-code="{{ $slot }}"></button>
        </div>
    @endif
    <div class="code my-3 p-3 pl-4 bg-gray-100 text-left flex dont-show-gradient-left">
        <div class="absolute w-24 -mt-3 -ml-4 overflow-x-hidden copy-code-gradient-container">
            <div class="transition absolute w-24 copy-code-gradient-left"></div>
        </div>
        <pre class="pr-2">{{ $slot }}</pre>
        <div class="ml-6"></div>
    </div>
</div>
