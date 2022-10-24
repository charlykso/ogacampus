<section class="mb-4" id="JGdhiue7HSNK2gl">
    <img src="{{ $seller->profile->logo ?? asset('images/nothumbnail.jpeg') }}" alt="event banner" class="Lighdr5xWdsdfe">
</section>
<section id="Awxcs3SxfrWrghkpK">
    <div class="flex items-center justify-center">
        <h1 class="text-center">{{ $seller->profile->full_name }}</h1>
        @if ($seller->profile->is_verified)
            <img src="{{ asset('svg/Verified.svg') }}" alt="user verified" class="JGDi38HSNKJS__nbj3g">
        @endif
    </div>

    <div class="flex justify-center">
        <img src="{{ asset('svg/Rating-fill.svg') }}" alt="user verified" class="MNS-SN2SO__u3">
        <span class="text__black">4.0 (5 Reviews)</span>
    </div>
</section>