@extends('layouts.app')

@section('title', 'All Events - Event Planner')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="hero-section text-center rounded">
        <h1 class="display-4 fw-bold">Upcoming Events</h1>
        <p class="lead">Manage and track all your events in one place</p>
        <a href="{{ route('events.create') }}" class="btn btn-light btn-lg">Create New Event</a>
    </div>

    <!-- Events Table -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Events List</h3>
        </div>
        <div class="card-body">
            @isset($events)
                @if(count($events) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{ $event['title'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event['date'])->format('M d, Y') }}</td>
                                    <td>{{ $event['location'] }}</td>
                                    <td>
                                        @if($event['status'] == 'upcoming')
                                            <span class="badge bg-success status-badge">Upcoming</span>
                                        @elseif($event['status'] == 'ongoing')
                                            <span class="badge bg-warning status-badge">Ongoing</span>
                                        @else
                                            <span class="badge bg-secondary status-badge">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('events.details', $event['id']) }}" 
                                           class="btn btn-sm btn-outline-primary">View Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <h4>No events found!</h4>
                        <p>Start by creating your first event.</p>
                        <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
                    </div>
                @endif
            @else
                <div class="alert alert-warning text-center">
                    Events data is not available.
                </div>
            @endisset
        </div>
    </div>
</div>
@endsection