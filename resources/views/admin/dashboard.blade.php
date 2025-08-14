@extends('admin.theme.default')

@section('title')
    @lang('Dashboard') - @lang('Statistics')
@endsection

@section('content')
<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-tachometer-alt mr-2"></i>
        @lang('Dashboard')
    </h1>
    <div class="d-none d-sm-inline-block">
        <span class="text-muted">@lang('Last Update'): {{ now()->format('Y-m-d H:i') }}</span>
    </div>
</div>

<!-- Statistics Cards Row -->
<div class="row">
    <!-- Posts Count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden" 
             style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body text-white">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">
                            <i class="fas fa-book-open mr-1"></i>
                            @lang('Posts')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ number_format($posts_count) }}</div>
                        <div class="text-xs text-white-50 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            @lang('Total Posts')
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-book-open fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-white bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>

    <!-- Authors Count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body text-white">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">
                            <i class="fas fa-users mr-1"></i>
                            @lang('Authors')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ number_format($authors_count) }}</div>
                        <div class="text-xs text-white-50 mt-1">
                            <i class="fas fa-user-plus mr-1"></i>
                            @lang('Total Authors')
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-white bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>

    <!-- Visitors Count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="card-body text-white">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">
                            <i class="fas fa-eye mr-1"></i>
                            @lang('Visitors')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ number_format($contact_count) }}</div>
                        <div class="text-xs text-white-50 mt-1">
                            <i class="fas fa-chart-line mr-1"></i>
                            @lang('Total Visitors')
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-eye fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-white bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>

    <!-- Categories Count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="card-body text-white">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">
                            <i class="fas fa-tags mr-1"></i>
                            @lang('Categories')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ number_format($categories_count) }}</div>
                        <div class="text-xs text-white-50 mt-1">
                            <i class="fas fa-folder mr-1"></i>
                            @lang('Total Categories')
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-tags fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-white bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Second Row -->
<div class="row">
    <!-- Users Count Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
            <div class="card-body text-white">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white-50 text-uppercase mb-1">
                            <i class="fas fa-user-shield mr-1"></i>
                            @lang('Users')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ number_format($users_count) }}</div>
                        <div class="text-xs text-white-50 mt-1">
                            <i class="fas fa-user-check mr-1"></i>
                                    @lang('Registered Users')
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-user-shield fa-2x text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-white bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>

    <!-- About Info Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg h-100 py-2 position-relative overflow-hidden"
             style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
            <div class="card-body text-dark">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            @lang('website information')
                        </div>
                        <div class="h2 mb-0 font-weight-bold text-dark">
                            @if($about)
                                @lang('Exists')
                            @else
                                @lang('Not Exists')
                            @endif
                        </div>
                        <div class="text-xs text-muted mt-1">
                            <i class="fas fa-{{ $about ? 'check-circle' : 'exclamation-triangle' }} mr-1"></i>
                            @if($about)
                                @lang('Information is set')
                            @else
                                @lang('Information is not set')
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-primary bg-opacity-20 rounded-circle p-3">
                            <i class="fas fa-info-circle fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 p-3">
                <div class="bg-primary bg-opacity-10 rounded-circle" style="width: 60px; height: 60px;"></div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-0 shadow-lg h-100">
            <div class="card-header bg-gradient-primary text-white border-0">
                <h6 class="m-0 font-weight-bold">
                    <i class="fas fa-bolt mr-2"></i>
                    @lang('Quick Actions')
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('New Post')
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-success btn-block">
                            <i class="fas fa-user-plus mr-2"></i>
                            @lang('New Author')
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-info btn-block">
                            <i class="fas fa-folder-plus mr-2"></i>
                            @lang('New Category')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-gradient-secondary text-white border-0">
                <h6 class="m-0 font-weight-bold">
                    <i class="fas fa-chart-line mr-2"></i>
                    @lang('General View of the System')
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 mb-3">
                        <div class="border-end">
                            <h4 class="text-primary font-weight-bold">{{ $posts_count }}</h4>
                            <p class="text-muted mb-0">@lang('Post')</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="border-end">
                            <h4 class="text-success font-weight-bold">{{ $authors_count }}</h4>
                            <p class="text-muted mb-0">@lang('Author')</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="border-end">
                            <h4 class="text-info font-weight-bold">{{ $categories_count }}</h4>
                            <p class="text-muted mb-0">@lang('Category')</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div>
                            <h4 class="text-warning font-weight-bold">{{ $users_count }}</h4>
                            <p class="text-muted mb-0">@lang('User')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-secondary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.btn {
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.text-white-50 {
    color: rgba(255, 255, 255, 0.7) !important;
}

.bg-opacity-20 {
    background-color: rgba(255, 255, 255, 0.2) !important;
}

.bg-opacity-10 {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

.bg-primary.bg-opacity-20 {
    background-color: rgba(0, 123, 255, 0.2) !important;
}

.bg-primary.bg-opacity-10 {
    background-color: rgba(0, 123, 255, 0.1) !important;
}

@media (max-width: 768px) {
    .card-body .h2 {
        font-size: 1.5rem;
    }
    
    .btn-block {
        font-size: 0.9rem;
    }
}
</style>

@endsection















































{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
