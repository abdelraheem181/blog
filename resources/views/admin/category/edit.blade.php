@extends('admin.theme.default')

@section('title')
    @lang('Edit Category')
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Enhanced Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-gradient-primary-to-secondary text-white shadow-lg rounded-pill px-4 py-2">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-home me-2"></i>
                        <span>@lang('Home')</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.categories.index') }}" class="text-white text-decoration-none d-flex align-items-center">
                        <i class="fas fa-tags me-2"></i>
                        <span>@lang('Categories')</span>
                    </a>
                </li>
                <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                    <i class="fas fa-edit me-2"></i>
                    <span>@lang('Edit Category')</span>
                </li>
            </ol>
        </nav>

        <!-- Enhanced Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <div class="d-flex align-items-center">
                <div class="header-icon-wrapper me-4">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1 text-gray-900 fw-bold">
                        @lang('Edit Category'): <span class="text-primary">{{ $category->name }}</span>
                    </h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        @lang('Update category information and manage its content')
                    </p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-arrow-right me-2"></i>
                    @lang('Return to Categories')
                </a>
                <button type="button" class="btn btn-success btn-lg" onclick="document.querySelector('form').submit()">
                    <i class="fas fa-save me-2"></i>
                    @lang('Save Changes')
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <!-- Enhanced Form Card -->
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-gradient-primary text-white py-4">
                        <div class="d-flex align-items-center">
                            <div class="header-icon me-3">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 fw-bold">@lang('Category Information')</h4>
                                <p class="mb-0 opacity-75">@lang('Update basic category data')</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            
                            <!-- Category Name -->
                            <div class="form-group mb-4">
                                <label for="ar_name" class="form-label fw-bold text-gray-700 mb-3">
                                    <i class="fas fa-tag text-primary me-2"></i>
                                    @lang('Category Name')
                                    <span class="text-danger ms-1">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-tag text-muted"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0 @error('ar_name') is-invalid @enderror" 
                                           id="ar_name" 
                                           name="ar_name" 
                                           value="{{ old('ar_name', $category->name) }}" 
                                           placeholder="@lang('Enter Category Name in Arabic')"
                                           required>
                                           <input type="text" 
                                           class="form-control border-start-0 @error('en_name') is-invalid @enderror" 
                                           id="en_name" 
                                           name="en_name" 
                                           value="{{ old('en_name', $category->name) }}" 
                                           placeholder="@lang('Enter Category Name in English')"
                                           required>
                                </div>
                                @error('ar_name')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text mt-2">
                                    <i class="fas fa-lightbulb me-1 text-warning"></i>
                                            @lang('Category name as it will be displayed to users on the website')
                                </div>
                            </div>

                            <!-- Category Description -->
                            <div class="form-group mb-4">
                                <label for="description" class="form-label fw-bold text-gray-700 mb-3">
                                    <i class="fas fa-align-left text-primary me-2"></i>
                                    @lang('Category Description')
                                    <span class="text-danger ms-1">*</span>
                                </label>
                                <div class="position-relative">
                                    <textarea class="form-control form-control-lg @error('ar_description') is-invalid @enderror" 
                                              id="ar_description" 
                                              name="ar_description" 
                                              rows="4" 
                                              placeholder="@lang('Enter a short description of the category that explains its content and topics in Arabic')"
                                              required>{{ old('ar_description', $category->description) }}</textarea>
                                              <textarea class="form-control form-control-lg @error('en_description') is-invalid @enderror" 
                                              id="en_description" 
                                              name="en_description" 
                                              rows="4" 
                                              placeholder="@lang('Enter a short description of the category that explains its content and topics')"
                                              required>{{ old('en_description', $category->description) }}</textarea>
                                    <div class="position-absolute top-0 end-0 p-3">
                                   
                                    </div>
                                </div>
                                @error('ar_description')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text mt-2">
                                    <i class="fas fa-info-circle me-1 text-info"></i>
                                    @lang('A short description of the category that explains its content and helps with SEO')
                                </div>
                            </div>

                            <!-- Category Slug -->
                            <div class="form-group mb-4">
                                <label for="slug" class="form-label fw-bold text-gray-700 mb-3">
                                    <i class="fas fa-link text-primary me-2"></i>
                                    @lang('Fixed Link (Slug)')
                                    <span class="text-danger ms-1">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-globe text-muted"></i>
                                    </span>
                                    <span class="input-group-text bg-light border-start-0 border-end-0 text-muted">
                                        /category/
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0 @error('slug') is-invalid @enderror" 
                                           id="slug" 
                                           name="slug" 
                                           value="{{ old('slug', $category->slug) }}" 
                                           placeholder="@lang('Category Name')"
                                           required>
                                    <button class="btn btn-outline-secondary border-start-0" type="button" id="generateSlug">
                                        <i class="fas fa-magic"></i>
                                    </button>
                                </div>
                                @error('slug')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text mt-2">
                                    <i class="fas fa-link me-1 text-success"></i>
                                    @lang('The link that will be displayed in the browser (must be unique and readable)')
                                </div>
                            </div>

                            <!-- Enhanced Action Buttons -->
                            <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                                <button type="button" class="btn btn-outline-secondary btn-lg" onclick="history.back()">
                                    <i class="fas fa-times me-2"></i>
                                    @lang('Cancel')
                                </button>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-info btn-lg" id="previewBtn">
                                        <i class="fas fa-eye me-2"></i>
                                        @lang('Preview')
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>
                                        @lang('Save Changes')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Enhanced Info Card -->
                <div class="card shadow-lg border-0 rounded-3 mt-4 overflow-hidden">
                    <div class="card-header bg-gradient-info text-white py-3">
                        <div class="d-flex align-items-center">
                            <div class="header-icon me-3">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h5 class="mb-0 fw-bold">@lang('Additional Information')</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-calendar-plus text-success"></i>
                                    </div>
                                    <div class="info-content">
                                        <h6 class="mb-1 fw-bold text-gray-700">@lang('Creation Date')</h6>
                                        <p class="mb-0 text-muted">{{ $category->created_at->format('Y-m-d H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-calendar-check text-primary"></i>
                                    </div>
                                    <div class="info-content">
                                        <h6 class="mb-1 fw-bold text-gray-700">@lang('Last Update')</h6>
                                        <p class="mb-0 text-muted">{{ $category->updated_at->format('Y-m-d H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Enhanced Styles */
        .bg-gradient-primary-to-secondary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, #36b9cc 0%, #1a8997 100%);
        }
        
        .header-icon-wrapper {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        
        .header-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .input-group-text {
            border-color: #e3e6f0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border: none;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #224abe 0%, #1a3a8f 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
            border: none;
            box-shadow: 0 4px 15px rgba(28, 200, 138, 0.3);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #13855c 0%, #0f6848 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(28, 200, 138, 0.4);
        }
        
        .card {
            transition: all 0.3s ease;
            border: none;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
        }
        
        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8) !important;
            transition: all 0.3s ease;
        }
        
        .breadcrumb-item a:hover {
            color: white !important;
            transform: translateX(-2px);
        }
        
        .info-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #f8f9fc;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            background: #eaecf4;
            transform: translateX(5px);
        }
        
        .info-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-label {
            font-size: 1.1rem;
        }
        
        .rounded-3 {
            border-radius: 1rem !important;
        }
        
        .rounded-pill {
            border-radius: 50rem !important;
        }
        
        /* Animation for form elements */
        .form-group {
            animation: fadeInUp 0.6s ease-out;
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
        
        /* Enhanced focus states */
        .form-control:focus,
        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        /* Loading state for buttons */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }
        
        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <script>
        // Enhanced Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });

        // Manual slug generation button
        document.getElementById('generateSlug').addEventListener('click', function() {
            const name = document.getElementById('name').value;
            if (name) {
                const slug = name
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                document.getElementById('slug').value = slug;
                
                // Add animation feedback
                this.innerHTML = '<i class="fas fa-check"></i>';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-magic"></i>';
                }, 1000);
            }
        });

        // Character counter for description
        document.getElementById('description').addEventListener('input', function() {
            const charCount = this.value.length;
            document.getElementById('charCount').textContent = charCount;
            
            if (charCount > 450) {
                document.getElementById('charCount').style.color = '#dc3545';
            } else if (charCount > 400) {
                document.getElementById('charCount').style.color = '#ffc107';
            } else {
                document.getElementById('charCount').style.color = '#6c757d';
            }
        });

        // Enhanced form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            
                            // Add loading state to submit button
                            const submitBtn = form.querySelector('button[type="submit"]');
                            submitBtn.classList.add('btn-loading');
                            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>جاري الحفظ...';
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Preview functionality
        document.getElementById('previewBtn').addEventListener('click', function() {
            const name = document.getElementById('name').value;
            const description = document.getElementById('description').value;
            const slug = document.getElementById('slug').value;
            
            if (name && description && slug) {
                // Create preview modal
                const previewModal = document.createElement('div');
                previewModal.className = 'modal fade';
                previewModal.innerHTML = `
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">
                                    <i class="fas fa-eye me-2"></i>
                                    معاينة القسم
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">${name}</h4>
                                        <p class="card-text">${description}</p>
                                        <small class="text-muted">
                                            <i class="fas fa-link me-1"></i>
                                            الرابط: /category/${slug}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(previewModal);
                const modal = new bootstrap.Modal(previewModal);
                modal.show();
                
                // Remove modal from DOM after hiding
                previewModal.addEventListener('hidden.bs.modal', function() {
                    document.body.removeChild(previewModal);
                });
            } else {
                alert('يرجى ملء جميع الحقول المطلوبة للمعاينة');
            }
        });

        // Initialize character counter on page load
        document.addEventListener('DOMContentLoaded', function() {
            const description = document.getElementById('description');
            const charCount = description.value.length;
            document.getElementById('charCount').textContent = charCount;
        });
    </script>
@endsection
