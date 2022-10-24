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
    <section id="TrdcS23SBdhdbORw">
        <div class="app__container">
            @include('partials._seller_profile_card')    
        </div>
        @include('partials._service_details_tab')    
        <div class="app__container">
            @foreach ($service->pictures as $picture)
                <div class="JHDuir__DnfrmpZDHnwf mb-5">
                    <img src="{{ $picture }}" alt="Event one">
                    <div class="lMSoJSoe__Snkedf">
                        {{-- <h1>#Glover2022</h1> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection