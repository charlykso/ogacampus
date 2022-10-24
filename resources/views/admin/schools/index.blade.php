@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        <div class="row">
                            <div class="col-md-6">
                            All Schools ({{ $schools->total()}})
                            </div>
                            <div class="col-md-6 text-md-right">
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary border rounded" data-toggle="modal" data-target="#exampleModal">
                                Add new school
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>School Name</th>
                                    <th>Code</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Verified Users</th>
                                    <th>Unverified Users</th>
                                    <th>Total Users</th>
                                    <th>Date Added</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($schools as $i => $school)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap">{{$school->name}}</td>
                                            <td class="text-nowrap">{{$school->code}}</td>
                                            <td class="text-nowrap">{{isset($school->state->name)? $school->state->name : ""}}</td>
                                            <td class="text-nowrap">{{isset($school->state->country->name)? $school->state->country->name : ""}}</td>
                                            <td class="text-nowrap">{{$school->activeUser() ? $school->activeUser()->user_active_count : 0}}</td>
                                            <td class="text-nowrap">{{$school->activeUser() ? $school->activeUser()->user_pending_count : 0}}</td>
                                            <td class="text-nowrap">{{$school->activeUser() ? $school->activeUser()->total_user : 0}}</td>
                                            <td class="text-nowrap">{{ $school->created_at->toFormattedDateString()}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No school found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $schools->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form method="POST" action="{{ route('admin.school.store') }}" onkeydown="return event.key != 'Enter';">
      <div class="modal-header bg-primary text-white rounded">
        <h5 class="modal-title" id="exampleModalLabel">Create New School</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            @csrf
            <div class="form-group">
                <label class="form-control-label">{{ __('School Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="e.g University of Lagos">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label">{{ __('School Code') }}</label>
                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus placeholder="e.g UNILAG">

                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-control-label">{{ __('Country') }}</label>
                <select  id="country-dd" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mb-3">
                <label class="form-control-label">{{ __('State') }}</label>
                <select id="state-dd" name="state_id" class="form-control">
                </select>
            @error('state_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            </div>
                @enderror

        </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>

      </form>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{route('admin.state')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush

