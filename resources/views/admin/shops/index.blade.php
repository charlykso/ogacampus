@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $shops->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Posted by</th>
                                    <th>School</th>
                                    <th>Status</th>
                                    <th>Posted on </th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($shops as $i => $shop)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap">{{$shop->business_name}}</td>
                                    <td class="text-nowrap">{{$shop->user->profile ? $shop->user->profile->fullName : ""}}</td>
                                    <td class="text-nowrap">{{$shop->school->name}}</td>
                                    <td class="text-nowrap"><span class="badge p-2 badge-{{ $shop->status_code }}">{{ ucfirst($shop->status) }}</span> </td>
                                    <td class="text-nowrap">{{ $shop->created_at->toFormattedDateString() }}</td>
                                    {{-- <td>
                                        <a href="{{route('admin.shop.show', $shop->slug)}}" class="btn btn-primary btn-sm">
                                           <i class="fa fa-eye text-white"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Shop found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $shops->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

