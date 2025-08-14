@extends('admin.theme.default')

@section('title')
    إدارة المؤلفين
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-users mr-2"></i>
            إدارة المؤلفين
        </h1>
        <a href="{{ route('admin.authors.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i>
            إضافة مؤلف جديد
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-1"></i>
                        قائمة المؤلفين
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">خيارات:</div>
                            <a class="dropdown-item" href="{{ route('admin.authors.create') }}">
                                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                إضافة مؤلف جديد
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                                تصدير البيانات
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($authors->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="authorsTable" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" style="width: 60px;">
                                            <i class="fas fa-image"></i>
                                        </th>
                                        <th>
                                            <i class="fas fa-user mr-1"></i>
                                            الاسم
                                        </th>
                                        <th>
                                            <i class="fas fa-envelope mr-1"></i>
                                            البريد الإلكتروني
                                        </th>
                                        <th>
                                            <i class="fas fa-phone mr-1"></i>
                                            رقم الهاتف
                                        </th>
                                        <th>
                                            <i class="fas fa-globe mr-1"></i>
                                            الموقع الإلكتروني
                                        </th>
                                        <th>
                                            <i class="fas fa-share-alt mr-1"></i>
                                            الروابط الاجتماعية
                                        </th>
                                        <th class="text-center" style="width: 150px;">
                                            <i class="fas fa-cogs mr-1"></i>
                                            الإجراءات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $author)
                                    <tr>
                                        <td class="text-center">
                                            @if($author->profile_picture)
                                                <img src="{{ asset($author->profile_picture) }}" 
                                                     class="rounded-circle border" 
                                                     style="width: 50px; height: 50px; object-fit: cover;"
                                                     alt="{{ $author->name }}">
                                            @else
                                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="font-weight-bold text-primary">{{ $author->name }}</div>
                                            @if($author->bio)
                                                <small class="text-muted">{{ Str::limit($author->bio, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $author->email }}" class="text-decoration-none">
                                                <i class="fas fa-envelope mr-1 text-info"></i>
                                                {{ $author->email }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($author->phone_no)
                                                <a href="tel:{{ $author->phone_no }}" class="text-decoration-none">
                                                    <i class="fas fa-phone mr-1 text-success"></i>
                                                    {{ $author->phone_no }}
                                                </a>
                                            @else
                                                <span class="text-muted">غير محدد</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($author->website)
                                                <a href="{{ $author->website }}" target="_blank" class="text-decoration-none">
                                                    <i class="fas fa-external-link-alt mr-1 text-warning"></i>
                                                    {{ Str::limit($author->website, 30) }}
                                                </a>
                                            @else
                                                <span class="text-muted">غير محدد</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($author->social_links)
                                                <span class="badge badge-info">
                                                    <i class="fas fa-share-alt mr-1"></i>
                                                    متوفر
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    <i class="fas fa-times mr-1"></i>
                                                    غير متوفر
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.authors.edit', $author->id) }}" 
                                                   class="btn btn-sm btn-outline-primary" 
                                                   title="تعديل">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        onclick="confirmDelete({{ $author->id }}, '{{ $author->name }}')"
                                                        title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            
                                            <!-- Hidden form for delete -->
                                            <form id="delete-form-{{ $author->id }}" 
                                                  action="{{ route('admin.authors.destroy', $author->id) }}" 
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
                     
                            <div class="d-flex justify-content-center mt-4">
                             
                            </div>
                 
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-500">لا توجد مؤلفين</h5>
                            <p class="text-gray-400">ابدأ بإضافة أول مؤلف إلى النظام</p>
                            <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i>
                                إضافة مؤلف جديد
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                    تأكيد الحذف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف المؤلف: <strong id="authorName"></strong>؟</p>
                <p class="text-danger"><small>لا يمكن التراجع عن هذا الإجراء.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    إلغاء
                </button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="fas fa-trash mr-1"></i>
                    تأكيد الحذف
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#authorsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
        },
        "pageLength": 10,
        "order": [[1, "asc"]],
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": [0, 6] }
        ]
    });
});

let authorIdToDelete = null;

function confirmDelete(id, name) {
    authorIdToDelete = id;
    $('#authorName').text(name);
    $('#deleteModal').modal('show');
}

$('#confirmDelete').click(function() {
    if (authorIdToDelete) {
        $('#delete-form-' + authorIdToDelete).submit();
    }
});

// Add success/error message handling
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'تم بنجاح!',
        text: '{{ session('success') }}',
        confirmButtonText: 'حسناً'
    });
@endif

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'خطأ!',
        text: '{{ session('error') }}',
        confirmButtonText: 'حسناً'
    });
@endif
</script>
@endpush

@push('styles')
<style>
.table th {
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}

.btn-group .btn {
    margin: 0 2px;
}

.badge {
    font-size: 0.75rem;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom: none;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.modal-content {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.pagination .page-link {
    border: none;
    color: #5a5c69;
}

.pagination .page-item.active .page-link {
    background-color: #4e73df;
    border-color: #4e73df;
}

.table-hover tbody tr:hover {
    background-color: rgba(78, 115, 223, 0.05);
}
</style>
@endpush