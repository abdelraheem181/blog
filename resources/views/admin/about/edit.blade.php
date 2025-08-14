@extends('admin.theme.default')
@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <div class="d-flex align-items-center">
                    <i class="fas fa-edit me-3"></i>
                    <h4 class="mb-0">تعديل معلومات عن الموقع</h4>
                </div>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label fw-bold text-dark">
                                    <i class="fas fa-heading me-2 text-primary"></i>العنوان الرئيسي
                                </label>
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $about->title) }}" 
                                       placeholder="أدخل العنوان الرئيسي"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="subtitle" class="form-label fw-bold text-dark">
                                    <i class="fas fa-tag me-2 text-primary"></i>العنوان الفرعي
                                </label>
                                <input type="text" 
                                       name="subtitle" 
                                       id="subtitle" 
                                       class="form-control form-control-lg @error('subtitle') is-invalid @enderror" 
                                       value="{{ old('subtitle', $about->subtitle) }}" 
                                       placeholder="أدخل العنوان الفرعي"
                                       required>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="description" class="form-label fw-bold text-dark">
                            <i class="fas fa-align-right me-2 text-primary"></i>الوصف
                        </label>
                        <textarea name="description" 
                                  id="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="8" 
                                  placeholder="أدخل وصف مفصل عن الموقع..."
                                  required>{{ old('description', $about->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            يمكنك كتابة وصف شامل عن موقعك وخدماتك
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-right me-2"></i>العودة للقائمة
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-warning me-2">
                                <i class="fas fa-undo me-2"></i>إعادة تعيين
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>تحديث المعلومات
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e3e6f0;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.form-control-lg {
    font-size: 1.1rem;
}

.btn {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.form-label {
    color: #5a5c69;
    margin-bottom: 0.5rem;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.invalid-feedback {
    font-size: 0.875rem;
}

.form-text {
    color: #858796;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>

@endsection