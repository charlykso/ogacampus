@extends('layouts.guest')

@section('content')
    @include('partials._service_tab')

    <service-filter :category-id="{{ json_encode($selectedCategory) }}" :url="{{ json_encode(Request::fullUrl()) }}" :categories="{{ $categories }}"></service-filter>

    <div class="app__container JBskpSwjaks93S">
        @if ($selectedCategory)
            <h1 class="JHS83hKSj2nbdcp mb-6">{{ $categories->where('id', $selectedCategory)->first()->name }}</h1>
        @else
            <h1 class="JHS83hKSj2nbdcp mb-6">{{ $title }}</h1>
        @endif
        <div class="mt-4">
            @foreach ($services as $service)
                <service-listing-card :service="{{ json_encode($service) }}" :url="{{ json_encode(route('services.slug', $service->uuid)) }}"></service-listing-card>
            @endforeach
            <div class="mt-8 mb-16">
                <div class="flex justify-between">
                    @if ($services->currentPage() > 1)
                        <a href="{{ $services->previousPageUrl() }}" class="flex items-center">
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
                        <span>{{ $services->currentPage() }}</span>
                        <span class="text__grey">/ {{ $services->lastPage() }}</span>
                    </div>
                    @if ($services->lastPage() == $services->currentPage())
                        <button class="flex items-center">
                            <span class="Fru2Sn20DN2lhdf inactive__pagination">Next Page</span>
                            <img src="/svg/Arrow-Right-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                        </button>
                    @else
                        <a href="{{ $services->nextPageUrl() }}" class="flex items-center">
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
                    <h1 class="JoX__Xnzkh3e9JS">Get paid for your services</h1>
                    <p class="text__black JHSjhsh38jS mt-6">
                        List your services on {{ config('app.name') }} to reach thousands of potential clients and start getting paid.
                    </p>

                    <div class="mt-10">
                        <button class="app__button btn__purple w-32">List Services</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
