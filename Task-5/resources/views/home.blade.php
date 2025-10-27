@extends('layouts.app')

@section('title', 'Home - GameZone')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Welcome to GameZone</h1>
            <p class="lead mb-4">Discover the latest games, reviews, and gaming news</p>
            <a href="#featured-games" class="btn btn-primary btn-lg">Explore Games</a>
        </div>
    </section>

    <!-- Featured Games -->
    <section id="featured-games" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Featured Games</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card game-card">
                        <img src="https://images.unsplash.com/photo-1551103782-8ab07afd45c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Cyberpunk Adventure">
                        <div class="card-body">
                            <h5 class="card-title">Cyberpunk Adventure</h5>
                            <p class="card-text">Immerse yourself in a futuristic world full of action and mystery.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">RPG</span>
                                <small class="text-muted">4.5/5</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card game-card">
                        <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Space Warriors">
                        <div class="card-body">
                            <h5 class="card-title">Space Warriors</h5>
                            <p class="card-text">Battle across galaxies in this epic space shooter game.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">Action</span>
                                <small class="text-muted">4.8/5</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card game-card">
                        <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Fantasy Quest">
                        <div class="card-body">
                            <h5 class="card-title">Fantasy Quest</h5>
                            <p class="card-text">Embark on an epic journey through magical realms and ancient dungeons.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-warning">Adventure</span>
                                <small class="text-muted">4.6/5</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Latest Gaming News</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Game Release: Cyber Revolution</h5>
                            <p class="card-text">The highly anticipated sequel to Cyberpunk Adventure is finally here with enhanced graphics and new storylines.</p>
                            <span class="badge bg-info">New Release</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming Gaming Tournament</h5>
                            <p class="card-text">Register now for the annual GameZone tournament with $50,000 in prizes!</p>
                            <span class="badge bg-danger">Tournament</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection