@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <h2 class="mb-4">September</h2>

        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-striped table-bordered logbook-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Clock In</th>
                    <th>Clock Out</th>
                    <th>Activity</th>
                    <th>Description</th>
                    <th>Site Supervisor Approval</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        @include('edit-log-modal')
</div>
</div>
@endsection
