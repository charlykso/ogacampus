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
            <div>
                <h1 class="kjd__n3jhd83n">{{ $title }}</h1>
                <p class="jjgbfoSN__djwg3jh">Bringing out the style in you</p>
                @include('partials._slider_thumbnail')
            </div>
        </div>
    </section>
@endsection
