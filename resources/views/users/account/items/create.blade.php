@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Post Item</span>
        </button>
        <div>
            <clear-form-button form="item"></clear-form-button>
        </div>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container mt-6">
            <create-item
                :item="{{ isset($item) ? json_encode($item) : json_encode(null) }}" 
                :url="{{ isset($item) ? json_encode(route('account.update.items', $item->uuid)) : json_encode(route('account.store.items')) }}" 
                :categories="{{ json_encode($categories) }}"
            >
            </create-item>
        </div>
    </section>
@endsection