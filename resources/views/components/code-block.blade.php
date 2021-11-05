<div class="code-container text-right text-lg {{ $cssClass }}">
    @if($showCopyButton)
        <div class="relative copy-code-container">
            <div class="absolute w-24 overflow-x-hidden right-0 copy-code-gradient-container">
                <div class="transition z-10 absolute right-0 copy-code-gradient-right flex justify-end items-center"></div>
            </div>
            <button class="z-20 inline absolute right-0 mt-1 w-24 h-10 copy-code transition filter hover:invert-50" data-code="{{ $slot }}" data-id="{{ md5($slot) }}">
                <span class="z-20 block relative text-sm font-bold right-2">copy</span>
            </button>
        </div>
        <div class="relative transition copy-code-container copied" data-ref="{{ md5($slot) }}">
            <div class="absolute w-48 overflow-x-hidden right-0 copy-code-gradient-container">
                <div class="transition z-30 absolute right-0 copy-code-gradient-right flex justify-end items-center"></div>
            </div>
            <div class="z-40 inline absolute right-0 mt-1 w-10 h-10 copy-code copied">
                <span class="z-40 relative right-12 text-sm font-bold pt-2">copied</span>
            </div>
        </div>
    @endif
    <div class="code my-3 p-3 pl-4 bg-gray-100 text-left flex dont-show-gradient-left">
        <div class="absolute w-24 -mt-3 -ml-4 overflow-x-hidden copy-code-gradient-container">
            <div class="transition absolute w-24 copy-code-gradient-left"></div>
        </div>
        <pre class="pr-12">{{ $slot }}</pre>
        <div class="ml-6"></div>
    </div>
</div>
