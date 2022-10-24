 
@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')  
    <div class="content">
        <div class="container-fluid"> 
            <div class="card">
                <div class="card-header bg-primary text-white rounded">
                    Account Settings
                </div>
                <form action="{{route('admin.profile.password')}}" method="POST" onkeydown="return event.key != 'Enter';">
                    @csrf()
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div>Profile Information</div>
                            <div class="text-muted small">These information are not visible to the public.</div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input class="form-control" value="{{$profile->email}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone</label>
                                        <input class="form-control" value="{{$profile->phone}}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">School</label>
                                        <input class="form-control" value="{{$profile->school_details->name}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Role</label>
                                        <input class="form-control" value="{{$profile->role_details->title}}" readonly>
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