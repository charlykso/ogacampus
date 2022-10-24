@extends('layouts.view-page')

@section('content')
    <section id="TrdcS23SBdhdbORw" style="padding-bottom: 0px !important">
        <div class="app__container">
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
            
        </div>
        <section id="BSkheoSDh3o7NdkSG3" class="">
            <div class="app__container JBskpSwjaks93S">
                <h1 class="KDHie8DN23grDD__dn2">Seller Events</h1>
                <div style="min-height: 300px" class="lS38SB2jrDe">
                    @if ($events->count() < 1)
                        <no-data-found title="No Event Found"></no-data-found>
                    @else
                        <div class="grid grid-cols-2 gap-3">
                            @foreach ($events as $event)
                                <div>
                                    <a href="{{ route('events.slug', $event->uuid) }}" class="JSkj3hjGS2__kenjg3">
                                        <img src="{{ $event->pictures[0] }}" alt="{{ $event->title }}">
                                        <div class="bg-white p-2">
                                            <h1 class="text-sm uppercase app--text--truncate font-medium">{{ $event->title }}</h1>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="pb-8"></div>
        </section>
    </section>
@endsection