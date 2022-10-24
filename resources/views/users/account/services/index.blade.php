@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
        </button>
        <h1 class="text__light__purple font-bold">Steff Luxxe Beauty</h1>
        <span></span>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 20px;">
        <div class="app__container">
            <p class="text-center font-semibold">Profile Visits</p>

            <div class="mt-5 w-full">
                <div class="w-8/12 mx-auto">
                    <div class="flex justify-between">
                        <div>
                            <h1 class="text__light__purple font-bold text-xl">2000</h1>
                            <span class="text__grey">Total</span>
                        </div>
                        <div>
                            <h1 class="text__light__purple font-bold text-xl">20</h1>
                            <span class="text__grey">Today</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="XBjyWo2ue8SNdlf">
        <div>
            <h1 class="text-center text-xl font-bold text__light__purple">Your top 3 most liked projects</h1>
            <p class="text-sm text-center px-6 mt-4">These are projects users liked the most while on your page or searched for independently from {{ config('app.name') }}
        </div>
        <div class="TSRf38hbsj2SB"></div>
        <div class="app__container mt-4">
            <div class="grid grid-cols-3 gap-x-2">
                <div>
                    <div class="JSkj3hjGS2__kenjg3">
                        <img src="{{ asset('images/events/e-1.jpg') }}" alt="">
                        <div class="bg-white p-2">
                            <h1 class="text-sm font-medium">90 tickets</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="JSkj3hjGS2__kenjg3">
                        <img src="{{ asset('images/events/e-2.jpg') }}" alt="">
                        <div class="bg-white p-2">
                            <h1 class="text-sm font-medium">90 tickets</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="JSkj3hjGS2__kenjg3">
                        <img src="{{ asset('images/events/e-1.jpg') }}" alt="">
                        <div class="bg-white p-2">
                            <h1 class="text-sm font-medium">90 tickets</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <h1 class="text-center font-bold text__light__purple text-xl">Your potential clients : 304</h1>
        <p class="text-sm text-center px-6 mt-4">This accounts for users that proceeded to click your contact after visiting your page</p>
        <div class="app__container mt-6">
            <div class="table-responsive">
                <table class="vjBNSj38SJkdb">
                    <tr>
                        <td>S/N</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Date</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Emeka Obiora</td>
                        <td>09898219209</td>
                        <td>obikhahsi@hgmas.com</td>
                        <td>22/04/2022</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Emeka Obiora</td>
                        <td>09898219209</td>
                        <td>longasobikhahsi@hgmas.com</td>
                        <td>22/04/2022</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Emeka Obiora</td>
                        <td>09898219209</td>
                        <td>obikhahsi@hgmas.com</td>
                        <td>22/04/2022</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-between">
                <button class="flex items-center">
                    <img src="/svg/Arrow-Left-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                    <span class="Lkdoi39SM2dQ inactive__pagination">Previous Page</span>
                </button>
                <div>
                    <span>1</span>
                    <span class="text__grey">/ 7</span>
                </div>
                <button class="flex items-center">
                    <span class="Fru2Sn20DN2lhdf inactive__pagination">Next Page</span>
                    <img src="/svg/Arrow-Right-Dark.svg" alt="icon" class="RfSerQdmPs3eS">
                </button>
            </div>
        </div>
    </section>
    <section class="app__container">
        <h1 class=" text__dark__purple font-bold text-lg mb-3">Send email to all</h1>
        <p class="text-sm text__dark">Turn these potential customers into paid customers by sending marketing emails ranging from special discounts, new product arrivals, reminders etc.</p>
        <div class="flex justify-end pt-3 pb-6">
            <p class="text__light__purple text-sm">--Coming soon</p>
        </div>
    </section>
@endsection
