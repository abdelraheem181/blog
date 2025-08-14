@extends('admin.theme.default')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle text-primary me-2"></i>
        @lang('Add New Post')
        </h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-right me-1"></i>
            @lang('Return to Posts')
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Form Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-edit me-2"></i>
                @lang('Post Details')
            </h5>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" id="postForm">
                @csrf
                
                <!-- Title Section -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title" class="form-label fw-bold text-dark">
                                <i class="fas fa-heading me-1 text-primary"></i>
                                @lang('Post Title')
                            </label>
                            <input type="text" 
                                   id="ar_title" 
                                   class="form-control form-control-lg @error('ar_title') is-invalid @enderror" 
                                   name="ar_title" 
                                   placeholder="@lang('Enter Post Title in Arabic')" 
                                   value="{{ old('ar_title') }}"
                                   required>
                                   @error('ar_title')
                                   <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                   </div>
                                  @enderror
                                   <input type="text" 
                                   id="en_title" 
                                   class="form-control form-control-lg @error('en_title') is-invalid @enderror" 
                                   name="en_title" 
                                   placeholder="@lang('Enter Post Title in English')" 
                                   value="{{ old('en_title') }}"
                                   required>
                            @error('en_title')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="slug" class="form-label fw-bold text-dark">
                                <i class="fas fa-link me-1 text-primary"></i>
                                @lang('Fixed Link (Slug)')
                            </label>
                            <input type="text" 
                                   id="slug" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   name="slug" 
                                   placeholder="@lang('Enter Fixed Link (Slug)')" 
                                   value="{{ old('slug') }}">
                            @error('slug')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="form-group mb-4">
                    <label for="editor" class="form-label fw-bold text-dark">
                        <i class="fas fa-file-alt me-1 text-primary"></i>
                        @lang('Post Content')
                    </label>
                    <div class="border rounded">
                        <textarea id="editor" 
                                  class="form-control @error('ar_content') is-invalid @enderror" 
                                  name="ar_content" 
                                  rows="8"
                                  placeholder="@lang('Enter Post Content in Arabic')">{{ old('ar_content') }}</textarea>
                                  <textarea id="editor" 
                                  class="form-control @error('en_content') is-invalid @enderror" 
                                  name="en_content" 
                                  rows="8"
                                  placeholder="@lang('Enter Post Content in English')">{{ old('en_content') }}</textarea>
                    </div>
                    @error('ar_content')
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    @error('en_content')
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Meta Information Row -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category" class="form-label fw-bold text-dark">
                                <i class="fas fa-tags me-1 text-primary"></i>
                                @lang('Category')
                            </label>
                            <select id="category" class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="">@lang('Select Category')</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="author" class="form-label fw-bold text-dark">
                                <i class="fas fa-user me-1 text-primary"></i>
                                @lang('Author')
                            </label>
                            <select id="author" class="form-select @error('author_id') is-invalid @enderror" name="author_id" required>
                                <option value="">@lang('Select Author')</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="published_at" class="form-label fw-bold text-dark">
                                <i class="fas fa-calendar me-1 text-primary"></i>
                                @lang('Publication Date')
                            </label>
                            <input type="datetime-local" 
                                   id="published_at" 
                                   class="form-control @error('published_at') is-invalid @enderror" 
                                   name="published_at" 
                                   value="{{ old('published_at') }}">
                            @error('published_at')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="is_published" class="form-label fw-bold text-dark">
                                <i class="fas fa-toggle-on me-1 text-primary"></i>
                                @lang('Publication Status')
                            </label>
                            <select id="is_published" class="form-select @error('is_published') is-invalid @enderror" name="is_published" required>
                                <option value="">@lang('Select Status')</option>
                                <option value="1" {{ old('is_published') == 1 ? 'selected' : '' }}>
                                    <i class="fas fa-check text-success"></i> @lang('Published')
                                </option>
                                <option value="0" {{ old('is_published') == 0 ? 'selected' : '' }}>
                                    <i class="fas fa-clock text-warning"></i> @lang('Draft')
                                </option>
                            </select>
                            @error('is_published')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Image Upload Section -->
                <div class="form-group mb-4">
                    <label for="image_cover" class="form-label fw-bold text-dark">
                        <i class="fas fa-image me-1 text-primary"></i>
                        @lang('Cover Image')
                    </label>
                    <div class="upload-area border-2 border-dashed border-primary rounded p-4 text-center" 
                         id="uploadArea"
                         style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <div class="upload-content">
                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                    <h5 class="text-dark mb-2">@lang('Drag and drop the image here or click to select')</h5>
                            <p class="text-muted mb-3">@lang('Supported formats: JPG, PNG, GIF (Maximum: 5MB)')</p>
                            <input type="file" 
                                   id="image_cover" 
                                   accept="image/*" 
                                   name="image_cover" 
                                   class="d-none"
                                   onchange="handleImageUpload(this)">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('image_cover').click()">
                                <i class="fas fa-upload me-2"></i>
                                @lang('Select Image')
                            </button>
                        </div>
                    </div>
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-3 d-none">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img id="cover-image-thumb" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-1" id="imageName">@lang('Image Name')</h6>
                                        <small class="text-muted" id="imageSize">@lang('Image Size')</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <div>
                        <button type="button" class="btn btn-outline-secondary me-2" onclick="saveAsDraft()">
                            <i class="fas fa-save me-1"></i>
                            @lang('Save as Draft')
                        </button>
                        <button type="button" class="btn btn-outline-info" onclick="previewPost()">
                            <i class="fas fa-eye me-1"></i>
                            @lang('Preview')
                        </button>
                    </div>
                    <div>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-light me-2">
                            <i class="fas fa-times me-1"></i>
                            @lang('Cancel')
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>
                            @lang('Publish Post')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-eye me-2"></i>
                    @lang('Post Preview')
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="previewContent"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slug = title
            .toLowerCase()
            .replace(/[^\u0600-\u06FF\w\s-]/g, '') // Remove special characters except Arabic and basic Latin
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-') // Replace multiple hyphens with single hyphen
            .trim('-'); // Remove leading/trailing hyphens
        
        document.getElementById('slug').value = slug;
    });

    // Enhanced image upload handling
    function handleImageUpload(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('@lang('Image size must be less than 5MB')');
                return;
            }
            
            reader.onload = function(e) {
                document.querySelector('#cover-image-thumb').setAttribute('src', e.target.result);
                document.getElementById('imageName').textContent = file.name;
                document.getElementById('imageSize').textContent = formatFileSize(file.size);
                document.getElementById('imagePreview').classList.remove('d-none');
                document.getElementById('uploadArea').style.display = 'none';
            };
            
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        document.getElementById('image_cover').value = '';
        document.getElementById('imagePreview').classList.add('d-none');
        document.getElementById('uploadArea').style.display = 'block';
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Save as draft functionality
    function saveAsDraft() {
        document.getElementById('is_published').value = '0';
        document.getElementById('postForm').submit();
    }

    // Preview functionality
    function previewPost() {
        const title = document.getElementById('title').value;
        const content = document.getElementById('editor').value;
        
        if (!title || !content) {
            alert('@lang('Please fill in the title and content first')');
            return;
        }
        
        const previewContent = `
            <div class="preview-post">
                <h1 class="mb-4">${title}</h1>
                <div class="content">${content}</div>
            </div>
        `;
        
        document.getElementById('previewContent').innerHTML = previewContent;
        new bootstrap.Modal(document.getElementById('previewModal')).show();
    }

    // Enhanced CKEditor configuration
    ClassicEditor
        .create(document.querySelector('#editor'), {
            language: {
                ui: 'ar',
                content: 'ar'
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    '|',
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'link',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    '|',
                    'undo',
                    'redo'
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'فقرة', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'عنوان 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'عنوان 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'عنوان 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'عنوان 4', class: 'ck-heading_heading4' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });

    // Form validation enhancement
    document.getElementById('postForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        const content = document.getElementById('editor').value.trim();
        
        if (!title) {
            e.preventDefault();
            alert('@lang('Please enter the post title')');
            document.getElementById('title').focus();
            return false;
        }
        
        if (!content) {
            e.preventDefault();
            alert('@lang('Please enter the post content')');
            return false;
        }
    });
</script>

<style>
.upload-area {
    transition: all 0.3s ease;
    cursor: pointer;
}

.upload-area:hover {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%) !important;
    border-color: #2196f3 !important;
}

.upload-area.dragover {
    background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%) !important;
    border-color: #4caf50 !important;
}

.form-control:focus,
.form-select:focus {
    border-color: #2196f3;
    box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(33, 150, 243, 0.3);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.preview-post {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.preview-post h1 {
    color: #333;
    border-bottom: 2px solid #2196f3;
    padding-bottom: 10px;
}

.preview-post .content {
    line-height: 1.8;
    color: #555;
}

/* RTL Support */
.form-label {
    text-align: right;
}

.input-group-text {
    border-radius: 0 0.375rem 0.375rem 0;
}

.form-control {
    border-radius: 0.375rem 0 0 0.375rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-lg {
        width: 100%;
    }
}
</style>
@endsection
