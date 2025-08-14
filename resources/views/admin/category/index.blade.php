@extends('admin.theme.default')

@section('title')
    @lang('Categories Management')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-folder-open text-primary mr-2"></i>
            @lang('Categories Management')
        </h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i>
            @lang('Add New Category')
        </a>
    </div>

    <!-- Categories Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary text-white">
            <h6 class="m-0 font-weight-bold">
                <i class="fas fa-list mr-2"></i>
                @lang('Categories List')
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">@lang('Options')</div>
                    <a class="dropdown-item" href="{{ route('admin.categories.create') }}">
                        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        @lang('Add Category')
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                        @lang('Export Data')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" style="width: 60px;">
                                    <i class="fas fa-hashtag text-gray-400"></i>
                                </th>
                                <th>
                                    <i class="fas fa-tag mr-1 text-gray-400"></i>
                                    @lang('Category Name')
                                </th>
                                <th>
                                    <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                    @lang('Description')
                                </th>
                                <th>
                                    <i class="fas fa-link mr-1 text-gray-400"></i>
                                    @lang('Link')
                                </th>
                                <th class="text-center" style="width: 120px;">
                                    <i class="fas fa-cogs text-gray-400"></i>
                                    @lang('Actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="category-row" data-id="{{ $category->id }}">
                                    <td class="text-center">
                                        <span class="badge badge-primary badge-pill">{{ $category->id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="category-icon mr-2">
                                                <i class="fas fa-folder text-warning"></i>
                                            </div>
                                            <div>
                                                <strong class="text-gray-900">{{ $category->name }}</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-gray-600">
                                            {!! \Illuminate\Support\Str::limit($category->description, 80) !!}
                                            @if(strlen($category->description) > 80)
                                                <span class="text-primary cursor-pointer" onclick="showFullDescription({{ $category->id }})">
                                                        ... @lang('More')
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <code class="text-info">{{ $category->slug }}</code>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="@lang('Edit')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="deleteCategory({{ $category->id }}, '{{ $category->name }}')"
                                                    title="@lang('Delete')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-folder-open fa-4x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">@lang('No categories found')</h5>
                        <p class="text-gray-400 mb-4">@lang('No categories have been created yet. Start by adding a new category.')</p>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i>
                            @lang('Add First Category')
                        </a>
                    </div>
                </div>
            @endif
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
                    @lang('Delete Confirmation')
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('Are you sure you want to delete the category:') <strong id="categoryName"></strong>?</p>
                <p class="text-muted small">@lang('This action cannot be undone.')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    @lang('Cancel')
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-1"></i>
                        @lang('Delete')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Full Description Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">
                    <i class="fas fa-align-left mr-2"></i>
                    @lang('Category Description')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="fullDescription"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

<style>
.category-row:hover {
    background-color: #f8f9fc;
    transition: background-color 0.2s ease;
}

.category-icon {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fc;
    border-radius: 50%;
}

.empty-state {
    padding: 2rem;
}

.cursor-pointer {
    cursor: pointer;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
}

.table-hover tbody tr:hover {
    background-color: #f8f9fc;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}

.btn-group .btn {
    margin: 0 2px;
}

.badge-pill {
    padding-left: 0.6em;
    padding-right: 0.6em;
}
</style>

<script>
function deleteCategory(id, name) {
    document.getElementById('categoryName').textContent = name;
    document.getElementById('deleteForm').action = "{{ route('admin.categories.destroy', ':id') }}".replace(':id', id);
    $('#deleteModal').modal('show');
}

function showFullDescription(id) {
    // This would typically fetch the full description via AJAX
    // For now, we'll show a placeholder
    document.getElementById('fullDescription').innerHTML = `
        <div class="alert alert-info">
            <i class="fas fa-info-circle mr-2"></i>
            سيتم عرض الوصف الكامل هنا. يمكنك إضافة طلب AJAX لجلب البيانات الفعلية.
        </div>
    `;
    $('#descriptionModal').modal('show');
}

// Initialize DataTable with enhanced options
$(document).ready(function() {
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
        },
        "pageLength": 10,
        "order": [[0, "desc"]],
        "responsive": true,
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "الكل"]]
    });
});
</script>
@endsection
