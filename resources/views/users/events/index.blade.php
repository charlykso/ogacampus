@extends('layouts.guest')

@section('content')
    @include('partials._service_tab')

    <event-filter :category-id="{{ json_encode($selectedCategory) }}" :url="{{ json_encode(Request::fullUrl()) }}" :categories="{{ $categories }}"></event-filter>

    <div class="app__container JBskpSwjaks93S">
        @if ($selectedCategory)
            <h1 class="JHS83hKSj2nbdcp mb-6">{{ $categories->where('id', $selectedCategory)->first()->name }}</h1>
        @else
            <h1 class="JHS83hKSj2nbdcp mb-6">{{ $title }}</h1>
        @endif
        <div class="mt-4">
            @foreach ($events as $event)
                <event-listing-card :event="{{ json_encode($event) }}" :url="{{ json_encode(route('events.slug', $event->uuid)) }}"></event-listing-card>
            @endforeach
            <div class="mt-8 mb-16">
                <div class="flex justify-between">
                    @if ($events->currentPage() > 1)
                        <a href="{{ $events->previousPageUrl() }}" class="flex items-center">
                            <img src="/svg/Arrow-Left-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                            <span class="Lkdoi39SM2dQ">Previous Page</span>
                        </a>
                    @else
                        <button class="flex items-center">
                            <img src="/svg/Arrow-Left-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                            <span class="Lkdoi39SM2dQ inactive__pagination">Previous Page</span>
                        </button>
                    @endif
                    <div>
                        <span>{{ $events->currentPage() }}</span>
                        <span class="text__grey">/ {{ $events->lastPage() }}</span>
                    </div>
                    @if ($events->lastPage() == $events->currentPage())
                        <button class="flex items-center">
                            <span class="Fru2Sn20DN2lhdf inactive__pagination">Next Page</span>
                            <img src="/svg/Arrow-Right-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                        </button>
                    @else
                        <a href="{{ $events->nextPageUrl() }}" class="flex items-center">
                            <span class="Fru2Sn20DN2lhdf">Next Page</span>
                            <img src="/svg/Arrow-Right-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                        </a>
                    @endif
                </div>
            </div>
        </div>

        @include('partials._section_seperator')
        <section class="KHks933ndpsN2bCvbreSdfg">
            <div class="flex">
                <div class="md:w-10/12 w-full mx-auto text-center">
                    <h1 class="JoX__Xnzkh3e9JS">Organizing an event?</h1>
                    <p class="mt-6 text__black JHSjhsh38jS">
                        Are you en event planner?
                    </p>
                    <p class="text__black JHSjhsh38jS">
                        Manage and boost your event attendance with {{ config('app.name') }} today.
                    </p>

                    <div class="mt-10">
                        <button class="app__button btn__purple w-32">Post Event</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
