@extends('website.layout')

@section('content')
<section>
    <!-- Enhanced Page Header -->
    <header class="masthead" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/img/contact-bg.jpg'); background-size: cover; background-position: center; min-height: 60vh;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <div class="page-heading">
                        <h1 class="display-4 text-white fw-bold mb-3">@lang('Get In Touch')</h1>
                        <span class="subheading text-white-50 fs-5">@lang("Let's start a conversation. I'd love to hear from you!")</span>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-white-50">
                                    <i class="fas fa-envelope me-2"></i>
                                    <span>@lang('Email me')</span>
                                </div>
                                <div class="text-white-50">
                                    <i class="fas fa-phone me-2"></i>
                                    <span>@lang('Call me')</span>
                                </div>
                                <div class="text-white-50">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <span>@lang('Visit me')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-5">
        <div class="container px-4 px-lg-5">
            <!-- Contact Information Cards -->
            <div class="row mb-5">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <h5 class="card-title">@lang('Email')</h5>
                            <p class="card-text text-muted">@lang('Drop me a line anytime')</p>
                            <a href="mailto:contact@example.com" class="text-decoration-none">abdelraheem181@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <h5 class="card-title">@lang('Phone')</h5>
                            <p class="card-text text-muted">@lang('Lets talk on the phone')</p>
                            <a href="tel:+1234567890" class="text-decoration-none">+995530708634</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <h5 class="card-title">@lang('Location')</h5>
                            <p class="card-text text-muted">@lang('Based in the heart of the city')</p>
                            <span class="text-muted">@lang('Dammam , Saudi Arabia')</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-primary bg-gradient text-white text-center py-4">
                            <h3 class="mb-0">@lang('Send Me a Message')</h3>
                            <p class="mb-0 opacity-75">@lang("I'll get back to you as soon as possible!")</p>
                        </div>
                        <div class="card-body p-5">
                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-exclamation-triangle me-3"></i>
                                        <div>
                                            <h6 class="mb-1">@lang('Please fix the following errors:')</h6>
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success border-0 shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle me-3"></i>
                                        <div>
                                            <h6 class="mb-1">@lang('Message Sent Successfully!')</h6>
                                            <p class="mb-0">{{ session('success') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('home.contact.store') }}" class="needs-validation" novalidate @if(app()->getLocale() == 'ar') dir="rtl" @endif>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating">
                                            <input class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" 
                                                   name="name" 
                                                   type="text" 
                                                   placeholder="@lang('Enter your name...')" 
                                                   value="{{ old('name') }}"
                                                   required />
                                            <label for="name">
                                                <i class="fas fa-user me-2"></i>@lang('Full Name')  
                                            </label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-floating">
                                            <input class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   type="email" 
                                                   placeholder="@lang('Enter your email...')" 
                                                   value="{{ old('email') }}"
                                                   required />
                                            <label for="email">
                                                <i class="fas fa-envelope me-2"></i>@lang('Email Address')
                                            </label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input class="form-control @error('phone_no') is-invalid @enderror" 
                                               id="phone_no" 
                                               name="phone_no" 
                                               type="tel" 
                                               placeholder="@lang('Enter your phone number...')" 
                                               value="{{ old('phone_no') }}"
                                               required />
                                        <label for="phone_no">
                                            <i class="fas fa-phone me-2"></i>@lang('Phone Number')
                                        </label>
                                        @error('phone_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                                  id="message" 
                                                  name="message" 
                                                  placeholder="@lang('Enter your message here...')" 
                                                  style="height: 150px" 
                                                  required>{{ old('message') }}</textarea>
                                        <label for="message">
                                            <i class="fas fa-comment me-2"></i>@lang('Your Message')
                                        </label>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        @lang('Send Message')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h4 class="mb-4">@lang('Connect With Me')</h4>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-outline-primary btn-lg rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-lg rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-lg rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-lg rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<style>
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.form-floating > .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.btn-lg {
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-lg:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.card {
    transition: all 0.3s ease;
}

.alert {
    border-radius: 10px;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.rounded-circle {
    transition: all 0.3s ease;
}

.rounded-circle:hover {
    transform: scale(1.1);
}
</style>
@endsection