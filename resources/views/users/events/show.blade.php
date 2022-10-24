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
            <section class="mb-8" id="JGdhiue7HSNK2gl">
                <img src="{{ asset('images/events/event-one.jpg') }}" alt="event banner" class="Lighdr5xWdsdfe">
            </section>
            <section id="Awxcs3SxfrWrghkpK">
                <h1>{{ $event->title }}</h1>

                <div class="md:flex justify-between">
                    <div class="flex flex-col">
                        <span class="HGS83nSldnW">By <span class="GrhKS3SNdEd3">{{ $event->user->profile->fullName }}</span></span>
                        <span class="HGS83nSldnW">200 Followers</span>
                    </div>
                    <button class="app__button btn__outline__purple px-6 md:mt-0 mt-2">Follow</button>
                </div>
            </section>
            <div class="fd5FShrjSflswbSh">
            </div>
            <div>
                <div class="flex items-baseline mb-6">
                    <div class="tSb9SNdkLOSwSDwsxcS">
                        <img src="{{ asset('svg/Calendar.svg') }}" alt="calender icon" class="Icobvd8__Sn2">
                    </div>
                    <div class="Us7SHosHS2__Sn2dnl">
                        <h4 class="Josi93SOpfpS1">Date and Time</h4>
                        <p class="zXwrZaqQ1df">{{ $event->event_date->isoFormat('ddd D MMM, YYYY') }}</p>
                        <p class="zXwrZaqQ1df">{{ $event->event_date->isoFormat('h:mm A') }}</p>
                    </div>
                </div>
                <div class="flex items-baseline mb-6">
                    <div class="tSb9SNdkLOSwSDwsxcS">
                        <img src="{{ asset('svg/Location.svg') }}" alt="Location icon" class="Icobvd8__Sgri8">
                    </div>
                    <div class="Us7SHosHS2__Sn2dnl">
                        <h4 class="Josi93SOpfpS1">Location</h4>
                        <p class="zXwrZaqQ1df">{{ $event->address }}</p>
                    </div>
                </div>
                <div class="flex items-baseline mb-6">
                    <div class="tSb9SNdkLOSwSDwsxcS">
                        <img src="{{ asset('svg/Description.svg') }}" alt="Description icon" class="Icobvd8__Sn2">
                    </div>
                    <div class="Us7SHosHS2__Sn2dnl">
                        <h4 class="Josi93SOpfpS1">Description</h4>
                        <p class="zXwrZaqQ1df">{{ $event->description }}</p>
                    </div>
                </div>
                <div class="flex items-baseline mb-6">
                    <div class="tSb9SNdkLOSwSDwsxcS">
                        <img src="{{ asset('svg/Report-Flag.svg') }}" alt="icon" class="Icobvd8__Sn2">
                    </div>
                    <div class="Us7SHosHS2__Sn2dnl">
                        <h4 class="Josi93SOpfpS1">Refund and Policy</h4>
                        <p class="zXwrZaqQ1df">No refund after payment. Gate pass are higher at venue.</p>
                    </div>
                </div>
                <div class="flex items-baseline mb-6">
                    <div class="tSb9SNdkLOSwSDwsxcS">
                        <img src="{{ asset('svg/Share.svg') }}" alt="Share icon" class="Icobvd8__Sn2">
                    </div>
                    <div class="Us7SHosHS2__Sn2dnl">
                        <h4 class="Josi93SOpfpS1">Share</h4>
                        <div class="flex">
                            <button class="OSkphdj6HSel">
                                <img src="{{ asset('svg/Facebook.svg') }}" alt="share on facebook" class="bv_NS__SjDNK4">
                            </button>
                            <button class="OSkphdj6HSel">
                                <img src="{{ asset('svg/Instagram.svg') }}" alt="share on Instagram" class="dh8SN__Sn2SDIHdk">
                            </button>
                            <button class="OSkphdj6HSel">
                                <img src="{{ asset('svg/Twitter.svg') }}" alt="share on Twitter" class="dh8SN__Sn2SDIHdk">
                            </button>
                            <button class="OSkphdj6HSel">
                                <img src="{{ asset('svg/Whatsapp.svg') }}" alt="share on Whatsapp" class="dh8SN__Sn2SDIHdk">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center mb-12">
                <h1 class="text__light__purple font-medium">The Organisers</h1>
                <p class="zXwrZaqQ1df">Dream Designers Entertainers</p>
                <button class="app__button btn__outline__purple px-4 mt-4 mr-2">Follow</button>
                <button class="app__button btn__outline__purple px-4 mt-4">Contact</button>
            </div>
            <div class="fd5FShrjSflswbSh">
            </div>
            <div>
                <h1 class="mb-6 text-center text__dark font-extrabold text-lg">More events from this organizer</h1>
                @foreach ($randomEvents as $event)
                    <event-listing-card :event="{{ json_encode($event) }}" :url="{{ json_encode(route('events.slug', $event->uuid)) }}"></event-listing-card>
                @endforeach
            </div>
            <div class="fd5FShrjSflswbSh">
            </div>
            <div>
                <h1 class="mb-6 text-center text__dark font-extrabold text-lg">Other events you may like</h1>
                @foreach ($randomEvents as $event)
                    <event-listing-card :event="{{ json_encode($event) }}" :url="{{ json_encode(route('events.slug', $event->uuid)) }}"></event-listing-card>
                @endforeach
            </div>
            <div class="sticky__event__ticket">
                <div class="app__container">
                    <h1 class="text__light__purple text-center text-lg font-bold">{!! $readableAmount !!}</h1>
                    <get-ticket-button :event="{{ json_encode($event) }}"></get-ticket-button>
                </div>
            </div>
        </div>
    </section>
@endsection