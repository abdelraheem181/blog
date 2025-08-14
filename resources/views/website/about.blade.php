@extends('website.layout')

@section('content')
<section>
    <!-- Enhanced Page Header with Parallax Effect -->
    <header class="masthead enhanced-masthead" style="background-image: url('{{ asset('assets/img/about-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading text-center">
                        <div class="animated-icon mb-4">
                            <i class="fas fa-user-circle fa-3x text-white"></i>
                        </div>
                        <h1 class="display-4 fw-bold text-white mb-3">{{ $abouts->first()->title }}</h1>
                        <div class="divider mx-auto mb-4"></div>
                        <span class="subheading lead text-white-50">{{ $abouts->first()->subtitle }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </header>

    <!-- Main Content with Enhanced Layout -->
    <main class="mb-5">
        <div class="container px-4 px-lg-5">
            <!-- About Content Section -->
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="about-content-card">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="about-image-wrapper">
                                    <div class="about-image">
                                        <i class="fas fa-lightbulb fa-5x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-text">
                                    <h3 class="section-title mb-4">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        @lang('Our Story')
                                    </h3>
                                    <p class="lead mb-4">{{ $abouts->first()->description }}</p>
                                    <div class="about-stats">
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="stat-item">
                                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                                    <h4 class="stat-number">100+</h4>
                                                    <p class="stat-label">@lang('Happy Readers')</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="stat-item">
                                                    <i class="fas fa-pen-fancy fa-2x text-success mb-2"></i>
                                                    <h4 class="stat-number">50+</h4>
                                                    <p class="stat-label">@lang('Articles')</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="stat-item">
                                                    <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                                                    <h4 class="stat-number">1000+</h4>
                                                    <p class="stat-label">@lang('Likes')</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="section-heading">
                            <i class="fas fa-gem text-primary me-2"></i>
                            @lang('What We Offer')
                        </h2>
                        <div class="divider mx-auto mb-4"></div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-book-open fa-3x text-primary"></i>
                                </div>
                                <h4 class="feature-title">@lang('Quality Content')</h4>
                                <p class="feature-description">@lang('We provide well-researched, engaging content that educates and entertains our readers.')</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-clock fa-3x text-success"></i>
                                </div>
                                <h4 class="feature-title">@lang('Regular Updates')</h4>
                                <p class="feature-description">@lang('Stay updated with our latest articles and insights delivered regularly to your inbox.')</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fas fa-comments fa-3x text-info"></i>
                                </div>
                                <h4 class="feature-title">@lang('Community')</h4>
                                <p class="feature-description">@lang('Join our community of readers and share your thoughts and experiences.')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="cta-card text-center">
                        <h3 class="cta-title mb-4">
                            <i class="fas fa-rocket text-warning me-2"></i>
                            @lang('Ready to Explore?')
                        </h3>
                        <p class="cta-description mb-4">@lang('Join our community and discover amazing content that will inspire and educate you.')</p>
                        <div class="cta-buttons">
                            <a href="{{ route('home.post.index') }}" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-arrow-right me-2"></i>
                                @lang('Read Our Blog')
                            </a>
                            <a href="{{ route('home.contact.index') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-envelope me-2"></i>
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<style>
/* Enhanced Masthead Styles */
.enhanced-masthead {
    position: relative;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.enhanced-masthead .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 133, 161, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
    z-index: 1;
}

.enhanced-masthead .container {
    position: relative;
    z-index: 2;
}

.animated-icon {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #0085A1, #fff);
    border-radius: 2px;
}

.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 24px;
    animation: pulse 2s infinite;
    z-index: 2;
}

@keyframes pulse {
    0% {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }
    50% {
        opacity: 0.5;
        transform: translateX(-50%) scale(1.1);
    }
    100% {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }
}

/* About Content Card */
.about-content-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 133, 161, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.about-content-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
}

.about-image-wrapper {
    text-align: center;
}

.about-image {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 50%;
    width: 200px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(0, 133, 161, 0.2);
}

.section-title {
    color: #333;
    font-weight: 600;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #0085A1, #00bcd4);
    border-radius: 2px;
}

/* Stats Section */
.about-stats {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e9ecef;
}

.stat-item {
    padding: 1rem;
    transition: transform 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #0085A1;
    margin: 0;
}

.stat-label {
    font-size: 0.9rem;
    color: #6c757d;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Feature Cards */
.feature-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 133, 161, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: #0085A1;
}

.feature-icon {
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
}

.feature-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 1rem;
}

.feature-description {
    color: #6c757d;
    line-height: 1.6;
}

/* CTA Card */
.cta-card {
    background: linear-gradient(135deg, #0085A1 0%, #00bcd4 100%);
    border-radius: 20px;
    padding: 3rem;
    color: white;
    box-shadow: 0 20px 40px rgba(0, 133, 161, 0.3);
}

.cta-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.cta-buttons .btn {
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.cta-buttons .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn-outline-primary {
    border-color: white;
    color: white;
}

.btn-outline-primary:hover {
    background: white;
    color: #0085A1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .enhanced-masthead {
        min-height: 60vh;
        background-attachment: scroll;
    }
    
    .about-content-card {
        padding: 2rem;
    }
    
    .about-image {
        width: 150px;
        height: 150px;
    }
    
    .cta-card {
        padding: 2rem;
    }
    
    .cta-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .cta-buttons .btn:last-child {
        margin-bottom: 0;
    }
}

/* Section Headings */
.section-heading {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Loading animation for content */
.about-content-card,
.feature-card,
.cta-card {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
