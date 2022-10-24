
@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary rounded text-white">
                    <div class="row">
                        <div class="col-md-6 ">
                        Event Information
                        </div>
                        <div class="col-md-6 text-md-right">
                            @if($event->status === 'active')
                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'suspended'])}}">
                                    <button class="btn btn-danger btn-sm border rounded">suspend</i></button>
                                </a>
                                @else
                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'active'])}}">
                                    <button class="btn btn-primary btn-sm border rounded">activate</i></button>
                               </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                      <h2 class="font-weight-bold">{{$event->title}}</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center mb-4">
                            <img src="{{url('storage/images/'.json_decode($event->pictures, true)['url'])}}" class="w-100 shadow">
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $event->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-calendar"></i> Event Date</th>
                                            <td>{{$event->readableEventDate }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-dot-circle"></i> Ticket Price</th>
                                            <td>
                                                @foreach ($event->ticket_price as $price)
                                                    {!! ucfirst(@$price['type']) . ': &#8358;' . $price['price'] !!} <br />
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-school"></i> School</th>
                                            <td>{{$event->school->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="badge p-2 badge-{{$event->status_code}}">{{ ucfirst($event->status) }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Organizer</th>
                                            <td>{{$event->organizer}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td>{{$event->contact}}</td>
                                        </tr>
                                        <tr>
                                            <th>Posted by</th>
                                            <td>{{$event->user->profile->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <th>Create time</th>
                                            <td>{{$event->created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-5"></div>

            <div class="card">
                <div class="card-header bg-primary text-white rounded">
                   Event Paid Tickets ({{ $orders->total()}})
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Reference</th>
                                <th>Person</th>
                                <th>Ticket Type</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $i => $order)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td class="text-nowrap">{{ $order->created_at->toFormattedDateString() }}</td>
                                <td class="text-nowrap">{{$order->reference}}</td>
                                <td class="text-nowrap">{{$order->user->profile ? $order->user->profile->fullName : ""}}</td>
                               <td class="text-nowrap">{{ ucfirst($order->ticket) }}</td>
                                <td class="text-nowrap">{{$order->quantity}}</td>
                                <td class="text-nowrap"> &#8358; {{ $order->amount }}</td>
                                <td class="text-nowrap"><span class="badge p-2 badge-{{ $order->status_code }}">{{ ucfirst($order->status) }}</span> </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No Order for this event yet.</td>
                            </tr>
                            @endforelse
                            <tr>
                                <th class="text-nowrap text-right" colspan="6"> Total Amount Paid </td>
                                <th class="text-nowrap" colspan="2"> &#8358; {{ number_format($orders->sum('amount'), 2, '.', ', ') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
