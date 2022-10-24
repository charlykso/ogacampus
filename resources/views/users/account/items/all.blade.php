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
                @if ($allItems->count() < 1)
                    <no-data-found title="No Item found"></no-data-found>
                @else
                    <div class="grid md:grid-cols-3 grid-cols-2 gap-x-3 gap-y-4">
                        @foreach ($allItems as $item)
                            <item-listing-card :edit="{{ json_encode(true) }}" :item="{{ json_encode($item) }}" :url="{{ json_encode(route('account.post.items.edit', $item->uuid)) }}"></item-listing-card>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection