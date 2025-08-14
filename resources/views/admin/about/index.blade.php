@extends('admin.theme.default')

@section('title')
    معلومات عن الموقع
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Page Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        معلومات عن الموقع
                    </h1>
                    <p class="text-muted mt-2">إدارة معلومات الموقع والعرض</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>
                        إضافة معلومات
                    </a>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-gray-800">
                            <i class="fas fa-file-alt text-info me-2"></i>
                            تفاصيل المعلومات
                        </h5>
                        <div class="btn-group" role="group">
                            @if($about)
                                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit me-1"></i>
                                    تعديل
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash me-1"></i>
                                    حذف
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    @if ($about)
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Title Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-heading text-primary me-2"></i>
                                        <h6 class="text-gray-700 mb-0">العنوان الرئيسي</h6>
                                    </div>
                                    <div class="p-3 bg-light rounded border-start border-primary border-3">
                                        <h4 class="text-gray-800 mb-0">{{ $about->title }}</h4>
                                    </div>
                                </div>

                                <!-- Subtitle Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-tag text-success me-2"></i>
                                        <h6 class="text-gray-700 mb-0">العنوان الفرعي</h6>
                                    </div>
                                    <div class="p-3 bg-light rounded border-start border-success border-3">
                                        <h6 class="text-gray-600 mb-0">{{ $about->subtitle }}</h6>
                                    </div>
                                </div>

                                <!-- Description Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-align-left text-info me-2"></i>
                                        <h6 class="text-gray-700 mb-0">الوصف</h6>
                                    </div>
                                    <div class="p-3 bg-light rounded border-start border-info border-3">
                                        <p class="text-gray-700 mb-0 lh-base">{{ $about->description }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <!-- Info Card -->
                                <div class="card bg-gradient-primary text-white shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-info-circle fa-3x mb-3 opacity-75"></i>
                                        <h5 class="card-title">معلومات الموقع</h5>
                                        <p class="card-text opacity-75">تم تحديث المعلومات بنجاح</p>
                                        <div class="mt-3">
                                            <small class="opacity-75">
                                                <i class="fas fa-clock me-1"></i>
                                                آخر تحديث: {{ $about->updated_at ? $about->updated_at->format('Y-m-d H:i') : 'غير محدد' }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Actions -->
                                <div class="card mt-3 border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0 text-gray-700">
                                            <i class="fas fa-bolt me-2"></i>
                                            إجراءات سريعة
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            @if($about)
                                                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-edit me-1"></i>
                                                    تعديل المعلومات
                                                </a>
                                            @else
                                                <a href="{{ route('admin.abouts.create') }}" class="btn btn-outline-success btn-sm">
                                                    <i class="fas fa-plus me-1"></i>
                                                    إضافة معلومات جديدة
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-info-circle fa-4x text-muted opacity-50"></i>
                            </div>
                            <h4 class="text-gray-600 mb-3">لا توجد معلومات متاحة</h4>
                            <p class="text-muted mb-4">لم يتم إضافة أي معلومات عن الموقع بعد. قم بإضافة المعلومات الآن.</p>
                            <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                إضافة معلومات جديدة
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($about)
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-danger" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        تأكيد الحذف
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-gray-700">هل أنت متأكد من حذف معلومات الموقع؟ هذا الإجراء لا يمكن التراجع عنه.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>
                        إلغاء
                    </button>
                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            تأكيد الحذف
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('head')
<style>
    .border-start {
        border-left: 4px solid !important;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    
    .opacity-75 {
        opacity: 0.75;
    }
    
    .opacity-50 {
        opacity: 0.5;
    }
    
    .lh-base {
        line-height: 1.6;
    }
    
    .gap-2 {
        gap: 0.5rem;
    }
    
    .me-1 {
        margin-right: 0.25rem;
    }
    
    .me-2 {
        margin-right: 0.5rem;
    }
    
    .mb-0 {
        margin-bottom: 0;
    }
    
    .mt-2 {
        margin-top: 0.5rem;
    }
    
    .mt-3 {
        margin-top: 1rem;
    }
    
    .mb-2 {
        margin-bottom: 0.5rem;
    }
    
    .mb-3 {
        margin-bottom: 1rem;
    }
    
    .mb-4 {
        margin-bottom: 1.5rem;
    }
    
    .py-5 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
    
    .text-center {
        text-align: center;
    }
    
    .d-grid {
        display: grid;
    }
    
    .btn-group {
        display: inline-flex;
    }
    
    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
</style>
@endsection
