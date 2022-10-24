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
        <section id="BSkheoSDh3o7NdkSG3" class="">
            <div class="app__container">
                <h1 class="KDHie8DN23grDD__dn2">Seller Shops</h1>
                
                <div style="min-height: 300px; margin-top: 25px" class="lS38SB2jrDe">
                    @if ($shops->count() < 1)
                        <no-data-found title="No shop Found"></no-data-found>
                    @else
                        @foreach ($shops as $shop)
                            <div class="mb-6">
                                <div>
                                    @if ($shop->cover_image)
                                        <img src="{{ $shop->cover_image }}" alt="">
                                    @else
                                        <img src="{{ asset('images/shops/no-banner.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div>
                                    <h1 class="SHn30102uSHN21__Sj21kh">{{ $shop->business_name }}</h1>
                                    <p class="UDG2182SK2__Sh12g">{{ $shop->tagline }}</p>
                                    <a class="LSm-SKn3S2" href="{{ route('shops.slug', $shop->uuid) }}">Contact</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="pb-8"></div>
        </section>
    </section>
@endsection