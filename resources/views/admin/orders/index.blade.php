@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                        {{$title}} ({{ $orders->total()}})
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
                                    <th>Event</th>
                                    <th>School</th>
                                    <th>Ticket Type</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $i => $order)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td class="text-nowrap">{{ $order->created_at->toFormattedDateString() }}</td>
                                    <td class="text-nowrap">{{$order->reference}}</td>
                                    <td class="text-nowrap">{{$order->user->profile ? $order->user->profile->fullName : ""}}</td>
                                    <td class="text-nowrap">{{$order->event->title}}</td>
                                    <td class="text-nowrap">{{$order->event->school->name}}</td>
                                    <td class="text-nowrap">{{ ucfirst($order->ticket) }}</td>
                                    <td class="text-nowrap">{{$order->quantity}}</td>
                                    <td class="text-nowrap"> &#8358; {{ $order->amount }}</td>
                                    <td class="text-nowrap"><span class="badge p-2 badge-{{ $order->status_code }}">{{ ucfirst($order->status) }}</span> </td>

                                    {{-- <td>
                                        <a href="{{route('admin.order.show', $order->slug)}}" class="btn btn-primary btn-sm">
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

                            {{ $orders->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

