@extends('admin.theme.default')

@section('title')
    تعديل مؤلف
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-edit text-primary mr-2"></i>
            تعديل مؤلف
        </h1>
        <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-right mr-1"></i>
            العودة للمؤلفين
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-edit mr-2"></i>
                        تعديل معلومات المؤلف
                    </h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.authors.update', $author->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    المعلومات الأساسية
                                </h6>
                                
                                <div class="form-group">
                                    <label for="name" class="form-label font-weight-bold">
                                        <i class="fas fa-user mr-1"></i>
                                        اسم المؤلف
                                    </label>
                                    <input type="text" id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           name="name" 
                                           placeholder="أدخل اسم المؤلف الكامل"
                                           value="{{ old('name', $author->name) }}"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label font-weight-bold">
                                        <i class="fas fa-envelope mr-1"></i>
                                        البريد الإلكتروني
                                    </label>
                                    <input type="email" id="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           placeholder="example@email.com"
                                           value="{{ old('email', $author->email) }}"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone_no" class="form-label font-weight-bold">
                                        <i class="fas fa-phone mr-1"></i>
                                        رقم الهاتف
                                    </label>
                                    <input type="tel" id="phone_no" 
                                           class="form-control @error('phone_no') is-invalid @enderror" 
                                           name="phone_no" 
                                           placeholder="+966 50 123 4567"
                                           value="{{ old('phone_no', $author->phone_no) }}">
                                    @error('phone_no')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-link mr-2"></i>
                                    المعلومات الإضافية
                                </h6>

                                <div class="form-group">
                                    <label for="website" class="form-label font-weight-bold">
                                        <i class="fas fa-globe mr-1"></i>
                                        الموقع الإلكتروني
                                    </label>
                                    <input type="url" id="website" 
                                           class="form-control @error('website') is-invalid @enderror" 
                                           name="website" 
                                           placeholder="https://www.example.com"
                                           value="{{ old('website', $author->website) }}">
                                    @error('website')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="social_links" class="form-label font-weight-bold">
                                        <i class="fas fa-share-alt mr-1"></i>
                                        الروابط الاجتماعية
                                    </label>
                                    <input type="text" id="social_links" 
                                           class="form-control @error('social_links') is-invalid @enderror" 
                                           name="social_links" 
                                           placeholder="https://twitter.com/username, https://linkedin.com/in/username"
                                           value="{{ old('social_links', $author->social_links) }}">
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        يمكنك إدخال عدة روابط مفصولة بفواصل
                                    </small>
                                    @error('social_links')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile_picture" class="form-label font-weight-bold">
                                        <i class="fas fa-camera mr-1"></i>
                                        الصورة الشخصية
                                    </label>
                                    
                                    <!-- Current Image Display -->
                                    @if($author->profile_picture)
                                        <div class="current-image mb-3">
                                            <div class="text-center">
                                                <img src="{{ asset('profile_picture/' . $author->profile_picture) }}" 
                                                     class="img-fluid rounded shadow-sm" 
                                                     style="max-width: 150px; max-height: 150px; object-fit: cover; border: 2px solid #e3e6f0;">
                                                <div class="mt-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-image mr-1"></i>
                                                        الصورة الحالية
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="custom-file">
                                        <input type="file" id="profile_picture" 
                                               class="custom-file-input @error('profile_picture') is-invalid @enderror" 
                                               name="profile_picture"
                                               accept="image/*">
                                        <label class="custom-file-label" for="profile_picture">
                                            اختر صورة جديدة...
                                        </label>
                                    </div>
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        الحد الأقصى: 2MB، الصيغ المدعومة: JPG, PNG, GIF
                                    </small>
                                    
                                    <!-- Image Preview Container -->
                                    <div id="image-preview-container" class="mt-3" style="display: none;">
                                        <div class="text-center">
                                            <img id="image-preview" class="img-fluid rounded shadow-sm" 
                                                 style="max-width: 200px; max-height: 200px; object-fit: cover; border: 2px solid #e3e6f0;">
                                            <div class="mt-2">
                                                <button type="button" id="remove-image" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash mr-1"></i>
                                                    إزالة الصورة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('profile_picture')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Bio Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    النبذة الشخصية
                                </h6>
                                <div class="form-group">
                                    <label for="bio" class="form-label font-weight-bold">
                                        <i class="fas fa-quote-left mr-1"></i>
                                        نبذة عن المؤلف
                                    </label>
                                    <textarea id="bio" 
                                              class="form-control @error('bio') is-invalid @enderror" 
                                              name="bio" 
                                              rows="5"
                                              placeholder="اكتب نبذة مختصرة عن المؤلف وخبراته ومؤلفاته..."
                                              style="resize: vertical;">{{ old('bio', $author->bio) }}</textarea>
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        يمكنك كتابة نبذة مختصرة عن المؤلف (الحد الأقصى: 500 حرف)
                                    </small>
                                    @error('bio')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr class="my-4">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times mr-1"></i>
                                        إلغاء
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i>
                                        تحديث المؤلف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom JavaScript for file input -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // File input elements
    const fileInput = document.getElementById('profile_picture');
    const fileLabel = document.querySelector('.custom-file-label');
    const imagePreview = document.getElementById('image-preview');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const removeImageBtn = document.getElementById('remove-image');
    
    // File input change handler
    if (fileInput && fileLabel) {
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                // Update file label
                fileLabel.textContent = file.name;
                
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('يرجى اختيار ملف صورة صحيح');
                    this.value = '';
                    fileLabel.textContent = 'اختر صورة جديدة...';
                    hideImagePreview();
                    return;
                }
                
                // Validate file size (2MB = 2 * 1024 * 1024 bytes)
                if (file.size > 2 * 1024 * 1024) {
                    alert('حجم الملف كبير جداً. الحد الأقصى هو 2MB');
                    this.value = '';
                    fileLabel.textContent = 'اختر صورة جديدة...';
                    hideImagePreview();
                    return;
                }
                
                // Show image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                    
                    // Add smooth animation
                    imagePreviewContainer.style.opacity = '0';
                    setTimeout(() => {
                        imagePreviewContainer.style.opacity = '1';
                    }, 10);
                };
                reader.readAsDataURL(file);
                
            } else {
                fileLabel.textContent = 'اختر صورة جديدة...';
                hideImagePreview();
            }
        });
    }
    
    // Remove image button handler
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', function() {
            fileInput.value = '';
            fileLabel.textContent = 'اختر صورة جديدة...';
            hideImagePreview();
        });
    }
    
    // Function to hide image preview
    function hideImagePreview() {
        imagePreviewContainer.style.display = 'none';
        imagePreview.src = '';
    }
    
    // Form validation enhancement
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('يرجى ملء جميع الحقول المطلوبة');
            }
        });
    }
});
</script>

