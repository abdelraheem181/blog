@extends('admin.theme.default')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit text-primary me-2"></i>
        @lang('Edit Post')  
        </h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-right me-1"></i>
        @lang('Return to Posts')
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-file-alt me-2"></i>
            @lang('Post Details')
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-8">
                        <!-- Title Section -->
                        <div class="form-group mb-4">
                            <label for="title" class="form-label fw-bold text-dark">
                                <i class="fas fa-heading text-primary me-2"></i>
                            @lang('Post Title')
                            </label>
                            <input type="text" id="ar_title" class="form-control form-control-lg @error('ar_title') is-invalid @enderror" 
                                   name="ar_title" value="{{ old('ar_title', $post->ar_title) }}" 
                                   placeholder="@lang('Enter Post Title in Arabic')">
                                   <input type="text" id="en_title" class="form-control form-control-lg @error('en_title') is-invalid @enderror" 
                                   name="en_title" value="{{ old('en_title', $post->en_title) }}" 
                                   placeholder="@lang('Enter Post Title in English')">

                            @error('ar_title')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('en_title')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Content Section -->
                        <div class="form-group mb-4">
                            <label for="content" class="form-label fw-bold text-dark">
                                <i class="fas fa-align-left text-primary me-2"></i>
                            @lang('Post Content')
                            </label>
                            <textarea id="ar_content" class="form-control @error('ar_content') is-invalid @enderror" 
                                      name="ar_content" rows="12" 
                                      placeholder="@lang('Enter Post Content in Arabic')">{{ old('ar_content', $post->ar_content) }}</textarea>
                                      <textarea id="en_content" class="form-control @error('en_content') is-invalid @enderror" 
                                      name="en_content" rows="12" 
                                      placeholder="@lang('Enter Post Content in English')">{{ old('en_content', $post->en_content) }}</textarea>
                            @error('ar_content')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('en_content')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <!-- Image Upload Section -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark mb-3">
                                    <i class="fas fa-image text-primary me-2"></i>
                            @lang('Post Image')
                                </h6>
                                
                                @if($post->image)
                                <div class="mb-3">
                                    <label class="form-label text-muted small">@lang('Current Image')</label>
                                    <div class="position-relative">
                                        <img src="{{ asset('public/image_cover/' . $post->image) }}" 
                                             alt="@lang('Post Image')" 
                                             class="img-fluid rounded border" 
                                             style="max-height: 150px; width: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    <input type="file" id="image_cover" class="form-control @error('image_cover') is-invalid @enderror" 
                                           name="image_cover" accept="image/*">
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                    @lang('It is recommended that the image be 1200×630 pixels')
                                    </small>
                                    @error('image_cover')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Publishing Settings -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark mb-3">
                                    <i class="fas fa-cog text-primary me-2"></i>
                            @lang('Publication Settings')
                                </h6>

                                <!-- Publication Status -->
                                <div class="form-group mb-3">
                                    <label for="is_published" class="form-label fw-bold text-dark">
                                        <i class="fas fa-toggle-on text-primary me-2"></i>
                            @lang('Publication Status')
                                    </label>
                                    <select id="is_published" class="form-select @error('is_published') is-invalid @enderror" name="is_published">
                                        <option value="">@lang('Select Status')</option>
                                        <option value="1" {{old('is_published', $post->is_published) == 1 ? 'selected' : ''}}>
                                            <i class="fas fa-check-circle text-success"></i> @lang('Enabled')
                                        </option>
                                        <option value="0" {{old('is_published', $post->is_published) == 0 ? 'selected' : ''}}>
                                            <i class="fas fa-times-circle text-danger"></i> @lang('Disabled')
                                        </option>
                                    </select>
                                    @error('is_published')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Publication Date -->
                                <div class="form-group mb-3">
                                    <label for="published_at" class="form-label fw-bold text-dark">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                            @lang('Publication Date')
                                    </label>
                                    <input type="datetime-local" id="published_at" 
                                           class="form-control @error('published_at') is-invalid @enderror" 
                                           name="published_at" 
                                           value="{{ old('published_at', $post->published_at ? $post->published_at : '') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Category & Author -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark mb-3">
                                    <i class="fas fa-tags text-primary me-2"></i>
                            @lang('Category and Author')
                                </h6>

                                <!-- Category -->
                                <div class="form-group mb-3">
                                    <label for="category" class="form-label fw-bold text-dark">
                                        <i class="fas fa-folder text-primary me-2"></i>
                            @lang('Category')
                                    </label>
                                    <select id="category" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">@lang('Select Category')</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div class="form-group mb-3">
                                    <label for="author" class="form-label fw-bold text-dark">
                                        <i class="fas fa-user text-primary me-2"></i>
                            @lang('Author')
                                    </label>
                                    <select id="author" class="form-select @error('author_id') is-invalid @enderror" name="author_id">
                                        <option value="">@lang('Select Author')</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                                                {{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark mb-3">
                                    <i class="fas fa-link text-primary me-2"></i>
                            @lang('Fixed Link (Slug)')
                                </h6>
                                <div class="form-group">
                                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" 
                                           name="slug" placeholder="@lang('Enter Fixed Link (Slug)')" 
                                           value="{{ old('slug', $post->slug) }}">
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                            @lang('It will be automatically generated from the title if left blank')
                                    </small>
                                    @error('slug')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-save me-2"></i>
                            @lang('Save Changes')
                                </button>
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-lg px-4 ms-2">
                                    <i class="fas fa-times me-2"></i>
                            @lang('Cancel')
                                </a>
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-clock me-1"></i>
                            @lang('Last Update')
                            {{ $post->updated_at->format('Y-m-d H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}

.form-control:focus, .form-select:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
}

.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
}

.text-primary {
    color: #4e73df !important;
}

.bg-primary {
    background-color: #4e73df !important;
}

.form-label {
    font-weight: 600;
    color: #5a5c69;
}

.card-header {
    border-bottom: none;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-text {
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 1rem;
    }
}
</style>
@endsection

        
             

