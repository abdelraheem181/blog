@extends('website.layout')

@section('content')
    <section class="blog-post-section">
        <!-- Enhanced Page Header -->
        <header class="masthead enhanced-masthead" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset($post->image_cover) }}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading enhanced-post-heading">
                            <div class="post-category mb-3">
                                <span class="badge bg-primary px-3 py-2 rounded-pill">
                                    <i class="fas fa-tag me-2"></i>@lang('Blog Post')
                                </span>
                            </div>
                            <h1 class="post-title">{{ $post->title }}</h1>
                            @if($post->subtitle)
                                <h2 class="subheading">{{ $post->subtitle}}</h2>
                            @endif
                            <div class="post-meta mt-4">
                                <div class="meta-item">
                                    <i class="fas fa-user-circle me-2"></i>
                                    <span> @lang('By')
                                         <a href="#!" class="author-link">{{ $post->author->name }}
                                            </a>
                                        </span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <span>{{ $post->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-eye me-2"></i>
                                    <span>{{ number_format($view) }} @lang('views')</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock me-2"></i>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-indicator">
                <i class="fas fa-chevron-down"></i>
            </div>
        </header>

        <!-- Enhanced Post Content -->
        <article class="enhanced-article mb-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <!-- Reading Progress Bar -->
                        <div class="reading-progress-container">
                            <div class="reading-progress-bar" id="readingProgress"></div>
                        </div>

                        <!-- Article Content -->
                        <div class="article-content">
                            <div class="content-wrapper">
                                {!! $post->content !!}
                            </div>

                            <!-- Featured Image -->
                            @if($post->image_cover)
                                <div class="featured-image-container my-5">
                                    <img class="img-fluid featured-image" src="{{ asset($post->image_cover) }}" alt="{{ $post->title }}" />
                                    <div class="image-caption">
                                        <i class="fas fa-image me-2"></i>
                                        @lang('Featured image for') "{{ $post->title }}"
                                    </div>
                                </div>
                            @endif

                            <!-- Article Footer -->
                            <div class="article-footer mt-5">
                                <hr class="article-divider">
                                
                                <!-- Author Info -->
                                <div class="author-section">
                                    <div class="author-avatar">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">{{ $post->author->name}}</h5>
                                        <p class="author-bio">@lang('Content creator and writer')</p>
                                    </div>
                                </div>

                                <!-- Article Tags -->
                                <div class="article-tags mt-4">
                                    <h6 class="tags-title">
                                        <i class="fas fa-tags me-2"></i>@lang('Tags')
                                    </h6>
                                    <div class="tags-container">
                                        <span class="tag">@lang('Blog')</span>
                                        <span class="tag">@lang('Article')</span>
                                        <span class="tag">@lang('Content')</span>
                                    </div>
                                </div>

                                <!-- Social Share -->
                                <div class="social-share mt-4">
                                    <h6 class="share-title">
                                        <i class="fas fa-share-alt me-2"></i>@lang('Share this post')
                                    </h6>
                                    <div class="share-buttons">
                                        <a href="#" class="share-btn share-facebook" title="Share on Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="share-btn share-twitter" title="Share on Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="share-btn share-linkedin" title="Share on LinkedIn">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a href="#" class="share-btn share-whatsapp" title="Share on WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!-- Custom CSS for enhanced UI -->
    <style>
        .blog-post-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .enhanced-masthead {
            position: relative;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .enhanced-post-heading {
            text-align: center;
            color: white;
            padding: 2rem 0;
        }

        .post-category .badge {
            font-size: 0.9rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .post-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .subheading {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .post-meta {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .meta-item i {
            color: #ffd700;
            margin-right: 0.5rem;
        }

        .author-link {
            color: #ffd700;
            text-decoration: none;
            font-weight: 600;
        }

        .author-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.5rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-10px);
            }
            60% {
                transform: translateX(-50%) translateY(-5px);
            }
        }

        .enhanced-article {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .reading-progress-container {
            position: sticky;
            top: 0;
            z-index: 100;
            background: white;
            border-radius: 20px 20px 0 0;
            overflow: hidden;
        }

        .reading-progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            width: 0%;
            transition: width 0.3s ease;
        }

        .article-content {
            padding: 3rem 0;
        }

        .content-wrapper {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #2c3e50;
        }

        .content-wrapper h1, .content-wrapper h2, .content-wrapper h3 {
            color: #34495e;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .content-wrapper p {
            margin-bottom: 1.5rem;
        }

        .featured-image-container {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .featured-image {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .featured-image:hover {
            transform: scale(1.02);
        }

        .image-caption {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .article-divider {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 3rem 0;
        }

        .author-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 2rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .author-avatar i {
            font-size: 3rem;
            color: #667eea;
        }

        .author-name {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .author-bio {
            color: #6c757d;
            margin: 0;
        }

        .tags-title, .share-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
        }

        .share-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .share-facebook { background: #1877f2; }
        .share-twitter { background: #1da1f2; }
        .share-linkedin { background: #0077b5; }
        .share-whatsapp { background: #25d366; }

        /* Responsive Design */
        @media (max-width: 768px) {
            .post-title {
                font-size: 2.5rem;
            }
            
            .post-meta {
                flex-direction: column;
                gap: 1rem;
            }
            
            .enhanced-article {
                margin-top: -30px;
                border-radius: 15px;
            }
            
            .author-section {
                flex-direction: column;
                text-align: center;
            }
            
            .share-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .post-title {
                font-size: 2rem;
            }
            
            .subheading {
                font-size: 1.2rem;
            }
            
            .enhanced-masthead {
                min-height: 60vh;
            }
        }
    </style>

    <!-- JavaScript for reading progress -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const progressBar = document.getElementById('readingProgress');
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset;
                const docHeight = document.body.offsetHeight - window.innerHeight;
                const scrollPercent = (scrollTop / docHeight) * 100;
                
                progressBar.style.width = scrollPercent + '%';
            });
        });
    </script>
@endsection