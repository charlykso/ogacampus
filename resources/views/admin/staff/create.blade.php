@extends('admin.layouts.wrapper')
@section('title', $title)

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white rounded">
                                Create New Staff
                            </div>

                            <div class="card-body">
                                <form action="{{route('admin.staff.store')}}" method="POST" onkeydown="return event.key != 'Enter';">
                                    @csrf()
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="phone">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-control-label">{{ __('Email Address') }}</label>

                                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label for="phone" class="form-control-label">{{ __('Phone') }}</label>
                                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role_id" class="form-control-label">Access Granted</label>
                                                <select id="access_level" class="form-control @error('access') is-invalid @enderror" name="access[]"  required multiple>
                                                    <option value="" disabled>Select Option</option>
                                                    <option value="verification">Verification Request</option>
                                                    <option value="giveaway">Cash Giveaway</option>
                                                </select>

                                                @error('access')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role_id" class="form-control-label">Role</label>

                                                <select id="role_id" class="custom-select @error('role_id') is-invalid @enderror" name="role_id"  required>
                                                    <option value="" disabled>Select Role</option>
                                                    <option value="25">Staff</option>
                                                    <option value="125">Admin</option>
                                                </select>

                                                @error('school_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password" class="require">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password-confirm" class="require">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">{{ __('Submit')}} </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
