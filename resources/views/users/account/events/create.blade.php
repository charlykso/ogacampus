@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            @if (isset($event))
                <span>Update Event</span>
            @else
                <span>Post Event</span>
            @endif
        </button>
        <div>
            <clear-form-button form="event"></clear-form-button>
        </div>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container">
            <p class="text-sm mt-4">Warning : Only event organisers are allowed to post events. Posting an event that you are not organising is prohibited and will attract legal consequences</p>
        </div>
        <div class="app__container mt-6">
            <create-event 
                :event="{{ isset($event) ? json_encode($event) : json_encode(null) }}" 
                :url="{{ isset($event) ? json_encode(route('account.update.events', $event->uuid)) : json_encode(route('account.store.events')) }}" 
                :categories="{{ json_encode($categories) }}"
            >
            </create-event>
        </div>
    </section>
@endsection