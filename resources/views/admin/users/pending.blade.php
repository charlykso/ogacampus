@extends('admin.layouts.wrapper')
@section('title', $title)

@section('content') 
        <div class="content">
            <div class="container-fluid"> 
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        All Pending Users
                    </div>

                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Email</th>
                                    <th>Phone</th> 
                                    <th>Role</th> 
                                    <th>School</th> 
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($user as $users)
                                <tr>
                                    <td>{{$users->id}}</td> 
                                    <td class="text-nowrap">{{$users->email}}</td> 
                                    <td class="text-nowrap">{{$users->phone}}</td> 
                                    <td class="text-nowrap">{{$users->role_details->title}}</td> 
                                    <td class="text-nowrap">{{$users->school_details->name}}</td> 
                                    <td> 
                                        <div class="row">
                                            <div class="col-3"> 
                                                <form action="{{route('admin.user.delete',['id'=>$users->id])}}" method="POST">
                                                    @csrf()
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash text-white"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-3"> 
                                            <a href="{{route('admin.user.show', ['uuid'=>$users->uuid])}}">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                            </a>
                                            </div> 

                                            <div class="col-3"> 
                                                @if($users->is_verified === '0') 
                                                    <a href="{{route('admin.user.verify', ['uuid'=>$users->uuid,'status'=>'1'])}}"  title="Verify user"><button class="btn btn-outline-success"><i class="fa fa-check text-success fa-2x"></i></button></a>
                                                @else 
                                                    <a href="{{route('admin.user.verify', ['uuid'=>$users->uuid,'status'=>'0'])}}"  title="Unverify user"><button class="btn btn-outline-danger"><i class="fa fa-times text-danger fa-2x"></i></button></a>
                                                @endif 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr> 
                                    <td colspan="6" class="text-center">No pending user found</td>
                                </tr>
                                @endforelse 
                                </tbody>
                            </table> 
 
                            {{ $user->links('vendor.pagination.custom') }}
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
@endsection

 