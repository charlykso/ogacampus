
@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-10 ">
                            Service details
                        </div>
                        <div class="col-md-2 text-md-right">
                            @if($services->status === 'active')
                                <a href="{{route('admin.service.status', ['uuid'=>$services->uuid, 'status'=>'pending'])}}">
                                    <button class="btn btn-danger btn-sm">suspend</i></button>
                                </a>
                                @else
                                <a href="{{route('admin.service.status', ['uuid'=>$services->uuid, 'status'=>'active'])}}">
                                    <button class="btn btn-primary btn-sm">activate</i></button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                      <h2 class="font-weight-bold">{{$services->title}}</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center mb-4">
                             <img src="{{url('storage/images/'.json_decode($services->pictures, true)['url'])}}" class="w-100">
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Description</th>
                                            <td>  {{$services->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>School</th>
                                            <td>{{$services->school->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$services->status}}</td>
                                        </tr>
                                        <tr>
                                            <th>Business</th>
                                            <td>{{$services->business_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{$services->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td>{{$services->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$services->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Created </th>
                                            <td>{{$services->created_at->toDayDateTimeString()}}</td>
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
