<div class="DxdejoSPkd__DNeedSp shadow">
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img src="{{ asset('svg/Profile.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Name</p>
            <p class="HjdSkn3rkSJ">{{ $seller->profile->full_name }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img src="{{ asset('svg/Mail.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Email</p>
            <p class="HjdSkn3rkSJ">{{ $seller->email }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 13px;" src="{{ asset('svg/Phone.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Phone Number</p>
            <p class="HjdSkn3rkSJ">{{ $seller->phone }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 12px;" src="{{ asset('svg/Home.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">School</p>
            <p class="HjdSkn3rkSJ">{{ $seller->school->name }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 11px;" src="{{ asset('svg/Location.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">State (of school)</p>
            <p class="HjdSkn3rkSJ">{{ $seller->school->state->name }}</p>
        </div>
    </div>

    <div class="pt-4">
        <p class="text-sm text-center text__grey">{{ $seller->created_at->isoFormat('ddd D MMM, YYYY') }}</p>
    </div>
</div>