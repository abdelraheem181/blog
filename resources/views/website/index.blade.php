@extends('website.layout')

@section('content')
<section>
    <!-- Enhanced Page Header with Gradient Overlay -->
    <header class="masthead position-relative" style="background-image: linear-gradient(135deg, rgba(0, 133, 161, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%), url('assets/img/home-bg.jpg'); background-size: cover; background-position: center;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <div class="site-heading">
                        <h1 class="display-4 fw-bold text-white mb-3">@lang('Clean Blog')</h1>
                        <span class="subheading fs-5 text-white-75">@lang('A Modern Blog Theme by Abdelraheem')</span>
                        <div class="mt-4">
                            <a href="#posts" class="btn btn-outline-light btn-lg px-4 me-3">
                                <i class="fas fa-arrow-down me-2"></i>@lang('Explore Posts')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative Elements -->
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg class="w-100" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#fff"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#fff"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#fff"></path>
            </svg>
        </div>
    </header>

    <!-- Enhanced Main Content Section -->
    <div class="container px-4 px-lg-5 py-5" id="posts">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Section Header -->

                <div class="text-center mb-5">
                    <h2 class="section-heading text-primary mb-3">@lang('Latest Blog Posts')</h2>          
                    <p class="text-muted fs-6">@lang('Discover our latest thoughts, ideas, and insights')</p>
                </div>

                <!-- Enhanced Post Previews -->
                @if(isset($posts) && count($posts) > 0)
                @foreach ($posts as $post)
                        <article class="post-preview card border-0 shadow-sm mb-5 hover-lift">
                            <div class="card-body p-4">
                                <!-- Post Header -->
                                <div class="d-flex align-items-center mb-3">
                                    @if($post->author && $post->author->profile_picture)
                                        <img src="{{ asset('profile_picture/' . $post->author->profile_picture) }}" 
                                             alt="{{ $post->author->name }}" 
                                             class="rounded-circle me-3" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ $post->author->name ?? 'Anonymous' }}</h6>
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt me-1"></i>
                                            {{ $post->created_at->format('M j, Y') }}
                                        </small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-eye me-1"></i>{{ $post->views }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Post Content -->
                                <a href="{{ route('home.post.show' , $post->id) }}" class="text-decoration-none">
                                    <h3 class="post-title h4 fw-bold text-dark mb-2 hover-primary">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="post-subtitle text-muted mb-3">
                                        {{ $post->subtitle }}
                                    </p>
                                </a>

                                <!-- Post Footer -->
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted small me-3">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                        @if($post->category)
                                            <span class="badge bg-primary-subtle text-primary">
                                                {{ $post->category->name }}
                                            </span>
                                        @endif
                                    </div>
                                    <a href="{{ route('home.post.show' , $post->id) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        @lang('Read More') 
                                        <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <!-- No Posts State -->
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-newspaper fa-3x text-muted"></i>
                        </div>
                        <h4 class="text-muted mb-3">@lang('No Posts Yet')</h4>
                        <p class="text-muted">@lang('Check back soon for new content!')</p>
                    </div>
                @endif

                <!-- Enhanced Pagination/More Posts Button -->
                <div class="text-center mt-5">
                    <a href="{{ route('home.post.index') }}" class="btn btn-primary btn-lg px-5 py-3 shadow-sm">
                        <i class="fas fa-archive me-2"></i>
                        @lang('View All Posts') 
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Enhanced UI -->
<style>
.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.hover-primary:hover {
    color: #0085A1 !important;
}

.bg-primary-subtle {
    background-color: rgba(0, 133, 161, 0.1) !important;
}

.text-primary {
    color: #0085A1 !important;
}

.btn-outline-primary {
    border-color: #0085A1;
    color: #0085A1;
}

.btn-outline-primary:hover {
    background-color: #0085A1;
    border-color: #0085A1;
    color: white;
}

.btn-primary {
    background-color: #0085A1;
    border-color: #0085A1;
}

.btn-primary:hover {
    background-color: #006d85;
    border-color: #006d85;
}

.card {
    border-radius: 12px;
    overflow: hidden;
}

.badge {
    font-weight: 500;
}

.section-heading {
    position: relative;
    display: inline-block;
}

.section-heading::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #0085A1, #00bcd4);
    border-radius: 2px;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .post-preview .card-body {
        padding: 1.5rem;
    }
    
    .post-title {
        font-size: 1.25rem;
    }
}
</style>
@endsection