<style>
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
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

.custom-file-input {
    border-radius: 10px;
}

.btn {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #224abe 0%, #1a3a8f 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.btn-secondary {
    background: linear-gradient(135deg, #858796 0%, #6c757d 100%);
    border: none;
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.text-primary {
    color: #4e73df !important;
}

.invalid-feedback {
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-text {
    font-size: 0.875rem;
}

hr {
    border-top: 2px solid #e3e6f0;
    opacity: 0.5;
}

.current-image {
    background: #f8f9fc;
    border-radius: 10px;
    padding: 15px;
    border: 2px dashed #d1d3e2;
}

.current-image img {
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.current-image img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

@media (max-width: 768px) {
    .col-md-6 {
        margin-bottom: 1rem;
    }
}

/* Image Preview Styles */
#image-preview-container {
    transition: all 0.3s ease;
    background: #f8f9fc;
    border-radius: 10px;
    padding: 15px;
    border: 2px dashed #d1d3e2;
}

#image-preview {
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

#image-preview:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

#remove-image {
    transition: all 0.3s ease;
}

#remove-image:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Loading animation for image preview */
.image-loading {
    position: relative;
}

.image-loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #f3f3f3;
    border-top: 2px solid #4e73df;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Alert styling */
.alert {
    border-radius: 10px;
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.alert-success {
    background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
    color: white;
}

.alert .close {
    color: white;
    opacity: 0.8;
}

.alert .close:hover {
    opacity: 1;
}
</style>
@endsection
