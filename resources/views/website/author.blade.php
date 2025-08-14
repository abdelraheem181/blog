@extends('website.layout')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('{{ asset('img/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>{{ $author->name }}</h1>
                    <span class="subheading">@lang('Author Profile')</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                
                <!-- Author Profile Section -->
                <div class="card shadow-sm mb-5 author-profile-card">
                    <div class="card-body p-4">
                        <div class="row">
                            <!-- Author Image -->
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                @if($author->profile_picture)
                                    <img src="{{ asset('profile_picture/' . $author->profile_picture) }}" 
                                         alt="{{ $author->name }}" 
                                         class="img-fluid rounded-circle mb-3 author-avatar" 
                                         style="width: 200px; height: 200px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3 author-avatar" 
                                         style="width: 200px; height: 200px;">
                                        <i class="fas fa-user fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Author Info -->
                            <div class="col-md-8">
                                <h2 class="mb-3">{{ $author->name }}</h2>
                                
                                @if($author->bio)
                                    <p class="lead mb-4">{{ $author->bio }}</p>
                                @endif
                                
                                <!-- Contact Information -->
                                <div class="row mb-4 author-contact-info">
                                    @if($author->email)
                                        <div class="col-sm-6 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-envelope text-primary me-2"></i>
                                                <a href="mailto:{{ $author->email }}" class="text-decoration-none">{{ $author->email }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    @if($author->phone_no)
                                        <div class="col-sm-6 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-phone text-primary me-2"></i>
                                                <a href="tel:{{ $author->phone_no }}" class="text-decoration-none">{{ $author->phone_no }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    @if($author->website)
                                        <div class="col-sm-6 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-globe text-primary me-2"></i>
                                                <a href="{{ $author->website }}" target="_blank" class="text-decoration-none">{{ $author->website }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Social Links -->
                                @if($author->social_links)
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-2">@lang('Follow') {{ $author->name }}:</h6>
                                        <div class="d-flex gap-2 social-links">
                                            @php
                                                $socialLinks = json_decode($author->social_links, true);
                                            @endphp
                                            @if($socialLinks)
                                                @foreach($socialLinks as $platform => $url)
                                                    @if($url)
                                                        <a href="{{ $url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                            @switch($platform)
                                                                @case('facebook')
                                                                    <i class="fab fa-facebook-f"></i>
                                                                    @break
                                                                @case('twitter')
                                                                    <i class="fab fa-twitter"></i>
                                                                    @break
                                                                @case('linkedin')
                                                                    <i class="fab fa-linkedin-in"></i>
                                                                    @break
                                                                @case('instagram')
                                                                    <i class="fab fa-instagram"></i>
                                                                    @break
                                                                @case('youtube')
                                                                    <i class="fab fa-youtube"></i>
                                                                    @break
                                                                @case('github')
                                                                    <i class="fab fa-github"></i>
                                                                    @break
                                                                @default
                                                                    <i class="fas fa-link"></i>
                                                            @endswitch
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Author's Posts Section -->
                @php
                    $authorPosts = $author->posts()->where('is_published', 1)->orderBy('published_at', 'desc')->get();
                @endphp
                
                @if($authorPosts->count() > 0)
                    <div class="mb-5">
                        <h3 class="mb-4">@lang('Posts by') {{ $author->name }}</h3>
                        
                        <div class="author-posts-grid">
                            @foreach($authorPosts as $post)
                                <div class="post-preview">
                                    <div class="card h-100 shadow-sm post-card">
                                        @if($post->image_cover)
                                            <img src="{{ asset('image_cover/' . $post->image_cover) }}" 
                                                 class="card-img-top" 
                                                 alt="{{ $post->title }}"
                                                 style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('home.post.show', $post->slug) }}" class="text-decoration-none">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted">
                                                {{ Str::limit(strip_tags($post->content), 150) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted post-meta">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not published' }}
                                                </small>
                                                @if($post->category)
                                                    <span class="badge bg-primary category-badge">{{ $post->category->name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="{{ route('home.post.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">
                                                @lang('Read More') <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-5 empty-state">
                        <i class="fas fa-pen-fancy fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">@lang('No posts published yet')</h4>
                        <p class="text-muted">@lang('This author hasn\'t published any posts yet.')</p>
                    </div>
                @endif
                
                <!-- Back to Posts Button -->
                <div class="text-center">
                    <a href="{{ route('home.post.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left me-2"></i>@lang('Back to All Posts')
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</main>

@endsection
