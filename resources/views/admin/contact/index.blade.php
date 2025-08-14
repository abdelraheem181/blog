@extends('admin.theme.default')

@section('title', 'إدارة الرسائل الواردة')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-envelope text-primary me-2"></i>
            إدارة الرسائل الواردة
        </h1>
        <div class="d-flex align-items-center">
            <span class="badge bg-primary fs-6 me-3">
                <i class="fas fa-inbox me-1"></i>
                {{ $contacts->count() }} رسالة
            </span>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-search me-2"></i>
                البحث والتصفية
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="البحث في الرسائل...">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">جميع الرسائل</option>
                        <option value="new">رسائل جديدة</option>
                        <option value="read">رسائل مقروءة</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button class="btn btn-outline-secondary w-100" id="clearFilters">
                        <i class="fas fa-times me-1"></i>
                        مسح الفلاتر
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Table -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list me-2"></i>
                قائمة الرسائل
            </h6>
            <div class="dropdown">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown">
                    <i class="fas fa-download me-1"></i>
                    تصدير
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i>Excel</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-file-pdf me-2"></i>PDF</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover" id="contactsTable">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 50px;">
                                    <i class="fas fa-hashtag text-muted"></i>
                                </th>
                                <th>
                                    <i class="fas fa-user me-1"></i>
                                    الاسم
                                </th>
                                <th>
                                    <i class="fas fa-envelope me-1"></i>
                                    البريد الإلكتروني
                                </th>
                                <th>
                                    <i class="fas fa-comment me-1"></i>
                                    الرسالة
                                </th>
                                <th>
                                    <i class="fas fa-calendar me-1"></i>
                                    التاريخ
                                </th>
                                <th class="text-center" style="width: 150px;">
                                    <i class="fas fa-cogs me-1"></i>
                                    الإجراءات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $index => $contact)
                            <tr class="contact-row" data-contact-id="{{ $contact->id }}">
                                <td class="text-center text-muted">
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-3">
                                            <div class="avatar-title bg-primary rounded-circle text-white">
                                                {{ strtoupper(substr($contact->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold">{{ $contact->name }}</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $contact->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                        <i class="fas fa-envelope me-1 text-primary"></i>
                                        {{ $contact->email }}
                                    </a>
                                </td>
                                <td>
                                    <div class="message-preview">
                                        {{ Str::limit($contact->message, 80) }}
                                        @if(strlen($contact->message) > 80)
                                            <span class="text-primary cursor-pointer" onclick="showFullMessage({{ $contact->id }})">
                                                ...المزيد
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-calendar-day me-1"></i>
                                        {{ $contact->created_at->format('Y-m-d') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                           class="btn btn-outline-info btn-sm" 
                                           title="عرض التفاصيل">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="mailto:{{ $contact->email }}" 
                                           class="btn btn-outline-success btn-sm" 
                                           title="رد على الرسالة">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger btn-sm" 
                                                onclick="confirmDelete({{ $contact->id }})"
                                                title="حذف الرسالة">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Hidden delete form -->
                                    <form id="deleteForm{{ $contact->id }}" 
                                          action="{{ route('admin.contacts.destroy', $contact->id) }}" 
                                          method="POST" 
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
               
           
             
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-inbox fa-3x text-muted"></i>
                    </div>
                    <h5 class="text-muted">لا توجد رسائل</h5>
                    <p class="text-muted">لم يتم استلام أي رسائل بعد.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">
                    <i class="fas fa-envelope me-2"></i>
                    تفاصيل الرسالة
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="messageModalBody">
                <!-- Message content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <a href="#" class="btn btn-primary" id="replyButton">
                    <i class="fas fa-reply me-1"></i>
                    رد
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    تأكيد الحذف
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف هذه الرسالة؟</p>
                <p class="text-muted small">لا يمكن التراجع عن هذا الإجراء.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="fas fa-trash me-1"></i>
                    حذف
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const contactRows = document.querySelectorAll('.contact-row');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        contactRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Clear filters
    document.getElementById('clearFilters').addEventListener('click', function() {
        searchInput.value = '';
        document.getElementById('statusFilter').value = '';
        contactRows.forEach(row => {
            row.style.display = '';
        });
    });
    
    // Status filter
    document.getElementById('statusFilter').addEventListener('change', function() {
        const status = this.value;
        // Add your status filtering logic here
    });
});

// Show full message
function showFullMessage(contactId) {
    // You can implement AJAX to load full message or use a data attribute
    const modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modal.show();
}

// Confirm delete
let contactToDelete = null;

function confirmDelete(contactId) {
    contactToDelete = contactId;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

document.getElementById('confirmDelete').addEventListener('click', function() {
    if (contactToDelete) {
        document.getElementById('deleteForm' + contactToDelete).submit();
    }
});

// Add hover effects
document.querySelectorAll('.contact-row').forEach(row => {
    row.addEventListener('mouseenter', function() {
        this.classList.add('table-active');
    });
    
    row.addEventListener('mouseleave', function() {
        this.classList.remove('table-active');
    });
});
</script>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.message-preview {
    max-width: 300px;
    line-height: 1.4;
}

.cursor-pointer {
    cursor: pointer;
}

.btn-group .btn {
    margin: 0 1px;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #e3e6f0;
}

.badge {
    font-size: 0.75rem;
}

.input-group-text {
    border: 1px solid #d1d3e2;
}

.form-control, .form-select {
    border: 1px solid #d1d3e2;
}

.form-control:focus, .form-select:focus {
    border-color: #bac8f3;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

@media (max-width: 768px) {
    .btn-group {
        display: flex;
        flex-direction: column;
    }
    
    .btn-group .btn {
        margin: 1px 0;
    }
    
    .message-preview {
        max-width: 200px;
    }
}
</style>
@endsection