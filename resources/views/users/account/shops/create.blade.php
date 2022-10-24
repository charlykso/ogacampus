@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Post Shop</span>
        </button>
        <div>
            <clear-form-button form="shop"></clear-form-button>
        </div>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container mt-6">
            <create-shop
                :shop="{{ isset($shop) ? json_encode($shop) : json_encode(null) }}" 
                :url="{{ isset($shop) ? json_encode(route('account.update.shops', $shop->uuid)) : json_encode(route('account.store.shops')) }}" 
            >
            </create-shop>
        </div>
    </section>
@endsection