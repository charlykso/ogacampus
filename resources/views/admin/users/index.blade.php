@extends('admin.layouts.wrapper')
@section('title', $title)

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{ $title}} ({{ $users->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>School</th>
                                    <th>Status</th>
                                    <th>Verification</th>
                                    <th>Reg Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $i => $user)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap">{{$user->email}}</td>
                                    <td class="text-nowrap">{{ $user->profile->fullName ?? '' }}</td>
                                    <td class="text-nowrap">{{$user->phone}}</td>
                                    <td class="text-nowrap">{{$user->school->name}}</td>
                                    <td class="text-nowrap">{!! is_null($user->email_verified_at) || empty($user->email_verified_at) ? '<span class="badge p-2 badge-danger">Inactive</span>' : '<span class="badge p-2 badge-success">Active</span>'!!}</td>
                                    <td class="text-nowrap">{!! $user->profile->is_verified == 0 ? '<span class="badge p-2 badge-danger">Not verified</span>' : '<span class="badge p-2 badge-success">Verified</span>'!!} </td>
                                    <td class="text-nowrap">{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td>
                                            <a href="{{route('admin.user.show', ['uuid'=> $user->uuid])}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                            </a>

                                                @if($user->profile->is_verified == 0)
                                                    <a href="{{route('admin.user.verify', ['uuid'=>$user->uuid,'status'=>'1'])}}" title="Verify user"><button class="btn btn-outline-success"><i class="fa fa-check text-success fa-2x"></i></button></a>
                                                @else
                                                    <a href="{{route('admin.user.verify', ['uuid'=>$user->uuid,'status'=>'0'])}}" title="Unverify user"><button class="btn btn-outline-danger"><i class="fa fa-times text-danger fa-2x"></i></button></a>
                                                @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $users->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

