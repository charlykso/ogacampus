<section class="mb-4" id="JGdhiue7HSNK2gl">
    <img src="{{ $service->logo ?? asset('images/nothumbnail.jpeg') }}" alt="event banner" class="Lighdr5xWdsdfe">
</section>
<section id="Awxcs3SxfrWrghkpK">
    <div class="flex items-center justify-center">
        <h1 class="text-center">{{ $service->user->profile->full_name }}</h1>
        @if ($service->user->profile->is_verified)
            <img src="{{ asset('svg/Verified.svg') }}" alt="user verified" class="JGDi38HSNKJS__nbj3g">
        @endif
    </div>

    <div class="flex justify-center">
        <span class="GrhKS3SNdEd3">{{ $service->service_name }}</span>
    </div>
    <div class="flex justify-center">
        <img src="{{ asset('svg/Rating-fill.svg') }}" alt="user verified" class="MNS-SN2SO__u3">
        <span class="text__black">4.0 (5 Reviews)</span>
    </div>
</section>