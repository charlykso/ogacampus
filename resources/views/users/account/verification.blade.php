@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">            
        </button>
        <h1 class="text__light__purple font-bold">Get Verified</h1>
        <span></span>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 40px;">
        <div class="app__container">
            <h1 class="font-bold mb-3 text-lg">Take a Selfie</h1>
            <div class="flex">
                <div class="w-5/12">
                    <div class="JSjb3uhS__n3yS2">
                        <img src="{{ asset('svg/Plus-White.svg') }}" alt="arrow" class="w-6">
                    </div>
                </div>
                <div class="w-7/12 flex items-center">
                    <div class="pl-2">
                        <div class="">
                            <p class="KJHGD3__n3bjhS">This picture will not be displayed on your profile or anywhere else. It is only for verification and record purposes</p>
                            <button class="w-full mt-2 app__button btn__purple">Take Selfie</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        Take a photo of you holding your ID card close to your face (the details on the ID card should be clear to read).
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        To fully capture both your face and ID card, a landscape format is advised
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        Photo must be taken in a well lit environment
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        Photo must show yourself from chest level to head.
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        The photo must be a live photo of you (Do not snap a photo of an already printed paper photo like a passport photo, it won't be accepted).
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        Ensure your face is not covered by your hair
                    </span>
                </div>
                <div class="flex items-baseline mb-3">
                    <span class="SBj28hKb28hdkh"></span>
                    <span class="JHFvdj9ygbWvh3">
                        Please do not wear cap or glasses while taking this photo.
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <h1 class="font-bold mb-3 text-lg">Upload your school ID</h1>
                <upload-school-id :verification="{{ json_encode($user->profile->verification) }}" :url="{{ json_encode(route('verification.photo.upload')) }}"></upload-school-id>
                <div class="mt-3">
                    <div class="flex items-baseline mb-3">
                        <span class="SBj28hKb28hdkh"></span>
                        <span class="JHFvdj9ygbWvh3">
                            ID document must show your full name, school, course of study and picture.
                        </span>
                    </div>
                    <div class="flex items-baseline mb-3">
                        <span class="SBj28hKb28hdkh"></span>
                        <span class="JHFvdj9ygbWvh3">
                            Accepted IDs are school ID, faculty ID, departmental ID, eligibility form, clearance form or exam results.
                        </span>
                    </div>
                    <div class="flex items-baseline mb-3">
                        <span class="SBj28hKb28hdkh"></span>
                        <span class="JHFvdj9ygbWvh3">
                            Images or file must not exceed 5MB.
                        </span>
                    </div>
                    <div class="flex items-baseline mb-3">
                        <span class="SBj28hKb28hdkh"></span>
                        <span class="JHFvdj9ygbWvh3">
                            Supported formats are *pdf, *jpg, and *png.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection