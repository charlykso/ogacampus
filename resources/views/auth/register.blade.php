@extends('layouts.guest')

@section('content')
    <section class="py-10">
        <h1 class="kajgsHSkw__DJje mb-4">Please Sign Up to continue</h1>

        <div class="app__container">
            <img src="{{ asset('images/sign-with-google.jpg') }}" alt="" class="mx-auto">
            <div class="jdknSNKd__jdnj3uei my-6">
                <span class="HtdbpndpEn__DnkjWh">Or</span>
            </div>

            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" minlength="11" maxlength="13" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="password" placeholder="Password" name="password">
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation">
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <select name="school_id" id="">
                        <option value="">Choose school</option>
                        @foreach ($schools as $key => $school)
                            <option {{ old('school_id') == $school->id ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                    @error('school_id')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-baseline mb-5">
                    <input required type="checkbox" name="agree" id="agreed" class="mr-2">
                    <label for="agreed">Yes, I understand and agree to the {{ config('app.name') }} <a href="" class="text__light__purple">terms of service</a>, <a href="" class="text__light__purple">policy</a> and receiving email newsletter</label>
                </div>
                <button class="app__button btn__purple w-full" type="submit">Create my account</button>
            </form>
            <div class="mt-6 text-center text__grey">
                Already have an account? <a href="{{ route('login') }}" class="text__light__purple">Sign In</a>
            </div>
        </div>

    </section>
@endsection

