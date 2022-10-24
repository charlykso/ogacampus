@extends('layouts.view-page')

@section('css')
    <style>
        
    </style>
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
    <section id="TrdcS23SBdhdbORw">
        <div class="app__container">
            @include('partials._seller_profile_card')    
        </div>
        @include('partials._service_details_tab')    
        @include('partials._seller_rating')    
        <section class="pt-6">
            <div class="app__container">
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
        </section>
        
    </section>
@endsection