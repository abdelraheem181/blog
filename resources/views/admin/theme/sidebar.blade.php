    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <i class="fas fa-blog fa-2x text-white"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          <span class="fw-bold fs-5">@lang('The Blog')</span>
          <small class="d-block text-white-50">@lang('Website')</small>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-3">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{ route('admin.dashboard') }}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-fw fa-tachometer-alt"></i>
          </div>
          <span class="nav-text">@lang('Statistics')</span>
        </a>
      </li>

      <!-- Nav Item - Categories -->
      <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{route('admin.categories.index')}}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-book-open"></i>
          </div>
          <span class="nav-text">@lang('Categories')</span>
        </a>
      </li>

      <!-- Nav Item - Authors -->
      <li class="nav-item {{ request()->is('admin/authors*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{route('admin.authors.index')}}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-users"></i>
          </div>
          <span class="nav-text">@lang('Authors')</span>
        </a>
      </li>

      <!-- Nav Item - Posts -->
      <li class="nav-item {{ request()->is('admin/posts*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{route('admin.posts.index')}}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-pen-fancy"></i>
          </div>
          <span class="nav-text">@lang('Posts')</span>
        </a>
      </li>

      <!-- Nav Item - Contact Messages -->
      <li class="nav-item {{ request()->is('admin/contacts*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{ route('admin.contacts.index') }}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-envelope"></i>
          </div>
          <span class="nav-text">@lang('Contact Messages')</span>
        </a>  
      </li>

      <!-- Nav Item - User Management -->
      <li class="nav-item {{ request()->is('admin/users*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{ route('admin.users.index') }}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-users-cog"></i>
          </div>
          <span class="nav-text">@lang('User Management')</span>
        </a>
      </li>

      <!-- Nav Item - About Page -->
      <li class="nav-item {{ request()->is('admin/abouts*') ? 'active' : ''}}">
        <a class="nav-link text-right d-flex align-items-center py-3 px-3" href="{{ route('admin.abouts.index') }}">
          <div class="nav-icon-wrapper me-3">
            <i class="fas fa-info-circle"></i>
          </div>
          <span class="nav-text">@lang('About Page')</span>
        </a>  
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block my-4">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 sidebar-toggle-btn" id="sidebarToggle">
          <i class="fas fa-angle-left"></i>
        </button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <style>
      /* Enhanced Sidebar Styles */
      .sidebar {
        transition: all 0.3s ease;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
      }

      .sidebar-brand {
        padding: 1.5rem 1rem;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255,255,255,0.1);
      }

      .sidebar-brand:hover {
        background-color: rgba(255,255,255,0.05);
        transform: translateY(-1px);
      }

      .sidebar-brand-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        border-radius: 8px;
        transition: all 0.3s ease;
      }

      .sidebar-brand:hover .sidebar-brand-icon {
        background: rgba(255,255,255,0.2);
        transform: scale(1.05);
      }

      .sidebar-brand-text {
        line-height: 1.2;
      }

      .nav-item {
        margin: 0.25rem 0.75rem;
        border-radius: 8px;
        transition: all 0.3s ease;
      }

      .nav-item:hover {
        background-color: rgba(255,255,255,0.05);
        transform: translateX(-3px);
      }

      .nav-item.active {
        background: linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
        border-left: 3px solid #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }

      .nav-link {
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0.1), transparent);
        transition: width 0.3s ease;
      }

      .nav-link:hover::before {
        width: 100%;
      }

      .nav-icon-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        background: rgba(255,255,255,0.1);
        transition: all 0.3s ease;
      }

      .nav-item:hover .nav-icon-wrapper {
        background: rgba(255,255,255,0.2);
        transform: scale(1.1);
      }

      .nav-item.active .nav-icon-wrapper {
        background: rgba(255,255,255,0.25);
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      }

      .nav-text {
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .nav-item:hover .nav-text {
        transform: translateX(-2px);
      }

      .sidebar-divider {
        border-color: rgba(255,255,255,0.1);
        margin: 1rem 0.75rem;
      }

      .sidebar-toggle-btn {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        color: white;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .sidebar-toggle-btn:hover {
        background: rgba(255,255,255,0.2);
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      }

      /* Toggled state styles */
      .sidebar.toggled .nav-item {
        margin: 0.25rem 0.5rem;
      }

      .sidebar.toggled .nav-link {
        justify-content: center;
        padding: 0.75rem !important;
      }

      .sidebar.toggled .nav-icon-wrapper {
        margin: 0;
        width: 36px;
        height: 36px;
      }

      .sidebar.toggled .nav-text {
        display: none;
      }

      .sidebar.toggled .sidebar-brand-text {
        display: none;
      }

      .sidebar.toggled .sidebar-brand-icon {
        margin: 0;
      }

      /* Responsive adjustments */
      @media (max-width: 768px) {
        .nav-item {
          margin: 0.125rem 0.5rem;
        }
        
        .nav-link {
          padding: 0.75rem 1rem !important;
        }
      }

      /* Animation for page load */
      .nav-item {
        animation: slideInLeft 0.5s ease forwards;
        opacity: 0;
        transform: translateX(-20px);
      }

      .nav-item:nth-child(1) { animation-delay: 0.1s; }
      .nav-item:nth-child(2) { animation-delay: 0.2s; }
      .nav-item:nth-child(3) { animation-delay: 0.3s; }
      .nav-item:nth-child(4) { animation-delay: 0.4s; }
      .nav-item:nth-child(5) { animation-delay: 0.5s; }
      .nav-item:nth-child(6) { animation-delay: 0.6s; }
      .nav-item:nth-child(7) { animation-delay: 0.7s; }

      @keyframes slideInLeft {
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      /* Focus states for accessibility */
      .nav-link:focus {
        outline: 2px solid rgba(255,255,255,0.5);
        outline-offset: 2px;
      }

      /* Loading state */
      .nav-link.loading {
        pointer-events: none;
        opacity: 0.7;
      }

      .nav-link.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        right: 1rem;
        width: 12px;
        height: 12px;
        border: 2px solid rgba(255,255,255,0.3);
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        transform: translateY(-50%);
      }

      @keyframes spin {
        0% { transform: translateY(-50%) rotate(0deg); }
        100% { transform: translateY(-50%) rotate(360deg); }
      }
    </style>

    <script>
      // Add loading state to nav links
      document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
          this.classList.add('loading');
          setTimeout(() => {
            this.classList.remove('loading');
          }, 1000);
        });
      });

      // Enhanced hover effects
      document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(-3px) scale(1.02)';
        });
        
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0) scale(1)';
        });
      });
    </script>