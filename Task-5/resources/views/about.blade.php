@extends('layouts.app')

@section('title', 'About Us - GameZone')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="text-center mb-5">About GameZone</h1>
                
                <div class="row mb-5">
                    <div class="col-md-6">
                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Gaming Community" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-md-6">
                        <h3>Our Story</h3>
                        <p>Founded in 2020, GameZone has been at the forefront of gaming culture, bringing together passionate gamers from around the world.</p>
                        <p>We believe in the power of gaming to connect people, tell amazing stories, and create unforgettable experiences.</p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-12">
                        <h3 class="text-center mb-4">What We Offer</h3>
                        <div class="row text-center">
                            <div class="col-md-4 mb-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h4>🎮 Game Reviews</h4>
                                        <p>Honest and detailed reviews of the latest games across all platforms.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h4>📰 Gaming News</h4>
                                        <p>Stay updated with the latest news, updates, and announcements from the gaming world.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h4>👥 Community</h4>
                                        <p>Join our vibrant community of gamers to share experiences and make new friends.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <h3>Our Mission</h3>
                    <p class="lead">To create the ultimate gaming destination where players can discover, connect, and share their passion for gaming.</p>
                </div>
            </div>
        </div>
    </div>
@endsection