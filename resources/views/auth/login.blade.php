@extends('layouts.guest')

@section('content')
    <section class="py-10">
        <h1 class="kajgsHSkw__DJje mb-4">Sign In to continue</h1>

        <div class="app__container">
            <img src="{{ asset('images/sign-with-google.jpg') }}" alt="" class="mx-auto">
            <div class="jdknSNKd__jdnj3uei my-6">
                <span class="HtdbpndpEn__DnkjWh">Or</span>
            </div>

            <form method="POST" action="/login">
                @csrf
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="DJHDHBe__DSJb3j mb-5 relative flex flex-col">
                    <a href="{{ route('password.request') }}" class="text__light__purple text-sm text-right">Forgot password?</a>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <button class="app__button btn__purple w-full" type="submit">Login to account</button>
            </form>
            <div class="mt-6 text-center text__grey">
                Don't have account? <a href="{{ route('register') }}" class="text__light__purple">Sign up</a>
            </div>
        </div>

    </section>
@endsection

