@extends('admin.layouts.wrapper')

@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $services->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Posted by</th>
                                    <th>School</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td class="text-nowrap">{{$service->service_name}}</td>
                                    <td class="text-nowrap">{{$service->user->profile->fullName }}</td>
                                    <td class="text-nowrap">{{$service->school->name}}</td>
                                    <td>
                                                @if($service->status === 'active')
                                                <a href="{{route('admin.service.status', ['uuid'=>$service->uuid, 'status'=>'suspended'])}}">
                                                    <button class="btn btn-danger btn-sm">Suspend</i></button>
                                                </a>
                                                @else
                                                <a href="{{route('admin.service.status', ['uuid'=>$service->uuid, 'status'=>'active'])}}">
                                                    <button class="btn btn-primary btn-sm">Activate</i></button>
                                                </a>
                                                @endif
                                                <a href="{{route('admin.service.show', ['uuid'=>$service->uuid])}}">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                                </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No service found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $services->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

