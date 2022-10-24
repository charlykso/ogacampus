@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-6 ">
                        Item Information
                        </div>
                        <div class="col-md-6 text-md-right">
                            <form action="{{route('admin.items.updatestatus', ['uuid'=>$items->uuid])}}" method="POST">
                                @csrf()
                                <select name="status" id="">
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="review">Review</option>
                                    <option value="expired">Expired</option>
                                </select>
                                <button class="btn btn-primary btn-sm py-0 rounded">Update Status</i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                      <h2 class="font-weight-bold">{{$items->title}}</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center mb-4">
                            <img src="{{url('storage/images/'.json_decode($items->pictures, true)['url'])}}" class="w-100">
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $items->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>School</th>
                                            <td>{{$items->school->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>{{$items->category->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="badge p-2 badge-{{$items->status_code}}">{{ ucfirst($items->status)}}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Service Price</th>
                                            <td>{{$items->price}}</td>
                                        </tr>
                                        <tr>
                                            <th>User Name</th>
                                            <td>{{$items->user->profile->fullName}}</td>
                                        </tr>
                                        <tr>
                                            <th>User phone</th>
                                            <td>{{$items->user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>User Email</th>
                                            <td>{{$items->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Create time</th>
                                            <td>{{$items->created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
