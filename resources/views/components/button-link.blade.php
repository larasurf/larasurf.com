<div>
    <a href="{{ $href }}"
       class="
           transition
           bg-{{ $color }}
           hover:bg-{{ $color === 'black' ? 'white' : 'black' }}
           border-2
           border-black
           text-{{ $color === 'black' ? 'white' : 'black' }}
           hover:text-{{ $color === 'black' ? 'black' : 'white' }}
           active:bg-{{ $color }}
           active:text-{{ $color === 'black' ? 'white' : 'black' }}
           rounded-{{ $rounding }}
           px-6
           py-3"
    >{{ $slot }}
    </a>
</div>
