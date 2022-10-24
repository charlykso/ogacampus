@extends('admin.layouts.wrapper')

@section('content') 
        <div class="content">
            <div class="container-fluid"> 
                <div class="card">
                    <div class="card-header bg-light">
                        All active services
                    </div>

                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Title</th>
                                    <th>School</th> 
                                    <th>Rate</th>  
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td> 
                                    <td class="text-nowrap">{{$service->title}}</td> 
                                    <td class="text-nowrap">{{$service->school_details->name}}</td> 
                                    <td class="text-nowrap">{{$service->rate}}</td>  
                                    <td> 
                                    <div class="row">
                                            <div class="col-6">   
                                                @if($service->status === 'active')
                                                <a href="{{route('admin.service.status', ['uuid'=>$service->uuid, 'status'=>'pending'])}}">
                                                    <button class="btn btn-danger btn-sm">suspend</i></button>
                                                </a>
                                                @else
                                                <a href="{{route('admin.service.status', ['uuid'=>$service->uuid, 'status'=>'active'])}}">
                                                    <button class="btn btn-primary btn-sm">activate</i></button>
                                                </a>
                                                @endif
                                            </div>
                                            <div class="col-6"> 
                                                <a href="{{route('admin.service.show', ['uuid'=>$service->uuid])}}">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                                </a>
                                            </div>  
                                        </div>
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

 