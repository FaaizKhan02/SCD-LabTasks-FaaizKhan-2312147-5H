@extends('layouts.app')

@section('title', 'Event Details - Event Planner')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @isset($event)
                <div class="card event-card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">{{ $event['title'] }}</h3>
                            @if($event['status'] == 'upcoming')
                                <span class="badge bg-success status-badge">Upcoming</span>
                            @elseif($event['status'] == 'ongoing')
                                <span class="badge bg-warning status-badge">Ongoing</span>
                            @else
                                <span class="badge bg-secondary status-badge">Completed</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>📅 Date:</strong>
                                <p class="mb-2">{{ \Carbon\Carbon::parse($event['date'])->format('F d, Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>📍 Location:</strong>
                                <p class="mb-2">{{ $event['location'] }}</p>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <strong>📝 Description:</strong>
                            <p class="mb-2">{{ $event['description'] }}</p>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
                            <a href="{{ route('events.create') }}" class="btn btn-primary">Create New Event</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger text-center">
                    <h4>Event Not Found!</h4>
                    <p>The event you're looking for doesn't exist.</p>
                    <a href="{{ route('events.index') }}" class="btn btn-primary">View All Events</a>
                </div>
            @endisset
        </div>
    </div>
</div>
@endsection