@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Back</span>
        </button>    
        <div>
            <button class="rSFe3SHfrSkfp">
                <img src="{{ asset('svg/Share.svg') }}" alt="share">
            </button>
            <button class="Hjdh83hnLSHKfopGd">
                <img src="{{ asset('svg/Bookmark.svg') }}" alt="">
            </button>
        </div>
    </header>
    <section id="TrdcS23SBdhdbORw" style="padding-bottom: 0px !important">
        <div class="app__container">
            @include('partials._seller_profile_card')    
        </div>
        @include('partials._service_details_tab')    
        <section class="HdoiS__KSH3nSO">
            <div class="app__container">
                <div class="bg-white p-4 app__box__shadow">
                    <h1 class="mb-4 font-semibold">About</h1>
                    <p class="text__black">{{ $service->description }}</p>
                </div>
            </div>
        </section>
        <section class="py-4">
            <div class="flex justify-center">
                <a href="{{ route('sellers.slug', $service->user->uuid) }}" class="app__button btn__purple px-3 mr-3">View Seller</a>
                <button class="app__button btn__purple px-3">Show Contact</button>
            </div>
        </section>
        
        <start-chat></start-chat>

        <section class="py-6">
            <div class="app__container">
                <h1 class="text-center font-semibold">Safety Tips</h1>
                <ul class="mt-3 list-disc ml-3">
                    <li>Do not pay in advance or without meeting the seller first</li>
                    <li>Meet the seller at a safe public place</li>
                    <li>Inspect the item and ensure its exactly what you want.</li>
                </ul>
            </div>
        </section>
        <section class="HdoiS__KSH3nSO">
            <div class="app__container">
                <h1 class="font-bold text-lg mb-7">Similar Advert</h1>
                @foreach ($randomServices as $service)
                    <service-listing-card :service="{{ json_encode($service) }}" :url="{{ json_encode(route('services.slug', $service->uuid)) }}"></service-listing-card>
                @endforeach
            </div>
        </section>
    </section>
@endsection