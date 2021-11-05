<div>
    <a href="{{ $href }}"
       id="{{ $id }}"
       class="
           transition
           bg-{{ $color }}
           hover:bg-{{ $color === 'black' ? 'white' : 'black' }}
           border
           border-black
           text-{{ $color === 'black' ? 'white' : 'black' }}
           hover:text-{{ $color === 'black' ? 'black' : 'white' }}
           active:bg-{{ $color }}
           active:text-{{ $color === 'black' ? 'white' : 'black' }}
           rounded-{{ $rounding }}
           px-5
           py-3"
    >{{ $slot }}
    </a>
</div>
