@extends('admin.theme.default')

@section('title')
    @lang('Posts')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-newspaper text-primary me-2"></i>
            @lang('Posts Management')
        </h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i>
            @lang('Add New Post')
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                @lang('Total Posts')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                @lang('Published Posts')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->where('is_published', true)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                @lang('Disabled Posts')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->where('is_published', false)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                @lang('This Month')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts->where('created_at', '>=', now()->startOfMonth())->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-list me-1"></i>
                @lang('Posts List')
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">@lang('Additional Options')</div>
                    <a class="dropdown-item" href="#"><i class="fas fa-download fa-sm fa-fw me-2 text-gray-400"></i>@lang('Export Data')</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-print fa-sm fa-fw me-2 text-gray-400"></i>@lang('Print')</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-cog fa-sm fa-fw me-2 text-gray-400"></i>@lang('Settings')</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 60px;">
                                <i class="fas fa-hashtag"></i>
                            </th>
                            <th style="width: 200px;">
                                <i class="fas fa-heading me-1"></i>@lang('Title')
                            </th>
                            <th style="width: 300px;">
                                <i class="fas fa-file-alt me-1"></i>@lang('Content')
                            </th>
                            <th style="width: 120px;">
                                    <i class="fas fa-calendar me-1"></i>@lang('Publication Date')
                            </th>
                            <th style="width: 120px;">
                                <i class="fas fa-user me-1"></i>@lang('Author')
                            </th>
                            <th class="text-center" style="width: 100px;">
                                <i class="fas fa-toggle-on me-1"></i>@lang('Status')
                            </th>
                            <th style="width: 150px;">
                                <i class="fas fa-link me-1"></i>@lang('Fixed Link (Slug)')
                            </th>
                            <th class="text-center" style="width: 200px;">
                                <i class="fas fa-cogs me-1"></i>@lang('Actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr class="post-row" data-post-id="{{ $post->id }}">
                                <td class="text-center">
                                    <span class="badge badge-primary badge-pill">{{ $post->id }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($post->image_cover)
                                            <img src="{{ asset($post->image_cover) }}" 
                                                 alt="{{ $post->title }}" 
                                                 class="rounded me-2" 
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-weight-bold text-gray-900">{{ $post->title }}</div>
                                            <div class="text-xs text-gray-500">{{ Str::limit($post->title, 30) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-sm text-gray-900">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 80) !!}
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-sm font-weight-bold text-gray-900">
                                        {{ $post->created_at->format('Y-m-d') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $post->created_at->format('H:i') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($post->author->profile_picture)
                                            <img src="{{ asset($post->author->profile_picture) }}" 
                                                 alt="{{ $post->author->name }}" 
                                                 class="rounded-circle me-2" 
                                                 style="width: 30px; height: 30px; object-fit: cover;">
                                        @else
                                            <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center" 
                                                 style="width: 30px; height: 30px;">
                                                <i class="fas fa-user text-white" style="font-size: 12px;"></i>
                                            </div>
                                        @endif
                                        <span class="text-sm font-weight-bold text-gray-900">{{ $post->author->name }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if($post->is_published)
                                        <span class="badge badge-success badge-pill">
                                            <i class="fas fa-check me-1"></i>@lang('Enabled')
                                        </span>
                                    @else
                                        <span class="badge badge-warning badge-pill">
                                            <i class="fas fa-clock me-1"></i>@lang('Disabled')
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <code class="text-xs bg-light px-2 py-1 rounded">{{ $post->slug }}</code>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Post Actions">
                                        @if (auth()->user()->isAdmin())
                                            @if($post->is_published)
                                                <a href="{{ route('admin.posts.unapprove', $post->id) }}" 
                                                   class="btn btn-sm btn-outline-danger me-1" 
                                                   title="@lang('Cancel Approval')"
                                                   onclick="return confirm('@lang('Are you sure you want to cancel the approval of this post?')')">
                                                    <i class="fas fa-times"></i>
                                                    <span class="d-none d-md-inline">@lang('Cancel Approval')</span>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.posts.approve', $post->id) }}" 
                                                   class="btn btn-sm btn-outline-success me-1" 
                                                   title="@lang('Approve')"
                                                   onclick="return confirm('@lang('Are you sure you want to approve this post?')')">
                                                    <i class="fas fa-check"></i>
                                                    <span class="d-none d-md-inline">@lang('Approve')</span>
                                                </a>
                                            @endif
                                        @endif

                                        <a href="{{ route('admin.posts.edit', $post->id) }}" 
                                           class="btn btn-sm btn-outline-primary me-1" 
                                           title="@lang('Edit')">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-md-inline">@lang('Edit')</span>
                                        </a>
                                 
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.posts.show', $post->id) }}" 
                                               class="btn btn-outline-info btn-sm" 
                                               title="@lang('View')">
                                                <i class="fas fa-eye"></i>
                                                <span class="d-none d-md-inline">@lang('View')</span>
                                            </a>
                                        </div>
                                

                                        <button type="button" 
                                                class="btn btn-sm btn-outline-danger" 
                                                        title="@lang('Delete')">
                                            <i class="fas fa-trash"></i>
                                            <span class="d-none d-md-inline">@lang('Delete')</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <h5>@lang('No Posts')</h5>
                                        <p>@lang('No posts have been created yet.')</p>
                                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-1"></i>
                                            @lang('Create First Post')
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                    @lang('Delete Confirmation')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('Are you sure you want to delete the post "<strong id="postTitle"></strong>"?')</p>
                <p class="text-danger"><small>@lang('This action cannot be undone.')</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times me-1"></i>@lang('Cancel')
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>@lang('Delete')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function deletePost(postId, postTitle) {
    document.getElementById('postTitle').textContent = postTitle;
    document.getElementById('deleteForm').action = `{{ route('admin.posts.destroy', '') }}/${postId}`;
    $('#deleteModal').modal('show');
}

// Add hover effects to table rows
$(document).ready(function() {
    $('.post-row').hover(
        function() {
            $(this).addClass('table-hover');
        },
        function() {
            $(this).removeClass('table-hover');
        }
    );

    // Initialize DataTable with custom options
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
        },
        "pageLength": 25,
        "order": [[0, "desc"]],
        "responsive": true,
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>

<style>
.post-row:hover {
    background-color: #f8f9fc !important;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}

.badge-pill {
    padding: 0.5em 1em;
}

.btn-group .btn {
    border-radius: 0.35rem !important;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom: none;
}

.table thead th {
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
}

.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.modal-content {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

@media (max-width: 768px) {
    .btn-group .btn span {
        display: none;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}
</style>
@endpush

