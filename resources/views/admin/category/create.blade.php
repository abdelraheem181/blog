@extends('admin.theme.default')

@section('title', 'Add New Category')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-folder-plus text-primary me-2"></i>
                @lang('Add New Category')
            </h1>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-right me-1"></i>
                @lang('Return to the list')
            </a>
        </div>

        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    @lang('Category Information')
                </h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.categories.store') }}" id="categoryForm">
                    @csrf
                    
                    <!-- Category Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">
                            <i class="fas fa-tag text-primary me-1"></i>
                           @lang('Category Name')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg @error('ar_name') is-invalid @enderror" 
                               id="ar_name" 
                               name="ar_name" 
                               value="{{ old('ar_name') }}"
                               placeholder="@lang('Enter Category Name in Arabic')"
                               required>
                        <input type="text" 
                               class="form-control form-control-lg @error('en_name') is-invalid @enderror" 
                               id="en_name" 
                               name="en_name" 
                               value="{{ old('en_name') }}"
                               placeholder="@lang('Enter Category Name in English')"
                               required>
                               
                        @error('ar_name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        @error('en_name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-lightbulb text-warning me-1"></i>
                            @lang('Choose a clear and descriptive name for the category')
                        </div>
                    </div>

                    <!-- Category Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">
                            <i class="fas fa-align-left text-primary me-1"></i>
                            @lang('Category Description')
                            <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('ar_description') is-invalid @enderror" 
                                  id="ar_description" 
                                  name="ar_description" 
                                  rows="4" 
                                  placeholder="@lang('Enter a short description for the category in Arabic')"
                                  required>{{ old('ar_description') }}</textarea>
                        <textarea class="form-control @error('en_description') is-invalid @enderror" 
                                  id="en_description" 
                                  name="en_description" 
                                  rows="4" 
                                  placeholder="@lang('Enter a short description for the category in English')"
                                  required>{{ old('en_description') }}</textarea>
                        @error('ar_description')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        @error('en_description')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle text-info me-1"></i>
                            @lang('Write a short description that explains the content of this category')
                        </div>
                    </div>

                    <!-- Category Slug -->
                    <div class="mb-4">
                        <label for="slug" class="form-label fw-bold">
                            <i class="fas fa-link text-primary me-1"></i>
                            @lang('Fixed Link (Slug)')
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-globe text-muted"></i>
                            </span>
                            <input type="text" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" 
                                   name="slug" 
                                   value="{{ old('slug') }}"
                                   placeholder="@lang('slug Name in English')"
                                   required>
                        </div>
                        @error('slug')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-magic text-success me-1"></i>
                            @lang('It will be automatically generated from the category name, or you can edit it manually')
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
                            <i class="fas fa-times me-1"></i>
                                @lang('Cancel')
                        </button>
                        <div>
                            <button type="reset" class="btn btn-outline-warning me-2">
                                <i class="fas fa-undo me-1"></i>
                                @lang('Reset')
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i>
                                @lang('Save Category')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Card -->
        <div class="card mt-4 border-left-info shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-info">
                    <i class="fas fa-question-circle me-2"></i>
                    @lang('Tips for creating a good category')
                </h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        @lang('Choose a clear and descriptive name')
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        @lang('Write a short and useful description')
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        @lang('Use the fixed link in English')
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    border-bottom: none;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e3e6f0;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.form-control-lg {
    font-size: 1.1rem;
}

.btn {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
}

.border-left-info {
    border-left: 4px solid #36b9cc !important;
}

.invalid-feedback {
    font-weight: 500;
}

.form-text {
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.input-group-text {
    border-radius: 10px 0 0 10px;
    border: 2px solid #e3e6f0;
    border-right: none;
}

.input-group .form-control {
    border-radius: 0 10px 10px 0;
    border-left: none;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        if (slugInput.value === '' || slugInput.value === '{{ old("slug") }}') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-') // Replace spaces with hyphens
                .replace(/-+/g, '-') // Replace multiple hyphens with single
                .trim();
            slugInput.value = slug;
        }
    });
    
    // Form validation
    const form = document.getElementById('categoryForm');
    form.addEventListener('submit', function(e) {
        const name = nameInput.value.trim();
        const description = document.getElementById('description').value.trim();
        const slug = slugInput.value.trim();
        
        if (!name || !description || !slug) {
            e.preventDefault();
            alert('يرجى ملء جميع الحقول المطلوبة');
            return false;
        }
    });
});
</script>
@endsection