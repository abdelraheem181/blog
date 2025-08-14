<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm border-bottom">
  <div class="container-fluid">
    <!-- Left side - Heading and Search -->
    <div class="d-flex align-items-center flex-grow-1">

      
      <!-- Page Heading -->
      <div class="page-heading me-4">
        <h4 class="mb-0 text-primary fw-bold">@yield('heading')</h4>
        <small class="text-muted"> @lang('Dashboard')</small>
      </div>

      <!-- Search Bar -->
      <div class="search-container d-none d-md-block flex-grow-1 mx-4">
        <div class="input-group">
          <span class="input-group-text bg-light border-end-0">
            <i class="fas fa-search text-muted"></i>
          </span>
          <input type="text" class="form-control border-start-0 ps-0" placeholder="@lang("Search in the admin dashboard...")" id="searchInput">
          <button class="btn btn-outline-secondary" type="button">
            <i class="fas fa-filter"></i>
          </button>
        </div>
      </div>
    </div>
          <!-- language -->
          <div class="d-flex align-items-center">
            @if (app()->getLocale()=='en')
              <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('change.lang',app()->getLocale()=='en'?'ar':'en')}}">
                <i class="fas fa-globe"></i>
                </a>
                @else
                <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('change.lang',app()->getLocale()=='ar'?'en':'ar')}}">
                <i class="fas fa-globe"></i>
                </a>
                @endif
              </li>
            </div>
    <!-- Right side - Actions and User Menu -->
    <div class="d-flex align-items-center">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3 text-dark">
        <i class="fas fa-bars"></i>
      </button>
       

      <!-- Notifications -->
      <div class="dropdown me-3">
        <a class="nav-link position-relative" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell fa-lg text-muted"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            3
          </span>
        </a>

        

        <div class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="width: 320px;">
          <div class="dropdown-header d-flex align-items-center justify-content-between">
            <h6 class="mb-0 text-primary">@lang('Notifications')</h6>
            <a href="#" class="text-decoration-none small">@lang('View All')</a>
          </div>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center py-2" href="#">
            <div class="flex-shrink-0">
              <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                <i class="fas fa-envelope text-white fa-sm"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3">
              <div class="small text-gray-500">@lang('3 minutes ago')</div>
              <span class="font-weight-bold">@lang('New message from Ahmed')</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center py-2" href="#">
            <div class="flex-shrink-0">
              <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                <i class="fas fa-check text-white fa-sm"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3">
              <div class="small text-gray-500">@lang('1 hour ago')</div>
              <span class="font-weight-bold">@lang('Article published successfully')</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center py-2" href="#">
            <div class="flex-shrink-0">
              <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                <i class="fas fa-exclamation-triangle text-white fa-sm"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3">
              <div class="small text-gray-500">@lang('3 hours ago')</div>
              <span class="font-weight-bold">@lang('Warning: Storage space is low')</span>
            </div>
          </a>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="dropdown me-3">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="quickActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-plus me-1"></i>
          @lang('Add New')
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0">
          <li><a class="dropdown-item" href="{{ route('admin.posts.create') }}">
            <i class="fas fa-pen-fancy me-2 text-primary"></i>@lang('New Article')
          </a></li>
          <li><a class="dropdown-item" href="{{ route('admin.authors.create') }}">
            <i class="fas fa-user-plus me-2 text-success"></i>@lang('New Author')
          </a></li>
          <li><a class="dropdown-item" href="{{ route('admin.categories.create') }}">
            <i class="fas fa-folder-plus me-2 text-info"></i>@lang('New Category')
          </a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">
            <i class="fas fa-cog me-2 text-secondary"></i>@lang('Quick Settings')
          </a></li>
        </ul>
      </div>

      <!-- User Information -->
      <div class="dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="user-avatar me-2">
            <img class="img-profile rounded-circle" src="{{ asset('theme/img/undraw_profile.svg') }}" alt="User Avatar" style="width: 40px; height: 40px;">
          </div>
          <div class="d-none d-lg-block text-start">
            <div class="fw-bold text-dark">@lang('User Name')</div>
            <div class="small text-muted">@lang('System Manager')</div>
          </div>
          <i class="fas fa-chevron-down ms-2 text-muted"></i>
        </a>
        
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="width: 280px;">
          <div class="dropdown-header bg-light py-3">
            <div class="d-flex align-items-center">
              <img class="img-profile rounded-circle me-3" src="{{ asset('theme/img/undraw_profile.svg') }}" alt="User Avatar" style="width: 48px; height: 48px;">
              <div>
                <div class="fw-bold text-dark">@lang('User Name')</div>
                <div class="small text-muted">admin@example.com</div>
              </div>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('profile.edit') }}">
            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
            @lang('Profile')
          </a>
          <a class="dropdown-item d-flex align-items-center py-2" href="#">
            <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                @lang('Settings')
          </a>
          <a class="dropdown-item d-flex align-items-center py-2" href="#">
            <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>
            @lang('Activity Log')
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center py-2 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i>
            @lang('Logout')
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- End of Topbar -->

<style>
/* Enhanced Header Styles */
.topbar {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(0,0,0,0.1) !important;
}

.page-heading h4 {
  background: linear-gradient(45deg, #4e73df, #224abe);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.search-container .input-group {
  max-width: 400px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  border-radius: 25px;
  overflow: hidden;
}

.search-container .form-control {
  border: none;
  background: #f8f9fa;
  padding: 0.75rem 1rem;
}

.search-container .form-control:focus {
  box-shadow: none;
  background: #ffffff;
}

.search-container .input-group-text {
  border: none;
  background: #f8f9fa;
  padding: 0.75rem 1rem;
}

.user-avatar img {
  border: 2px solid #e3e6f0;
  transition: all 0.3s ease;
}

.user-avatar img:hover {
  border-color: #4e73df;
  transform: scale(1.05);
}

.dropdown-menu {
  border-radius: 10px;
  border: none;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.dropdown-item {
  padding: 0.75rem 1.5rem;
  transition: all 0.2s ease;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  transform: translateX(-5px);
}

.dropdown-header {
  border-radius: 10px 10px 0 0;
}

.btn-primary {
  background: linear-gradient(45deg, #4e73df, #224abe);
  border: none;
  border-radius: 20px;
  padding: 0.5rem 1.5rem;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
}

.nav-link {
  transition: all 0.3s ease;
}

.nav-link:hover {
  transform: translateY(-1px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .search-container {
    display: none !important;
  }
  
  .page-heading {
    margin-right: 0 !important;
  }
  
  .page-heading h4 {
    font-size: 1.1rem;
  }
}

/* Animation for notifications */
@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

.badge {
  animation: pulse 2s infinite;
}

/* Smooth transitions */
* {
  transition: all 0.2s ease;
}
</style>

<script>
// Add some interactive functionality
document.addEventListener('DOMContentLoaded', function() {
  // Search functionality
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      // Add search logic here
      console.log('Searching for:', e.target.value);
    });
  }
  
  // Add hover effects to dropdown items
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  dropdownItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      this.style.backgroundColor = '#f8f9fa';
    });
    
    item.addEventListener('mouseleave', function() {
      this.style.backgroundColor = '';
    });
  });
});
</script>