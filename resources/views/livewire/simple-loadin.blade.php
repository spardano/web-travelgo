<div class="text-center simple-loading" wire:loading @if($target != null) wire:target="{{ $target }}" @endif>
    <span class="svg-icon svg-icon-3x">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            {{-- <path d="M17 7V17H7V7H17ZM20 3H4C3.4 3 3 3.4 3 4V20C3 20.6 3.4 21 4 21H20C20.6 21 21 20.6 21 20V4C21 3.4 20.6 3 20 3Z" fill="currentColor"/> --}}
            <image xlink:href="{{ asset('assets/img/bars-loading.svg') }}" src="yourfallback.png" width="24" height="24"/>
        </svg>
    </span>
    <br>
    <span class="text-dark">{{ $message }}</span>
</div>
