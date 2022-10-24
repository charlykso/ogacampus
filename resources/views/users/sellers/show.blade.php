@extends('layouts.guest')

@section('content')
    <div class="app__container">
        <div class="py-8">
            @include('partials._user_profile_card')
        </div>
    </div>
    <section id="BSkheoSDh3o7NdkSG3">
        <div class="app__container">
            @include('partials._seller_profile_listing')
        </div>
        <div class="pb-3"></div>
    </section>
    <section class="">
        <a href="{{ route('sellers.items', $seller->uuid) }}" class="LishskS__Snkwnrfh">
            <span>Items</span>
            <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
        </a>
        <a href="{{ route('sellers.shops', $seller->uuid) }}" class="LishskS__Snkwnrfh">
            <span>Shop</span>
            <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
        </a>
        <a href="{{ route('sellers.services', $seller->uuid) }}" class="LishskS__Snkwnrfh">
            <span>Services</span>
            <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
        </a>
        <a href="{{ route('sellers.events', $seller->uuid) }}" class="LishskS__Snkwnrfh">
            <span>Events</span>
            <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
        </a>
    </section>
@endsection
