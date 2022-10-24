<div class="DxdejoSPkd__DNeedSp shadow">
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img src="{{ asset('svg/Profile.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Name</p>
            <p class="HjdSkn3rkSJ">{{ $user->profile->fullName }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img src="{{ asset('svg/Mail.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Email</p>
            <p class="HjdSkn3rkSJ">{{ $user->email }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 13px;" src="{{ asset('svg/Phone.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Phone Number</p>
            <p class="HjdSkn3rkSJ">{{ $user->phone }}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 12px;" src="{{ asset('svg/Home.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">School</p>
            <p class="HjdSkn3rkSJ">{!! $user->school ? $user->school->name : '<span class="text-red-500">Not avaliable</span>' !!}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 11px;" src="{{ asset('svg/Location.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">State (of school)</p>
            <p class="HjdSkn3rkSJ">{{ $user->school->state->name }} State</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 11px;" src="{{ asset('svg/Location.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Country (of school)</p>
            <p class="HjdSkn3rkSJ">Nigeria</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 12px;" src="{{ asset('svg/Book.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Course</p>
            <p class="HjdSkn3rkSJ">{!! $user->profile->course ?? '<span class="text-red-500">Not avaliable</span>' !!}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 7px;" src="{{ asset('svg/Bookmark.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Degree Type</p>
            <p class="HjdSkn3rkSJ">{!! $user->profile->degree_type ?? '<span class="text-red-500">Not avaliable</span>' !!}</p>
        </div>
    </div>
    <div class="flex py-2 hdndSNkSBbd3S__Snjb2j">
        <div class="kJJHDN__SNk2der">
        <img style="width: 12px;" src="{{ asset('svg/Level.svg') }}" alt="Profile Icon" class="GjhsSHG3n">
        </div>
        <div class="BduhSN2__Dnjg3uuyfh">
            <p class="GhtuoNSKkrkS__SjHJDHok">Level</p>
            <p class="HjdSkn3rkSJ">{!! $user->profile->level ?? '<span class="text-red-500">Not avaliable</span>' !!}</p>
        </div>
    </div>
    <div class="pt-4">
        <p class="text-sm text-center text__grey">Member since {{ $user->created_at->toFormattedDateString() }}</p>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('account.edit') }}" class="app__button btn__purple py-2 px-4 text-white rounded">Update</a>
    </div>
</div>
