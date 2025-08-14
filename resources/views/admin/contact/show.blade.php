@extends('admin.theme.default')
@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-envelope-open-text text-primary me-2"></i>
                    عرض رسالة الاتصال
                </h1>
                <p class="text-muted mt-2">تفاصيل الرسالة المرسلة من {{ $contact->name }}</p>
            </div>
            <div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-right me-1"></i>
                    العودة إلى قائمة الرسائل
                </a>
            </div>
        </div>

        <!-- Contact Details Card -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-circle me-2"></i>
                    معلومات المرسل
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">الاسم</small>
                                <strong>{{ $contact->name }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">البريد الإلكتروني</small>
                                <strong>
                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                        {{ $contact->email }}
                                    </a>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">رقم الهاتف</small>
                                <strong>
                                    <a href="tel:{{ $contact->phone_no }}" class="text-decoration-none">
                                        {{ $contact->phone_no }}
                                    </a>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">تاريخ الإرسال</small>
                                <strong>{{ $contact->created_at->format('Y-m-d H:i') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Content Card -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-comment-alt me-2"></i>
                    محتوى الرسالة
                </h5>
            </div>
            <div class="card-body">
                <div class="bg-light p-4 rounded">
                    <p class="mb-0" style="line-height: 1.8; font-size: 1.1rem;">
                        {{ $contact->message }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-right me-2"></i>
                    العودة إلى قائمة الرسائل
                </a>
            </div>
            <div>
                <a href="mailto:{{ $contact->email }}?subject=رد على رسالتك" class="btn btn-primary me-2">
                    <i class="fas fa-reply me-2"></i>
                    الرد على الرسالة
                </a>
                <a href="tel:{{ $contact->phone_no }}" class="btn btn-success">
                    <i class="fas fa-phone me-2"></i>
                    الاتصال
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}

.bg-light.rounded-circle {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-header {
    border-bottom: none;
    font-weight: 600;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.text-primary {
    color: #4e73df !important;
}

.bg-primary {
    background-color: #4e73df !important;
}

.bg-info {
    background-color: #36b9cc !important;
}
</style>

@endsection