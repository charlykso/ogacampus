@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $verifications->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Photo</th>
                                    <th>Profile Data</th>
                                    <th>ID Card</th>
                                    <th>Captured Photo</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($verifications as $i => $verification)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap"><img src="{{$verification->profile->photo}}" alt="Profile Picture" /></td>
                                    <td class="text-nowrap"> <i class="fa fa-user"></i> {{$verification->profile->fullName }} <br>
                                                             <i class="fa fa-university"></i> {{ $verification->school->name }} <br>
                                                             <i class="fa fa-phone"></i> {{ $verification->profile->level }}
                                    </td>
                                    <td class="text-nowrap"><img src="{{ $verification->id_card }}" alt="ID Card" /></td>
                                    <td class="text-nowrap"><img src="{{ $verification->captured_photo }}" alt="Captured Photo" /></td>>
                                    <td>
                                        @if($verification->status == 'approved')
                                            <button class="btn btn-success"> <i class="fa fa-check"></i> Approved</button>
                                        @else
                                            <button class="btn btn-sm btn-info actionBtn" data-id="{{ $verification->id }}" data-action="approved"> Approve</button>
                                            <button class="btn btn-sm btn-danger actionBtn" data-id="{{ $verification->id }}" data-action="deny"> Deny</button>
                                            <textarea class="form-control comment"></textarea>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Verification Requests found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $verifications->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

