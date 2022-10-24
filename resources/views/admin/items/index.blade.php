@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $items->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Seller</th>
                                    <th>Category</th>
                                    <th>School</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $i => $item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap">{{$item->title}}</td>
                                    <td class="text-nowrap">{{$item->user->profile ? $item->user->profile->fullName : ""}}</td>
                                    <td class="text-nowrap">{{$item->category->name}}</td>
                                    <td class="text-nowrap">{{$item->school->name}}</td>
                                    <td class="text-nowrap"><span class="badge p-2 badge-{{ $item->status_code }}">{{ ucfirst($item->status) }}</span> </td>
                                    <td>
                                        <a href="{{route('admin.items.show', ['uuid'=>$item->uuid])}}">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No item found</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{ $items->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

