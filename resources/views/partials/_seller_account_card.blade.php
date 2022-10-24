<section class="mb-4" id="JGdhiue7HSNK2gl">
    @if ($user->profile->photo)
        <profile-photo :photo="{{ json_encode($user->profile->photo) }}"></profile-photo>
    @else
        <img src="{{ asset('images/avatar.png') }}" alt="profile" class="mx-auto Hdku38hJSBk2__S2bj">
    @endif
</section>
<section id="Awxcs3SxfrWrghkpK">
    <div class="flex items-center justify-center">
        @if ($user->isVerified == 0)
            <a class="underline text__grey" href="{{ route('account.verify.page') }}"><h2 class="text__grey text-lg">Get Verified</h2></a>
        @else
            <h2 class="text-center font-bold">Verified</h2>
            <img src="{{ asset('svg/Verified.svg') }}" alt="user verified" class="JGDi38HSNKJS__nbj3g">
        @endif
    </div>

    <div class="flex justify-center mt-3">
        @if ($user->profile->gender)
            <h1 class="GrhKS3SNdEd3">{{ $user->profile->gender }}</h1>            
        @else
            <button onclick="toggleGenderModal()" class="GrhKS3SNdEd3">Select Gender</button>
        @endif

        <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="toggleGenderModal">
            <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>
                <span class="inline-block align-middle h-screen">&#8203;</span>
                <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-11/12" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="HSKsj3__SNj2kjd">
                            <input type="radio" name="gender" id="gender_female" class="app__radio" value="">
                            <label class="app__radio__label" for="gender_female">
                                <span>Female</span>
                            </label>
                        </div>
                        <div class="HSKsj3__SNj2kjd mt-4">
                            <input type="radio" name="gender" id="gender_male" class="app__radio" value="">
                            <label class="app__radio__label" for="gender_male">
                                <span>Male</span>
                            </label>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right">
                        <button onclick="toggleGenderModal()" type="button" class="app__button bg-red-500 text-white px-4 rounded mr-2"><i class="fas fa-plus"></i> Close</button>
                        <button type="button" class="app__button btn__purple px-4 text-white rounded"><i class="fas fa-plus"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="flex justify-center mt-3">
        <upload-profile-picture :url="{{ json_encode(route('profile.photo.upload')) }}"></upload-profile-picture>
    </div>
</section>