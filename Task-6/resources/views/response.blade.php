@extends('layouts.app')

@section('title', 'Event Created - Event Planner')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white text-center">
                    <h3 class="mb-0">🎉 Event Created Successfully!</h3>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    
                    <h4 class="text-success mb-4">Your event has been created successfully!</h4>
                    
                    @isset($event)
                        <div class="card bg-light">
                            <div class="card-body text-start">
                                <h5>Event Details:</h5>
                                <p><strong>Title:</strong> {{ $event['title'] }}</p>
                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event['date'])->format('F d, Y') }}</p>
                                <p><strong>Location:</strong> {{ $event['location'] }}</p>
                                <p><strong>Description:</strong> {{ $event['description'] }}</p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            No event data available.
                        </div>
                    @endisset

                    <div class="mt-4">
                        <a href="{{ route('events.create') }}" class="btn btn-primary">Create Another Event</a>
                        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">View All Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection