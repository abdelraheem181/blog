@extends('admin.theme.default')

@section('title')
    <i class="fas fa-info-circle me-2"></i>اضافة معلومات عن الموقع
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-plus-circle me-3 fs-4"></i>
                        <h5 class="card-title mb-0">اضافة معلومات جديدة عن الموقع</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.abouts.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Title Field -->
                        <div class="form-group mb-4">
                            <label for="title" class="form-label fw-bold text-dark">
                                <i class="fas fa-heading me-2 text-primary"></i>العنوان الرئيسي
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="أدخل العنوان الرئيسي للموقع"
                                   value="{{ old('title') }}"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>العنوان الذي سيظهر في صفحة "حول الموقع"
                            </div>
                        </div>

                        <!-- Subtitle Field -->
                        <div class="form-group mb-4">
                            <label for="subtitle" class="form-label fw-bold text-dark">
                                <i class="fas fa-tag me-2 text-success"></i>العنوان الفرعي
                            </label>
                            <input type="text" 
                                   name="subtitle" 
                                   id="subtitle" 
                                   class="form-control @error('subtitle') is-invalid @enderror" 
                                   placeholder="أدخل العنوان الفرعي أو الشعار"
                                   value="{{ old('subtitle') }}"
                                   required>
                            @error('subtitle')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>نص إضافي أو شعار للموقع
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group mb-4">
                            <label for="description" class="form-label fw-bold text-dark">
                                <i class="fas fa-align-left me-2 text-info"></i>الوصف التفصيلي
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="6" 
                                      placeholder="اكتب وصفاً تفصيلياً عن الموقع وأهدافه..."
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>وصف شامل عن الموقع وخدماته
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-right me-2"></i>العودة للقائمة
                            </a>
                            <div>
                                <button type="reset" class="btn btn-outline-warning me-2">
                                    <i class="fas fa-undo me-2"></i>إعادة تعيين
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>حفظ المعلومات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Card -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-eye me-2"></i>معاينة سريعة
                </div>
                <div class="card-body">
                    <div class="preview-content">
                        <h4 id="preview-title" class="text-primary">العنوان الرئيسي</h4>
                        <h6 id="preview-subtitle" class="text-muted mb-3">العنوان الفرعي</h6>
                        <p id="preview-description" class="text-dark">الوصف التفصيلي سيظهر هنا...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
<style>
    .card {
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .form-control {
        border-radius: 10px;
        border: 2px solid #e9ecef;
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
    
    .btn:hover {
        transform: translateY(-1px);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    
    .preview-content {
        min-height: 120px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 10px;
    }
    
    .form-label {
        color: #495057;
        margin-bottom: 8px;
    }
    
    .form-text {
        font-size: 0.875rem;
        color: #6c757d;
    }
    
    .invalid-feedback {
        font-weight: 500;
    }
    
    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview functionality
    const titleInput = document.getElementById('title');
    const subtitleInput = document.getElementById('subtitle');
    const descriptionInput = document.getElementById('description');
    
    const previewTitle = document.getElementById('preview-title');
    const previewSubtitle = document.getElementById('preview-subtitle');
    const previewDescription = document.getElementById('preview-description');
    
    function updatePreview() {
        previewTitle.textContent = titleInput.value || 'العنوان الرئيسي';
        previewSubtitle.textContent = subtitleInput.value || 'العنوان الفرعي';
        previewDescription.textContent = descriptionInput.value || 'الوصف التفصيلي سيظهر هنا...';
    }
    
    titleInput.addEventListener('input', updatePreview);
    subtitleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
    
    // Form validation
    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection
