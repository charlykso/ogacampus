@extends('admin.layouts.wrapper')

@section('content') 
        <div class="content">
            <div class="container-fluid"> 
                <div class="card">
                    <div class="card-header bg-light">
                        All Expired Events
                    </div>

                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Title</th>
                                    <th>Event Date</th> 
                                    <th>Ticket price</th> 
                                    <th>Free</th> 
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                <tr>
                                    <td>{{$event->id}}</td> 
                                    <td class="text-nowrap">{{$event->title}}</td> 
                                    <td class="text-nowrap">{{$event->event_date}}</td> 
                                    <td class="text-nowrap">&#8358;{{json_decode($event->ticket_price, true)['price']}}</td> 
                                    <td class="text-nowrap">{{$event->isFree? "yes":"no"}}</td> 
                                    <td> 
                                        <div class="row">
                                            <div class="col-6">   
                                                @if($event->status === 'active')
                                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'pending'])}}">
                                                    <button class="btn btn-danger btn-sm">suspend</i></button>
                                                </a>
                                                @else
                                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'active'])}}">
                                                    <button class="btn btn-primary btn-sm">activate</i></button>
                                                </a>
                                                @endif
                                            </div>
                                            <div class="col-6"> 
                                                <a href="{{route('admin.events.show', ['uuid'=>$event->uuid])}}">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                                </a>
                                            </div>  
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr> 
                                    <td colspan="6" class="text-center">No event found</td>
                                </tr>
                                @endforelse 
                                </tbody>
                            </table> 
 
                            {{ $events->links('vendor.pagination.custom') }}
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
@endsection

 