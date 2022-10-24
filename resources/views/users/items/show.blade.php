@extends('layouts.view-page')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}"> --}}
@endsection
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
    <section id="TrdcS23SBdhdbORw" style="padding-bottom: 0px !important;">
        <div class="app__container">
            <div>
                @include('partials._slider_thumbnail')
                <h1 class="mt-6 text__dark__purple JoX__Xnzkh3e9JS">{{ $item->title }}</h1>
                <p class="text__light__purple font-semibold mt-2 text-base">&#8358;{{ number_format($item->converted_price, 2) }}</p>
                <div class="flex justify-between pb-6">
                    <span class="text__black">Posted {{ $item->created_at->diffForHumans() }}</span>
                    <p class="text__grey">{{ $item->condition }}</p>
                </div>
            </div>
        </div>
        <section class="HdoiS__KSH3nSO">
            <div class="app__container">
                <div class="bg-white p-4 app__box__shadow">
                    <h1 class="mb-4 font-semibold">Description of item</h1>
                    <p class="text__black">{{ $item->description }}</p>
                </div>
            </div>
        </section>
        <section class="py-4">
            <div class="flex justify-center">
                <a href="{{ route('sellers.slug', $item->user->uuid) }}" class="app__button btn__purple px-3 mr-3">View Seller</a>
                <button class="app__button btn__purple px-3">Show Contact</button>
            </div>
        </section>
        <start-chat></start-chat>
        <section class="HdoiS__KSH3nSO -mt-6">
            <div class="app__container">
                <div class="bg-white p-4 app__box__shadow">
                    <div class="flex justify-between">
                        <h1 class="mb-4 font-semibold">Feedback on seller</h1>
                        <a href="" class="text__light__purple">View all</a>
                    </div>
                    <div class="ksjs__sml39MS2__de mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <span class="mnS_-mn373bSJnskS">A</span>
                                <span class="text__dark__purple font-semibold">Arinze Stanley</span>
                            </div>
                            <img src="{{ asset('svg/Happy-Smiley-Green.svg') }}" alt="Happy" class="uysj__SNdhSKuh2">
                        </div>
                        <p class="text__black">So I asked this guy to get me a phone of 1000naira and he gave me a fake one and now I am stalk with doing nothing and can't change it</p>
                    </div>
                </div>
            </div>
        </section>
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
            <div class="app__container JBskpSwjaks93S">
                <h1 class="font-bold text-lg mb-7">Similar Advert</h1>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 -cols-1 gap-x-3 gap-y-4">
                    @foreach ($randomItems as $item)
                        <item-listing-card :item="{{ json_encode($item) }}" :url="{{ json_encode(route('items.slug', $item->uuid)) }}"></item-listing-card>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
@section('js')
    
@endsection