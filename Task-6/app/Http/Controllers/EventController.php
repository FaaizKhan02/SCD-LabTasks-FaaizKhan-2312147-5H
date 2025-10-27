<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Sample events data (in real app, this would come from database)
    private $events = [
        1 => [
            'id' => 1,
            'title' => 'Tech Conference 2024',
            'date' => '2024-03-15',
            'location' => 'Convention Center, New York',
            'description' => 'Annual technology conference featuring latest innovations',
            'status' => 'upcoming'
        ],
        2 => [
            'id' => 2,
            'title' => 'Music Festival',
            'date' => '2024-02-20',
            'location' => 'Central Park',
            'description' => 'Outdoor music festival with various artists',
            'status' => 'ongoing'
        ],
        3 => [
            'id' => 3,
            'title' => 'Business Workshop',
            'date' => '2024-01-10',
            'location' => 'Business Hub, Downtown',
            'description' => 'Entrepreneurship and business development workshop',
            'status' => 'completed'
        ]
    ];


    public function index()
    {
        return view('events', ['events' => $this->events]);
    }

    public function details($id)
    {
        $event = isset($this->events[$id]) ? $this->events[$id] : null;
        
        return view('details', ['event' => $event]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate form fields
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        // If validation passes, show success response
        $eventData = [
            'title' => $request->title,
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description
        ];

        return view('response', ['event' => $eventData]);
    }
}