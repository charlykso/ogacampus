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
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 0px !important; margin-top: 8px;">
        <div class="app__container">
            
        </div>
        <section id="BSkheoSDh3o7NdkSG3" class="">
            <div class="app__container JBskpSwjaks93S">
                <h1 class="KDHie8DN23grDD__dn2">Seller Items</h1>

                <div style="min-height: 300px; margin-top: 25px" class="lS38SB2jrDe">
                    @if ($items->count() < 1)
                        <no-data-found title="No Item found"></no-data-found>
                    @else
                        <div class="grid md:grid-cols-3 grid-cols-2 gap-x-3 gap-y-4">
                            @foreach ($items as $item)
                                <item-listing-card :item="{{ json_encode($item) }}" :url="{{ json_encode(route('items.slug', $item->uuid)) }}"></item-listing-card>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="pb-8"></div>
        </section>
    </section>
@endsection