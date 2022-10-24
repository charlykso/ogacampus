@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">            
        </button>
        <h1 class="text__light__purple font-bold">{{ $title }}</h1>
        <span></span>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container">
            <div style="min-height: 300px; margin-top: 25px" class="lS38SB2jrDe">
                @if ($allShops->count() < 1)
                    <no-data-found title="No Event Found"></no-data-found>
                @else
                    @foreach ($allShops as $shop)
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
                                <a class="LSm-SKn3S2" href="{{ route('account.post.shops.edit', $shop->uuid) }}">Edit</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection