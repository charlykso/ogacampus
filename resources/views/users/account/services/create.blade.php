@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Post Service</span>
        </button>
        <div>
            <clear-form-button form="service"></clear-form-button>
        </div>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container mt-6">
            <create-service
                :service="{{ isset($service) ? json_encode($service) : json_encode(null) }}" 
                :url="{{ isset($service) ? json_encode(route('account.update.services', $service->uuid)) : json_encode(route('account.store.services')) }}" 
                :categories="{{ json_encode($categories) }}"
            >
            </create-service>
        </div>
    </section>
@endsection