@extends('admin.layouts.wrapper')

@section('content') 
        <div class="content">
            <div class="container-fluid"> 
                <div class="card">
                    <div class="card-header bg-light">
                        All Active Item
                    </div>

                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Title</th>
                                    <th>User Email</th> 
                                    <th>Category</th> 
                                    <th>School</th> 
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td> 
                                    <td class="text-nowrap">{{$item->title}}</td> 
                                    <td class="text-nowrap">{{$item->user->email}}</td> 
                                    <td class="text-nowrap">{{$item->category->name}}</td> 
                                    <td class="text-nowrap">{{$item->school->name}}</td> 
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

 