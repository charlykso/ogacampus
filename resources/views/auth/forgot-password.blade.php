@extends('layouts.guest')
@section('css')
    <style>
        main{
            /* min-height: 75vh; */
        }
    </style>
@endsection
@section('content')
    <section class="py-10">
        <h1 class="kajgsHSkw__DJje mb-4">Enter email to continue</h1>

        <div class="app__container">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="DJHDHBe__DSJb3j mb-5 relative">
                    <input type="text" placeholder="Email" name="email">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button class="app__button btn__purple w-full" type="submit">Reset password</button>
            </form>
            
        </div>

    </section>
@endsection

