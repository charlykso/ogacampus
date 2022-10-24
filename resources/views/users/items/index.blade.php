@extends('layouts.guest')

@section('content')
    @include('partials._service_tab')

    <item-filter :post-url="{{ json_encode(route('account.post.items')) }}"></item-filter>

    <div class="app__container">
        <div class="mt-4">
            <div class="grid lg:grid-cols-4 grid-cols-3 gap-x-3 gap-y-4">
                @foreach ($categories as $category)
                <a href="{{ route('items.categories', $category->slug) }}">
                    <div class="HduyehS39Sndlo">
                        <img src="{{ asset("images/$category->thumbnail") }}" alt="{{ $category->name }}" class="KSHi83nDgh2S">
                    </div>
                    <p class="fdjhuEornS8Snlo text-center">{{ $category->name }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <section id="BSkheoSDh3o7NdkSG3" class="mt-8">
        <div class="app__container JBskpSwjaks93S">
            <h1 class="KDHie8DN23grDD__dn2">Hot Deals</h1>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 -cols-1 gap-x-3 gap-y-4">
                @foreach ($featuredItems as $item)
                    <item-listing-card :item="{{ json_encode($item) }}" :url="{{ json_encode(route('items.slug', $item->uuid)) }}"></item-listing-card>
                @endforeach
            </div>
        </div>
        <div class="pb-8"></div>
    </section>
    <div class="app__container">
        @include('partials._section_seperator')
        <section class="KHks933ndpsN2bCvbreSdfg">
            <div class="flex">
                <div class="md:w-10/12 w-full mx-auto text-center">
                    <h1 class="JoX__Xnzkh3e9JS">You got an item to sell?</h1>
                    <p class="text__black JHSjhsh38jS mt-6">
                        Sell your unused items for quick cash or create a shop for your business.
                    </p>
                    <p class="text__black JHSjhsh38jS">
                        Thousands of buyers are waiting.
                    </p>

                    <div class="mt-10">
                        <button class="app__button btn__purple w-32">Sell now</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
