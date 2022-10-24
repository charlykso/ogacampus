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
                @if ($allServices->count() < 1)
                    <no-data-found title="No Event Found"></no-data-found>
                @else
                    @foreach ($allServices as $service)        
                        <div class="event__card__xdc">
                            <div class="rXcwsDfHw3Snto">
                                <div class="Mkdh93S2ShtSHo2S flex">
                                    <div class="flex justify-center items-center">
                                        <img src="/images/testimonial-1.jpg" alt="user" class="Bch7NLjhdglGDfbile">
                                    </div>
                                </div>
                                <div class="Kshue7Snk2vfkBW2">
                                    <div class="Kd93jNSKh3rdWz">{{ $user->profile->full_name }}</div> 
                                    <div class="Kjd83nSk2">{{ $service->service_name }}</div>
                                    <div class="flex justify-between mt-4">
                                        <div class="flex items-center">
                                            <img src="/svg/Rating-fill.svg" alt="" class="ydu__JS3oSj3Sl"> 
                                            <span class="HSo__SwndkHWY3">4.0 (5 Reviews)</span>
                                        </div>
                                        <a class="LSm-SKn3S2" href="{{ route('account.post.services.edit', $service->uuid) }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection