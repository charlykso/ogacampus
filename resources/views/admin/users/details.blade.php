
@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            Profile Information
                        </div>
                        <div class="col-md-6 text-md-right">
                            @if($user->profile->is_verified == 0)
                            <a href="{{route('admin.user.verify', ['uuid'=>$user->uuid,'status' => '1'])}}"><button class="btn btn-primary border rounded">Verify</button></a>
                            @else
                            <button  class="btn btn-light rounded"><i class="fa fa-check text-success fa-3x"></i></button>
                            <a href="{{route('admin.user.verify', ['uuid'=>$user->uuid,'status' => '0'])}}"><button class="btn btn-danger border rounded">Unverify</button></a>
                            @endif
                        </div>
                    </div>
                </div>

                <form action="{{route('admin.user.password')}}" method="POST"  onkeydown="return event.key != 'Enter';">
                    @csrf()

                <input type="hidden" name="uuid" value="{{$user->id}}">

                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div>Profile Details</div>
                            <div class="text-muted small">These information are not visible to the public.</div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">First Name</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->first_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Surname</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->surname}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Other name</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->other_name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->phone}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email Address</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->email}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Gender</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->gender}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Course</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->course}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Degree Type</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->degree_type}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">School</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->school->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Level</label>
                                        <input class="form-control border-right-0 border-left-0 border-top-0 bg-white" value="{{$user->profile->level}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5">
                        <div class="col-md-4 mb-4">
                            <div>Access Credentials</div>
                            <div class="text-muted small">Fill this section to change the password.</div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>

              </form>
            </div>
        </div>
    </div>
@endsection
