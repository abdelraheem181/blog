@extends('website.layout')

@section('content')
    <!-- Reading Progress Bar -->
    <div class="reading-progress-bar" id="readingProgress"></div>

    <section class="post-container">
        <!-- Enhanced Page Header -->
        <header class="masthead enhanced-masthead" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset($post->image_cover) }}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading enhanced-post-heading">
                            <!-- Category Badge -->
                            @if($post->category)
                                <div class="category-badge mb-3">
                                    <span class="badge bg-primary">{{ $post->category->name }}</span>
                                </div>
                            @endif
                            
                            <h1 class="post-title">{{ $post->title }}</h1>
                            
                            @if($post->subtitle)
                                <h2 class="subheading post-subtitle">{{ $post->subtitle }}</h2>
                            @endif
                            
                            <div class="post-meta enhanced-meta">
                                <div class="author-info">
                                    <div class="author-avatar">
                                        @if($post->author && $post->author->profile_picture)
                                            <img src="{{ asset($post->author->profile_picture) }}" alt="{{ $post->author->name }}" class="author-img">
                                        @else
                                            <div class="author-placeholder">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="author-details">
                                        <span class="author-name">{{ $post->author->name ?? 'Anonymous' }}</span>
                                        <span class="publish-date">{{ $post->created_at->format('F j, Y') }}</span>
                                    </div>
                                </div>
                                
                                <div class="reading-stats">
                                    <span class="reading-time">
                                        <i class="fas fa-clock"></i>
                                        {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} @lang('min read')
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->
        <article class="post-content-wrapper">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <!-- Social Sharing -->
                        <div class="social-sharing mb-4">
                            <div class="sharing-buttons">
                                <span class="share-label">@lang('Share this post:')</span>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode('Check out this post: ' . request()->url()) }}" class="share-btn email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="post-content">
                            <div class="content-body">
                                {!! $post->content !!}
                            </div>
                            
                            @if($post->image_cover)
                                <div class="featured-image-container">
                                    <img class="img-fluid featured-image" src="{{ asset($post->image_cover) }}" alt="{{ $post->title }}" />
                                    <div class="image-caption">
                                        <p class="caption-text">{{ $post->title }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Post Footer -->
                        <div class="post-footer">
                            <div class="post-tags">
                                @if($post->category)
                                    <span class="tag">
                                        <i class="fas fa-tag"></i>
                                        {{ $post->category->name }}
                                    </span>
                                @endif
                            </div>
                            
                            <div class="post-credits">
                                <p class="credits-text">
                                    @lang('Written by') <strong>{{ $post->author->name ?? 'Anonymous' }}</strong>
                                    <span class="separator">•</span>
                                    @lang('Published on') {{ $post->created_at->format('F j, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Author Bio -->
                        @if($post->author)
                            <div class="author-bio">
                                <div class="bio-header">
                                    <h3>@lang('About the Author')</h3>
                                </div>
                                <div class="bio-content">
                                    <div class="author-avatar-large">
                                        @if($post->author->profile_picture)
                                            <img src="{{ asset($post->author->profile_picture) }}" alt="{{ $post->author->name }}" class="author-img-large">
                                        @else
                                            <div class="author-placeholder-large">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="author-info-large">
                                        <h4 class="author-name-large">{{ $post->author->name }}</h4>
                                        <p class="author-description">
                                            {{ $post->author->bio ?? 'A passionate writer sharing insights and stories.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Related Posts -->
                        <div class="related-posts">
                            <div class="related-header">
                                <h3>@lang('Related Posts')</h3>
                            </div>
                            <div class="related-grid">
                                <!-- This would be populated with actual related posts -->
                                <div class="related-post-card">
                                    <div class="related-post-image">
                                        <img src="{{ asset('assets/img/post-sample-image.jpg') }}" alt="Related Post">
                                    </div>
                                    <div class="related-post-content">
                                        <h4 class="related-post-title">@lang('Sample Related Post')</h4>
                                        <p class="related-post-excerpt">@lang('This is a sample related post that would appear here...')</p>
                                        <span class="related-post-date">@lang('January 15, 2024')</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <style>
        /* Reading Progress Bar */
        .reading-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #0085A1, #00BCD4);
            z-index: 9999;
            transition: width 0.3s ease;
        }

        /* Enhanced Masthead */
        .enhanced-masthead {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 70vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .enhanced-masthead::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 133, 161, 0.8), rgba(0, 188, 212, 0.6));
            z-index: 1;
        }

        .enhanced-post-heading {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .post-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .post-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Category Badge */
        .category-badge .badge {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Enhanced Meta */
        .enhanced-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .author-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-placeholder {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .author-details {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .publish-date {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .reading-stats {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .reading-time {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
        }

        /* Post Content Wrapper */
        .post-content-wrapper {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        /* Social Sharing */
        .social-sharing {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .sharing-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-label {
            font-weight: 600;
            color: #333;
            margin-right: 0.5rem;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .share-btn.twitter { background: #1DA1F2; }
        .share-btn.facebook { background: #4267B2; }
        .share-btn.linkedin { background: #0077B5; }
        .share-btn.email { background: #EA4335; }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            color: white;
        }

        /* Post Content */
        .post-content {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .content-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }

        .content-body p {
            margin-bottom: 1.5rem;
        }

        .content-body h2, .content-body h3, .content-body h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #0085A1;
        }

        .featured-image-container {
            margin: 2rem 0;
            text-align: center;
        }

        .featured-image {
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            max-width: 100%;
            height: auto;
        }

        .image-caption {
            margin-top: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .caption-text {
            margin: 0;
            font-style: italic;
            color: #666;
        }

        /* Post Footer */
        .post-footer {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .post-tags {
            margin-bottom: 1rem;
        }

        .tag {
            display: inline-block;
            background: #e9ecef;
            color: #495057;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .credits-text {
            margin: 0;
            color: #666;
            font-size: 0.95rem;
        }

        .separator {
            margin: 0 0.5rem;
            color: #ccc;
        }

        /* Author Bio */
        .author-bio {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .bio-header h3 {
            color: #0085A1;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .bio-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .author-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .author-img-large {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-placeholder-large {
            width: 100%;
            height: 100%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 2rem;
        }

        .author-name-large {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }

        .author-description {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        /* Related Posts */
        .related-posts {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .related-header h3 {
            color: #0085A1;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .related-grid {
            display: grid;
            gap: 1.5rem;
        }

        .related-post-card {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .related-post-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .related-post-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .related-post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-post-content {
            flex: 1;
        }

        .related-post-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .related-post-excerpt {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .related-post-date {
            font-size: 0.8rem;
            color: #999;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .post-title {
                font-size: 2.5rem;
            }

            .post-subtitle {
                font-size: 1.2rem;
            }

            .enhanced-meta {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .post-content {
                padding: 2rem 1.5rem;
            }

            .bio-content {
                flex-direction: column;
                text-align: center;
            }

            .sharing-buttons {
                justify-content: center;
            }

            .related-post-card {
                flex-direction: column;
            }

            .related-post-image {
                width: 100%;
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            .post-title {
                font-size: 2rem;
            }

            .post-content {
                padding: 1.5rem 1rem;
            }

            .social-sharing {
                padding: 1rem;
            }
        }
    </style>

    <script>
        // Reading Progress Bar
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            document.getElementById('readingProgress').style.width = scrollPercent + '%';
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection