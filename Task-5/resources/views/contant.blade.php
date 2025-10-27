@extends('layouts.app')

@section('title', 'Contact Us - GameZone')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="text-center mb-5">Contact GameZone</h1>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-body p-4">
                                <h4 class="mb-4">Send us a Message</h4>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <select class="form-select" id="subject" required>
                                            <option value="">Choose a subject...</option>
                                            <option value="support">Technical Support</option>
                                            <option value="partnership">Partnership</option>
                                            <option value="feedback">Feedback</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" rows="5" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Contact Information</h5>
                                <div class="mb-3">
                                    <strong>📍 Address</strong>
                                    <p>123 Gaming Street<br>Game City, GC 12345</p>
                                </div>
                                <div class="mb-3">
                                    <strong>📞 Phone</strong>
                                    <p>+1 (555) 123-GAME</p>
                                </div>
                                <div class="mb-3">
                                    <strong>✉️ Email</strong>
                                    <p>info@gamezone.com</p>
                                </div>
                                <div class="mb-3">
                                    <strong>🕒 Business Hours</strong>
                                    <p>Monday - Friday: 9AM - 6PM<br>Saturday: 10AM - 4PM</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5>Follow Us</h5>
                                <div class="d-flex gap-3 mt-3">
                                    <a href="#" class="btn btn-outline-primary">📘 Facebook</a>
                                    <a href="#" class="btn btn-outline-info">🐦 Twitter</a>
                                    <a href="#" class="btn btn-outline-danger">📷 Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection