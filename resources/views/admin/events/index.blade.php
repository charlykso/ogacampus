@extends('admin.layouts.wrapper')
@section('title', $title)

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                       {{$title}} ({{ $events->total()}})
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Host</th>
                                    <th>Venue</th>
                                    <th>Event Date</th>
                                    <th>Ticket price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $i => $event)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td class="text-nowrap">{{$event->title}}</td>
                                    <td class="text-nowrap">{{ $event->organizer }}</td>
                                    <td class="text-nowrap">{{ $event->address }}</td>
                                    <td class="text-nowrap">{{$event->readableEventDate}}</td>
                                    <td class="text-nowrap">
                                        @foreach ($event->ticket_price as $price)
                                            {!! ucfirst(@$price['type']) . ': &#8358;' . $price['price'] !!} <br />
                                        @endforeach
                                    </td>
                                    <td>
                                                @if($event->status === 'active')
                                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'suspended'])}}">
                                                    <button class="btn btn-danger btn-sm">suspend</i></button>
                                                </a>
                                                @else
                                                <a href="{{route('admin.event.status', ['uuid'=>$event->uuid, 'status'=>'active'])}}">
                                                    <button class="btn btn-primary btn-sm">activate</i></button>
                                                </a>
                                                @endif
                                                <a href="{{route('admin.events.show', ['uuid'=>$event->uuid])}}">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white"></i></button>
                                                </a>
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

