@extends('layouts.guest')

@section('content')
    <div class="app__container">
        <div class="py-8">
            @include('partials._seller_account_card')
        </div>
    </div>
    <section id="BSkheoSDh3o7NdkSG3">
        <div class="app__containr">
            @include('partials._account_profile')
        </div>
        <div class="pb-3"></div>
    </section>

    <section id="BSkheoSDh3o7NdkSG3" style="padding-top: 0px">
        <div class="DxdejoSPkd__DNeedSp shadow">
            <h1 class="font-bold text-center mb-3 text-xl">Referrals</h1>
            <p class="mb-6 KJHGD3__n3bjhS">Share your referral link to invite your friends to join this wonderful community</p>
            <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
                <div class="BduhSN2__Dnjg3uuyfh">
                    <p class="GhtuoNSKkrkS__SjHJDHok">Amaka Dora</p>
                    <p class="jdgajs7xbakdwh3v flex justify-between items-center">
                        <span>University of Lagos</span>
                        <span class="text__light__purple font-medium">Verified</span>
                    </p>
                </div>
            </div>
            <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
                <div class="BduhSN2__Dnjg3uuyfh">
                    <p class="GhtuoNSKkrkS__SjHJDHok">Amaka Dora</p>
                    <p class="jdgajs7xbakdwh3v flex justify-between items-center">
                        <span>University of Lagos</span>
                        <span>Not Verified</span>
                    </p>
                </div>
            </div>
            <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
                <div class="BduhSN2__Dnjg3uuyfh">
                    <p class="GhtuoNSKkrkS__SjHJDHok">Amaka Dora</p>
                    <p class="jdgajs7xbakdwh3v flex justify-between items-center">
                        <span>University of Lagos</span>
                        <span>Not Verified</span>
                    </p>
                </div>
            </div>
            <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
                <div class="BduhSN2__Dnjg3uuyfh">
                    <p class="GhtuoNSKkrkS__SjHJDHok">Amaka Dora</p>
                    <p class="jdgajs7xbakdwh3v flex justify-between items-center">
                        <span>University of Lagos</span>
                        <span>Not Verified</span>
                    </p>
                </div>
            </div>
            <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
                <div class="BduhSN2__Dnjg3uuyfh">
                    <p class="GhtuoNSKkrkS__SjHJDHok">Amaka Dora</p>
                    <p class="jdgajs7xbakdwh3v flex justify-between items-center">
                        <span>University of Lagos</span>
                        <span>Not Verified</span>
                    </p>
                </div>
            </div>

            <div class="mt-10 text-center">
                <p class="url_Link">https://www.ogacampus.com?referral={{ $user->id }}</p>
                <button class="px-3 mt-2 app__button btn__purple">Copy Link</button>

                <p class="mt-6 KJHGD3__n3bjhS">Note: Your 5 referrals must be students in your school and should also get verified</p>
            </div>
        </div>
    </section>

    <section id="BSkheoSDh3o7NdkSG3" style="padding-top: 0px">
        <div class="bg-white shadow pt-6">
            <h1 class="font-bold text-center mb-3 text-xl">Make a post</h1>
            <p class="mt-4 px-8 KJHGD3__n3bjhS">Sell an item, create a shop for your business, list your service or post an event</p>
            <a href="{{ route('account.post.items') }}" class="LishskS__Snkwnrfh">
                <span>Items</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.post.shops') }}" class="LishskS__Snkwnrfh">
                <span>Shop</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.post.services') }}" class="LishskS__Snkwnrfh">
                <span>Services</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.post.events') }}" class="LishskS__Snkwnrfh">
                <span>Events</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
        </div>
    </section>

    <section id="BSkheoSDh3o7NdkSG3" style="padding-top: 0px">
        <div class="bg-white shadow pt-6">
            <h1 class="font-bold text-center mb-3 text-xl">Your history</h1>
            <p class="mt-4 px-8 KJHGD3__n3bjhS">View, edit items, shops, services or events you have posted</p>
            <a href="{{ route('account.manage.items.all') }}" class="LishskS__Snkwnrfh">
                <span>Items</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.manage.shops.all') }}" class="LishskS__Snkwnrfh">
                <span>Shop</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.manage.services.all') }}" class="LishskS__Snkwnrfh">
                <span>Services</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.manage.events.all') }}" class="LishskS__Snkwnrfh">
                <span>Events</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
        </div>
    </section>

    <section id="BSkheoSDh3o7NdkSG3" style="padding-top: 0px; padding-bottom: 0px">
        <div class="bg-white shadow pt-6">
            <h1 class="font-bold text-center mb-3 text-xl">Manage</h1>
            <p class="mt-4 px-8 KJHGD3__n3bjhS">Gain insights, analyze metrics and other powerful tools to help you monetize your shop, service or events better</p>
            {{-- <a href="{{ route('account.manage.services') }}" class="LishskS__Snkwnrfh">
                <span>Items</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a> --}}
            <a href="{{ route('account.manage.shops') }}" class="LishskS__Snkwnrfh">
                <span>Shop</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.manage.services') }}" class="LishskS__Snkwnrfh">
                <span>Services</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
            <a href="{{ route('account.manage.events') }}" class="LishskS__Snkwnrfh">
                <span>Events</span>
                <img src="{{ asset('svg/Arrow-Right-Grey.svg') }}" alt="arrow" class="HSkLSBk2__Snj3kh">
            </a>
        </div>
    </section>

@endsection

@section('js')
    <script>
        function toggleGenderModal() {
           document.getElementById('toggleGenderModal').classList.toggle('hidden')
        }
    </script>
@endsection
