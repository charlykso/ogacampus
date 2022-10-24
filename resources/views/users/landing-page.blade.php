@extends('layouts.guest')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
@endsection

@section('content')
    <section id="banner" class="relative">
        <div class="HskjSJHe9dhnkzshk absolute">
            <p>Find buyers and sellers in your school campus</p>
            <p>Over 1000 students now on {{ config('app.name') }}</p>
        </div>
    </section>
    <section class="XBjyWo2ue8SNdlf">
        <div class="flex">
            <div class="w-10/12 mx-auto">
                <div class="flex">
                    <div class="KHSjr08e3wdPSp relative">
                        <input type="text" placeholder="Enter your school or campus">
                        <img src="{{ asset('svg/Search-Grey.svg') }}" alt="search icon svg" class="JGSh287dKDhgSn absolute">
                    </div>
                    <button class="JDHihf97yDKhoe3">Let's Go!</button>
                </div>
            </div>
        </div>
    </section>
    <section class="KHks933ndpsN2bCvbreSdfg">
        <div class="flex">
            <div class="w-10/12 mx-auto text-center">
                <h1 class="JoX__Xnzkh3e9JS">Post your items, business, service or events on {{ config('app.name') }}</h1>
                <p class="mt-6 text__black JHSjhsh38jS">Reach a greateer audience of students waiting to buy your items, patronise your business, hire your service or attend your events</p>

                <div class="mt-10">
                    <button class="app__button btn__purple w-32" id="postOfferBtn">Post Now</button>
                </div>
            </div>
        </div>
    </section>
    <div id="testimonial__section" class="py-12">
        <div class="w-9/12 mx-auto pb-20">
            <h1 class="XceUsp2eMxJeTb text-center">Students love {{ config('app.name') }}, see why</h1>
        </div>
        <section class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    <img src="{{ asset('svg/Arrow-Left.svg') }}" alt="Previous testimonial button" class="RtjOH7SOSh2">
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <img src="{{ asset('svg/Arrow-Right.svg') }}" alt="Next testimonial button" class="RtjOH7SOSh2">
                </button>
            </div>

            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide VbcpNpsnSKJHy8 w-2/3">
                        <div>
                            <div class="w-6/12 mx-auto">
                                <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Sarah Olade" class="cx9Jen2bSiVdrSo">
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">"I posted my makeup business on {{ config('app.name') }} and the next minute, my dm was filled with tons of customers."</p>
                                <p class="italic text__black text-center font-normal">Long live {{ config('app.name') }}</p>
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">Sarah Olade</p>
                                <p class="italic text__black text-center font-normal">University of Ibadan</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide VbcpNpsnSKJHy8 w-2/3">
                        <div>
                            <div class="w-6/12 mx-auto">
                                <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Musa Daniel" class="cx9Jen2bSiVdrSo">
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">"Now I can sell my used items from my previous hostel for quick cash on {{ config('app.name') }}"</p>
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">Musa Daniel</p>
                                <p class="italic text__black text-center font-normal">University of Lagos</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide VbcpNpsnSKJHy8 w-2/3">
                        <div>
                            <div class="w-6/12 mx-auto">
                                <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Samuel" class="cx9Jen2bSiVdrSo">
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">"All you ever need to sell and promote your business and services is avialble on {{ config('app.name') }}."</p>
                            </div>
                            <div class="mt-6">
                                <p class="italic text__black text-center font-normal">Samuel</p>
                                <p class="italic text__black text-center font-normal">University of Uyo</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <script>
        let postOfferBtn = document.getElementById('postOfferBtn')
        postOfferBtn.addEventListener('click', function(event) {
            console.log(event.target)
            window.location.href = '{{ url('items')}}'
        })
        var splide = new Splide( '.splide', {
            type   : 'loop',
            padding: '5rem',
            autoWidth: true,
            // height   : '10rem',
            focus    : 'center',
        });

        splide.mount();
    </script>
@endsection

