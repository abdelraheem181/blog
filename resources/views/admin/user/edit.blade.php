@extends('admin.theme.default')

@section('title')
تعديل معلومات المستخدم
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-user-edit text-primary mr-2"></i>
                تعديل معلومات المستخدم
            </h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-right ml-1"></i>
                العودة إلى قائمة المستخدمين
            </a>
        </div>

        <!-- Main Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient-primary text-white">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-cog mr-2"></i>
                    <h5 class="mb-0">تعديل بيانات المستخدم: {{ $user->name }}</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <!-- User Information Section -->
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="name" class="form-label fw-bold text-dark">
                                    <i class="fas fa-user text-primary mr-1"></i>
                                    الاسم الكامل
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                       name="name" 
                                       id="name"
                                       value="{{ old('name', $user->name) }}"
                                       placeholder="أدخل الاسم الكامل"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle text-danger mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="email" class="form-label fw-bold text-dark">
                                    <i class="fas fa-envelope text-primary mr-1"></i>
                                    البريد الإلكتروني
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       name="email" 
                                       id="email"
                                       value="{{ old('email', $user->email) }}"
                                       placeholder="أدخل البريد الإلكتروني"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle text-danger mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Role Selection Section -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label for="role" class="form-label fw-bold text-dark">
                                    <i class="fas fa-user-tag text-primary mr-1"></i>
                                    دور المستخدم
                                </label>
                                <select class="form-select form-select-lg @error('role') is-invalid @enderror" 
                                        name="role" 
                                        id="role"
                                        required>
                                    <option value="" disabled>اختر دور المستخدم</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                        <i class="fas fa-crown"></i> مشرف
                                    </option>
                                    <option value="author" {{ old('role', $user->role) == 'author' ? 'selected' : '' }}>
                                        <i class="fas fa-pen"></i> كاتب
                                    </option>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                        <i class="fas fa-user"></i> مستخدم
                                    </option>
                                    <option value="guest" {{ old('role', $user->role) == 'guest' ? 'selected' : '' }}>
                                        <i class="fas fa-user-clock"></i> زائر
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-triangle text-danger mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- User Status Display -->
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fas fa-info-circle text-primary mr-1"></i>
                                    حالة الحساب
                                </label>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success fs-6 px-3 py-2">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        نشط
                                    </span>
                                    <small class="text-muted ms-2">
                                        تم إنشاء الحساب في {{ $user->created_at->format('d/m/Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        <i class="fas fa-save mr-2"></i>
                                        حفظ التغييرات
                                    </button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                        <i class="fas fa-times mr-2"></i>
                                        إلغاء
                                    </a>
                                </div>
                                
                                <!-- Additional Actions -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog mr-1"></i>
                                        إجراءات إضافية
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-key mr-2"></i>إعادة تعيين كلمة المرور</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-ban mr-2"></i>تعطيل الحساب</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash mr-2"></i>حذف المستخدم</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- User Activity Summary -->
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card border-left-primary shadow-sm h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    آخر تسجيل دخول
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'غير محدد' }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-left-success shadow-sm h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    عدد المقالات
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $user->posts_count ?? 0 }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card border-left-info shadow-sm h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    حالة الحساب
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    نشط
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus, .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .card {
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        
        .btn {
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
        }
        
        .border-left-primary {
            border-left: 0.25rem solid #4e73df !important;
        }
        
        .border-left-success {
            border-left: 0.25rem solid #1cc88a !important;
        }
        
        .border-left-info {
            border-left: 0.25rem solid #36b9cc !important;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        
        .form-label {
            margin-bottom: 0.5rem;
            color: #5a5c69;
        }
        
        .text-gray-800 {
            color: #5a5c69 !important;
        }
        
        .text-gray-300 {
            color: #dddfeb !important;
        }
    </style>

    <script>
        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Auto-save functionality
        let autoSaveTimer;
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, select');

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    // Show auto-save indicator
                    const saveBtn = document.querySelector('button[type="submit"]');
                    const originalText = saveBtn.innerHTML;
                    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>حفظ تلقائي...';
                    saveBtn.disabled = true;
                    
                    setTimeout(() => {
                        saveBtn.innerHTML = originalText;
                        saveBtn.disabled = false;
                    }, 1000);
                }, 2000);
            });
        });
    </script>
@endsection