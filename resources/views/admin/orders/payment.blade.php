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
                                    <th>Date created</th>
                                    <th>Title</th>
                                    <th>Host</th>
                                    <th>Event Date</th>
                                    <th>Tickets Sold</th>
                                    <th>Total Ticket Amount</th>
                                    <th colspan="2">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $i => $event)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $event->created_at->toFormattedDateString() }}</td>
                                    <td class="text-nowrap">{{$event->title}}</td>
                                    <td class="text-nowrap">{{ $event->organizer }}</td>
                                    <td class="text-nowrap">{{$event->readableEventDate}}</td>
                                    <td class="text-nowrap text-center">{{ $event->orders()->paid()->sum('quantity') }}</td>
                                    <td class="text-nowrap"> &#8358; {{number_format($event->orders()->paid()->sum('amount'), 2, '. ', ', ') }}</td>
                                    <td class="text-nowrap"> <span class="p-2 badge badge-{{ $event->status_code }}">{{ ucfirst($event->status)}} </span> </td>
                                    <td class="text-nowrap"><a class="btn btn-primary" href="{{ route('admin.events.show', $event->uuid)}}">Details </a></td>
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

