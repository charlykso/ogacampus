@extends('admin.layouts.wrapper')
@section('title', $title)
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded">
                       <div class="row">
                        <div class="col-md-6">All Staffs ({{ $staffs->total()}})</div>
                        <div class="col-md-6 text-md-right">
                            <!-- Button trigger modal -->
                             <a href="{{ route('admin.staff.create') }}" class="btn btn-primary border rounded"> Add New Staff </a>
                         </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>School</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($staffs as $i => $staff)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td class="text-nowrap">{{ $staff->staff ? $staff->staff->name : '' }}</td>
                                            <td class="text-nowrap">{{$staff->email}} </td>
                                            <td class="text-nowrap">{{$staff->phone}}</td>
                                            <td class="text-nowrap">{{$staff->role->title }}</td>
                                            <td class="text-nowrap"><span class="badge p-2 badge-{{ $staff->staff ? $staff->staff->status_code : 'dark' }}">{{$staff->staff ? $staff->staff->status : ''}}</span></td>
                                            <td><form method="POST" action="{{ route('admin.staff.update', $staff->staff->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                <label><input type="checkbox" name="access[]" class="input-checkbox" value="giveaway" {{ in_array( 'giveaway', $staff->staff->access ?? []) ? 'checked' : '' }} > Cash Giveaway </label>
                                                <label><input type="checkbox" name="access[]" class="input-checkbox" value="verification" {{ in_array( 'verification', $staff->staff->access ?? []) ? 'checked' : '' }} > Verification Request </label>
                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No staff found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $staffs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

