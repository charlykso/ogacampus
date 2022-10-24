@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $giveaways->total()}})
                        <button class="btn btn-primary border rounded pull-right" data-toggle="modal" data-target="#giveawayModal">Create New Giveaway</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Staff</th>
                                    <th>School</th>
                                    <th>Amount</th>
                                    <th>Maximum</th>
                                    <th>Winners</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($giveaways as $i => $giveaway)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap">{{ ucfirst($giveaway->type) }}</td>
                                    <td class="text-nowrap">{{ $giveaway->staff->email }}</td>
                                    <td class="text-nowrap">  {{ $giveaway->school->name }} </td>
                                    <td class="text-nowrap">{{ $giveaway->amount }}</td>>
                                    <td class="text-nowrap">{{ $giveaway->max_count }}</td>
                                    <td class="text-nowrap">
                                        @foreach ($giveaway->beneficiaries as $beneficiary)
                                            {{ $beneficiary['profile']->fullName }} <br>
                                        @endforeach
                                    </td>
                                    <td class="text-nowrap">
                                        @foreach ($giveaway->beneficiaries as $beneficiary)
                                            {{ $beneficiary['time']}} <br>
                                        @endforeach
                                    </td>
                                    <td class="text-nowrap">{{ $giveaway->created_at->format('d-m-Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Cash Giveaway found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $giveaways->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="giveawayModal" tabindex="-1" role="dialog" aria-labelledby="giveawayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form method="POST" action="{{ route('admin.giveaway.store') }}" onkeydown="return event.key != 'Enter';">
        <div class="modal-header bg-primary text-white rounded">
          <h5 class="modal-title" id="exampleModalLabel">Create New Giveaway</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              @csrf
              <div class="form-group">
                  <label class="form-control-label">{{ __('Giveaway Name') }}</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Unique name">

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
                  <label class="form-control-label">{{ __('Amount') }}</label>
                  <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required placeholder="5, 000">

                  @error('code')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label class="form-control-label">{{ __('Maximum Beneficiaries') }}</label>
                <input id="max_count" type="number" class="form-control @error('max_count') is-invalid @enderror" name="max_count" value="{{ old('max_count') }}" required placeholder="e.g 3">

                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

              <div class="form-group">
                  <label class="form-control-label">{{ __('Country') }}</label>
                  <select  id="schools" class="custom-select" name="school_id">
                      <option value="">Select School</option>
                      @foreach ($schools as $school)
                      <option value="{{$school->id}}">
                          {{$school->name}}
                      </option>
                      @endforeach
                  </select>
              </div>


              <div class="form-group mb-3">
                  <label class="form-control-label">{{ __('Type') }}</label>
                  <select id="type" name="type" class="custom-select">
                    <option value="">Select Type</option>
                    <option value="test">Test</option>
                    <option value="d-day">D-day</option>
                  </select>
              @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
              </div>
                  @enderror

          </div>


        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create Now!</button>
        </div>

        </form>
      </div>
    </div>
  </div>
@endsection

