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
                @if ($allEvents->count() < 1)
                    <no-data-found title="No Event Found"></no-data-found>
                @else
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($allEvents as $event)
                            <div>
                                <a href="{{ route('account.post.events.edit', $event->uuid) }}" class="JSkj3hjGS2__kenjg3">
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
    </section>
@endsection