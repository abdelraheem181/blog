@extends('admin.theme.default')

@section('title')
    عرض المنشور
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-eye text-primary me-2"></i>
            عرض المنشور
        </h1>
        <div>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit me-1"></i>
                تعديل المنشور
            </a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-right me-1"></i>
                العودة إلى القائمة
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Main Content Card -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-file-alt me-2"></i>
                        تفاصيل المنشور
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Post Title -->
                    <div class="mb-4">
                        <h4 class="text-gray-800 mb-2">
                            <i class="fas fa-heading text-primary me-2"></i>
                            عنوان المنشور
                        </h4>
                        <div class="p-3 bg-light rounded border">
                            <h5 class="mb-0 text-dark">{{ $post->title }}</h5>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="mb-4">
                        <h5 class="text-gray-800 mb-3">
                            <i class="fas fa-align-left text-primary me-2"></i>
                            محتوى المنشور
                        </h5>
                        <div class="p-3 bg-light rounded border" style="min-height: 150px;">
                            <p class="mb-0 text-dark" style="line-height: 1.8; white-space: pre-wrap;">{!! ( $post->content)!!}</p>
                        </div>
                    </div>

                    <!-- Post Image -->
                    <div class="mb-4">
                        <h5 class="text-gray-800 mb-3">
                            <i class="fas fa-image text-primary me-2"></i>
                            صورة المنشور
                        </h5>
                        @if($post->image_cover)
                            <div class="text-center">
                                <img src="{{ asset($post->image_cover) }}" 
                                     alt="صورة المنشور" 
                                     class="img-fluid rounded shadow-sm" 
                                     style="max-height: 400px; object-fit: cover;">
                            </div>
                        @else
                            <div class="text-center p-4 bg-light rounded border">
                                <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2 mb-0">لا توجد صورة للمنشور</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Information -->
        <div class="col-lg-4">
            <!-- Post Meta Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-info text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-info-circle me-2"></i>
                        معلومات المنشور
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Publication Date -->
                    <div class="mb-3">
                        <label class="form-label text-gray-700">
                            <i class="fas fa-calendar-alt text-info me-2"></i>
                            تاريخ النشر
                        </label>
                        <div class="p-2 bg-light rounded border">
                            <span class="text-dark">
                                {{ $post->published_at ? $post->published_at : 'لم يتم النشر بعد' }}
                            </span>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label text-gray-700">
                            <i class="fas fa-tag text-info me-2"></i>
                            الفئة
                        </label>
                        <div class="p-2 bg-light rounded border">
                            <span class="badge bg-primary">{{ $post->category->name ?? 'غير محدد' }}</span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label text-gray-700">
                            <i class="fas fa-toggle-on text-info me-2"></i>
                            حالة المنشور
                        </label>
                        <div class="p-2 bg-light rounded border">
                            @if($post->published_at && $post->published_at <= now())
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>
                                    منشور
                                </span>
                            @else
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>
                                    في الانتظار
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Created Date -->
                    <div class="mb-3">
                        <label class="form-label text-gray-700">
                            <i class="fas fa-plus-circle text-info me-2"></i>
                            تاريخ الإنشاء
                        </label>
                        <div class="p-2 bg-light rounded border">
                            <span class="text-dark">{{ $post->created_at->format('Y-m-d H:i') }}</span>
                        </div>
                    </div>

                    <!-- Last Updated -->
                    <div class="mb-3">
                        <label class="form-label text-gray-700">
                            <i class="fas fa-edit text-info me-2"></i>
                            آخر تحديث
                        </label>
                        <div class="p-2 bg-light rounded border">
                            <span class="text-dark">{{ $post->updated_at->format('Y-m-d H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow">
                <div class="card-header py-3 bg-success text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-bolt me-2"></i>
                        إجراءات سريعة
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>
                            تعديل المنشور
                        </a>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list me-2"></i>
                            العودة إلى القائمة
                        </a>
                        <button type="button" class="btn btn-info" onclick="window.print()">
                            <i class="fas fa-print me-2"></i>
                            طباعة
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .btn, .card-header {
        display: none !important;
    }
    .card {
        border: none !important;
        box-shadow: none !important;
    }
}

.text-gray-800 {
    color: #5a5c69 !important;
}

.text-gray-700 {
    color: #6e707e !important;
}

.me-1 { margin-right: 0.25rem !important; }
.me-2 { margin-right: 0.5rem !important; }
.ms-1 { margin-left: 0.25rem !important; }
.ms-2 { margin-left: 0.5rem !important; }

.d-grid { display: grid !important; }
.gap-2 { gap: 0.5rem !important; }
</style>
@endsection