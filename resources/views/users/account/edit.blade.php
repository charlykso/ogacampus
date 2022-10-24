@extends('layouts.view-page')

@section('content')
    <header class="rIspem8SJrpJS2ScvYd">
        <button onclick="history.back()" class="arrow__left__back">
            <img src="/svg/Arrow-Left-Purple.svg" alt="">
            <span>Back</span>
        </button>
    </header>
    <section id="TrdcS23SBdhdbORw"  style="padding-bottom: 20px !important; margin-top: 40px;">
        <div class="app__container">
            <h1 class="text-xl font-bold text__black">Edit Profile</h1>
            <form action="{{ route('profile.update') }}" class="mt-6" method="POST">
                @csrf
                <div class="bg-white">
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="name" placeholder="First name" name="first_name" value="{{ old('first_name') ?? $user->profile->first_name }}">
                        @error('first_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="name" placeholder="Last name" name="surname" value="{{ old('surname') ?? $user->profile->surname }}">
                        @error('surname')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="email" placeholder="Email" name="email" value="{{ old('email') ?? $user->email }}">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="text" placeholder="Phone" name="phone" value="{{ old('phone') ?? $user->phone }}">
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <select name="school_id" id="">
                            <option value="">Choose school</option>
                            @foreach ($dataCache['schools'] as $school)
                                <option {{ old('school_id') == $school->id || $user->school_id == $school->id ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <select name="state_id" id="">
                            <option value="">Choose state</option>
                            @foreach ($dataCache['states'] as $state)
                                <option {{ old('state_id') == $state->id || $user->school->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="email" placeholder="Country" name="email" value="{{ old('name') ?? $user->profile->country }}">
                    </div> --}}
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="text" placeholder="Course" name="course" value="{{ old('course') ?? $user->profile->course }}">
                        @error('course')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="text" placeholder="Degree Type" name="degree_type" value="{{ old('degree_type') ?? $user->profile->degree_type }}">
                        @error('degree_type')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="DJHDHBe__DSJb3j mb-5 relative">
                        <input type="text" placeholder="Level" name="level" value="{{ old('level') ?? $user->profile->level }}">
                        @error('level')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="py-3">
                    <button type="submit" class="app__button w-full btn__purple px-4 text-white rounded"><i class="fas fa-plus"></i> Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection