@extends('admin.theme.default')

@section('title')
    إدارة المستخدمين 
@endsection

@section('head')
<style>
    .user-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .stats-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
    }
    
    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    
    .search-box {
        background: white;
        border-radius: 25px;
        border: 2px solid #e3e6f0;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }
    
    .search-box:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        outline: none;
    }
    
    .table-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        font-weight: 600;
        padding: 15px 12px;
        font-size: 14px;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fc;
        transform: scale(1.01);
    }
    
    .table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
        border-color: #e3e6f0;
    }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .status-active {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }
    
    .status-inactive {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
        color: white;
    }
    
    .btn-action {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        margin: 0 2px;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }
    
    .btn-edit:hover {
        background: linear-gradient(135deg, #218838, #1ea085);
        transform: scale(1.1);
        color: white;
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
        color: white;
    }
    
    .btn-delete:hover {
        background: linear-gradient(135deg, #c82333, #e55a00);
        transform: scale(1.1);
        color: white;
    }
    
    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }
    
    .stats-icon.users {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    
    .stats-icon.active {
        background: linear-gradient(135deg, #28a745, #20c997);
    }
    
    .stats-icon.inactive {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }
    
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .loading {
        display: none;
        text-align: center;
        padding: 20px;
    }
    
    .spinner {
        border: 3px solid #f3f3f3;
        border-top: 3px solid #667eea;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="container-fluid fade-in">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                إجمالي المستخدمين
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="stats-icon users">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                المستخدمين النشطين
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->where('role', 'user')->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="stats-icon active">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                المستخدمين الجدد هذا الشهر
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stats-icon inactive">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                المستخدمين اليوم
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $users->where('created_at', '>=', now()->startOfDay())->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stats-icon users">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control search-box" placeholder="البحث في المستخدمين..." aria-label="Search users">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent border-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-left">
            <button class="btn btn-primary" onclick="exportUsers()">
                <i class="fas fa-download mr-2"></i>
                تصدير البيانات
            </button>
        </div>
    </div>

    <!-- Users Table -->
    <div class="table-container">
        <div class="card-header bg-transparent border-0 py-3">
            <h5 class="mb-0 text-gray-800">
                <i class="fas fa-users mr-2"></i>
                قائمة المستخدمين
            </h5>
        </div>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p class="mt-2 text-muted">جاري التحميل...</p>
        </div>
        
        <div class="table-responsive" id="tableContainer">
            <table class="table table-hover mb-0" id="usersTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المستخدم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الدور</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        @if ($user->role != 'admin')
                        <tr data-user-id="{{ $user->id }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white font-weight-bold mr-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="font-weight-bold">{{ $user->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="font-weight-bold text-gray-900">{{ $user->name }}</div>
                                    <div class="text-muted small">ID: {{ $user->id }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-muted mr-2"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : 'success' }} px-3 py-2">
                                    {{ $user->role == 'admin' ? 'مدير' : 'مستخدم' }}
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-active">
                                    <i class="fas fa-circle mr-1"></i>
                                    نشط
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar text-muted mr-2"></i>
                                    <span>{{ $user->created_at->format('Y/m/d') }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                       class="btn btn-action btn-edit" 
                                       title="تعديل المستخدم">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <button type="button" 
                                            class="btn btn-action btn-delete" 
                                            onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')"
                                            title="حذف المستخدم">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fas fa-users"></i>
                                    <h5>لا يوجد مستخدمين</h5>
                                    <p class="text-muted">لم يتم العثور على أي مستخدمين في النظام</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    تأكيد الحذف
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف المستخدم <strong id="userNameToDelete"></strong>؟</p>
                <p class="text-muted small">لا يمكن التراجع عن هذا الإجراء.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i>
                        حذف المستخدم
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchTerm = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#usersTable tbody tr');
    
    tableRows.forEach(row => {
        const userName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const userEmail = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        
        if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Delete confirmation
function confirmDelete(userId, userName) {
    document.getElementById('userNameToDelete').textContent = userName;
    document.getElementById('deleteForm').action = `/admin/users/${userId}`;
    $('#deleteModal').modal('show');
}

// Export functionality
function exportUsers() {
    // Show loading
    document.getElementById('loading').style.display = 'block';
    document.getElementById('tableContainer').style.display = 'none';
    
    // Simulate export process
    setTimeout(() => {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('tableContainer').style.display = 'block';
        
        // Create CSV content
        const table = document.getElementById('usersTable');
        const rows = table.querySelectorAll('tbody tr');
        let csv = 'الرقم,الاسم,البريد الإلكتروني,الدور,تاريخ الإنشاء\n';
        
        rows.forEach(row => {
            if (row.style.display !== 'none') {
                const cells = row.querySelectorAll('td');
                const rowData = [
                    cells[0].textContent.trim(),
                    cells[1].textContent.trim(),
                    cells[2].textContent.trim(),
                    cells[3].textContent.trim(),
                    cells[4].textContent.trim()
                ];
                csv += rowData.join(',') + '\n';
            }
        });
        
        // Download CSV
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', 'users_export.csv');
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }, 1000);
}

// Add smooth animations
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('#usersTable tbody tr');
    rows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.1}s`;
        row.classList.add('fade-in');
    });
});
</script>
@endsection