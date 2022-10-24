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
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 0px !important; margin-top: 8px;">
        <div class="app__container">
            
        </div>
        <section id="BSkheoSDh3o7NdkSG3" class="">
            <div class="app__container JBskpSwjaks93S">
                <h1 class="KDHie8DN23grDD__dn2">Seller Items</h1>

                <div style="min-height: 300px; margin-top: 25px" class="lS38SB2jrDe">
                    @if ($services->count() < 1)
                        <no-data-found title="No Service found"></no-data-found>
                    @else
                        @foreach ($services as $service)        
                            <div class="event__card__xdc">
                                <div class="rXcwsDfHw3Snto">
                                    <div class="Mkdh93S2ShtSHo2S flex">
                                        <div class="flex justify-center items-center">
                                            <img src="/images/testimonial-1.jpg" alt="user" class="Bch7NLjhdglGDfbile">
                                        </div>
                                    </div>
                                    <div class="Kshue7Snk2vfkBW2">
                                        <div class="Kd93jNSKh3rdWz">{{ $seller->profile->full_name }}</div> 
                                        <div class="Kjd83nSk2">{{ $service->service_name }}</div>
                                        <div class="flex justify-between mt-4">
                                            <div class="flex items-center">
                                                <img src="/svg/Rating-fill.svg" alt="" class="ydu__JS3oSj3Sl"> 
                                                <span class="HSo__SwndkHWY3">4.0 (5 Reviews)</span>
                                            </div>
                                            <a class="LSm-SKn3S2" href="{{ route('services.slug', $service->uuid) }}">Contact</a>
                                        </div>
                                    </div>
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