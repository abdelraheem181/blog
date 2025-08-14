<!-- Enhanced Footer -->
<footer class="footer bg-white border-top">
  <div class="container-fluid">
    <div class="row align-items-center py-4">
      <!-- Copyright Section -->
      <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
        <div class="d-flex align-items-center">
          <div class="company-logo me-3">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
              <i class="fas fa-building text-white"></i>
            </div>
          </div>
          <div>
            <div class="fw-bold text-dark mb-1">@lang('Company Name')</div>
            <div class="small text-muted">@lang('All rights reserved') &copy; {{ date('Y') }}</div>
          </div>
        </div>
      </div>

      <!-- Quick Links Section -->
      <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
        <div class="text-center">
          <div class="d-flex justify-content-center gap-3 mb-2">
            <a href="#" class="text-decoration-none text-muted hover-primary">
              <i class="fas fa-shield-alt me-1"></i>@lang('Privacy')
            </a>
            <a href="#" class="text-decoration-none text-muted hover-primary">
              <i class="fas fa-file-contract me-1"></i>@lang('Terms')
            </a>
            <a href="#" class="text-decoration-none text-muted hover-primary">
              <i class="fas fa-question-circle me-1"></i>@lang('Help')
            </a>
          </div>
          <div class="small text-muted">
            <i class="fas fa-code me-1"></i>@lang('Developed by')
          </div>
        </div>
      </div>

      <!-- Social Links & Version Section -->
      <div class="col-lg-4 col-md-12">
        <div class="d-flex justify-content-lg-end justify-content-center align-items-center">
          <!-- Social Links -->
          <div class="social-links me-4">
            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle me-2" title="فيسبوك">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-outline-info btn-sm rounded-circle me-2" title="تويتر">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-outline-danger btn-sm rounded-circle me-2" title="يوتيوب">
              <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="btn btn-outline-success btn-sm rounded-circle" title="لينكد إن">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>

          <!-- Version Info -->
          <div class="version-info text-end">
            <div class="small text-muted">
              <i class="fas fa-code-branch me-1"></i>@lang('Version') 2.1.0
            </div>
            <div class="small text-muted">
              <i class="fas fa-clock me-1"></i>@lang('Last Update'): {{ date('Y-m-d') }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-top py-3">
      <div class="row align-items-center">
        <div class="col-md-6 mb-2 mb-md-0">
          <div class="d-flex align-items-center">
            <div class="status-indicator me-2">
              <span class="badge bg-success rounded-pill">
                <i class="fas fa-circle me-1"></i>@lang('System is working normally')
              </span>
            </div>
            <div class="small text-muted">
              <i class="fas fa-server me-1"></i>@lang('Response Time'): <span id="responseTime">0.2s</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-md-end">
          <div class="d-flex justify-content-md-end justify-content-center gap-3">
            <a href="#" class="text-decoration-none text-muted hover-primary small">
              <i class="fas fa-download me-1"></i>@lang('Download Report')
            </a>
            <a href="#" class="text-decoration-none text-muted hover-primary small">
              <i class="fas fa-cog me-1"></i>@lang('Settings')
            </a>
            <a href="#" class="text-decoration-none text-muted hover-primary small">
              <i class="fas fa-headset me-1"></i>@lang('Technical Support')
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<style>
/* Enhanced Footer Styles */
.footer {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
  box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
  position: relative;
  z-index: 1000;
}

.footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, #4e73df, transparent);
}

.company-logo .bg-primary {
  background: linear-gradient(45deg, #4e73df, #224abe) !important;
  box-shadow: 0 2px 8px rgba(78, 115, 223, 0.3);
  transition: all 0.3s ease;
}

.company-logo:hover .bg-primary {
  transform: scale(1.1);
  box-shadow: 0 4px 12px rgba(78, 115, 223, 0.4);
}

.hover-primary {
  transition: all 0.3s ease;
  position: relative;
}

.hover-primary:hover {
  color: #4e73df !important;
  transform: translateY(-1px);
}

.hover-primary::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(45deg, #4e73df, #224abe);
  transition: width 0.3s ease;
}

.hover-primary:hover::after {
  width: 100%;
}

.social-links .btn {
  width: 35px;
  height: 35px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  border-width: 2px;
}

.social-links .btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.social-links .btn-outline-primary:hover {
  background: linear-gradient(45deg, #4e73df, #224abe);
  border-color: #4e73df;
}

.social-links .btn-outline-info:hover {
  background: linear-gradient(45deg, #36b9cc, #1a8997);
  border-color: #36b9cc;
}

.social-links .btn-outline-danger:hover {
  background: linear-gradient(45deg, #e74a3b, #be2617);
  border-color: #e74a3b;
}

.social-links .btn-outline-success:hover {
  background: linear-gradient(45deg, #1cc88a, #13855c);
  border-color: #1cc88a;
}

.status-indicator .badge {
  font-size: 0.75rem;
  padding: 0.5rem 0.75rem;
  background: linear-gradient(45deg, #1cc88a, #13855c) !important;
  border: none;
  box-shadow: 0 2px 8px rgba(28, 200, 138, 0.3);
}

.status-indicator .badge i {
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}

.version-info {
  background: rgba(78, 115, 223, 0.05);
  padding: 0.5rem 1rem;
  border-radius: 20px;
  border: 1px solid rgba(78, 115, 223, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer .row > div {
    text-align: center !important;
  }
  
  .social-links {
    margin-bottom: 1rem;
  }
  
  .version-info {
    margin-top: 1rem;
  }
  
  .footer .d-flex {
    flex-direction: column;
    gap: 0.5rem;
  }
}

/* Smooth animations */
.footer * {
  transition: all 0.3s ease;
}

/* Hover effects for links */
.footer a:hover {
  text-decoration: none;
}

/* Custom scrollbar for footer */
.footer::-webkit-scrollbar {
  width: 6px;
}

.footer::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.footer::-webkit-scrollbar-thumb {
  background: #4e73df;
  border-radius: 3px;
}

.footer::-webkit-scrollbar-thumb:hover {
  background: #224abe;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Simulate response time update
  function updateResponseTime() {
    const responseTimeElement = document.getElementById('responseTime');
    if (responseTimeElement) {
      const time = (Math.random() * 0.5 + 0.1).toFixed(1);
      responseTimeElement.textContent = time + 's';
    }
  }
  
  // Update response time every 30 seconds
  setInterval(updateResponseTime, 30000);
  
  // Add click effects to social buttons
  const socialButtons = document.querySelectorAll('.social-links .btn');
  socialButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      // Add ripple effect
      const ripple = document.createElement('span');
      ripple.style.position = 'absolute';
      ripple.style.borderRadius = '50%';
      ripple.style.background = 'rgba(255,255,255,0.6)';
      ripple.style.transform = 'scale(0)';
      ripple.style.animation = 'ripple 0.6s linear';
      ripple.style.left = (e.offsetX - 10) + 'px';
      ripple.style.top = (e.offsetY - 10) + 'px';
      ripple.style.width = '20px';
      ripple.style.height = '20px';
      
      this.style.position = 'relative';
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });
  
  // Add hover effects to company logo
  const companyLogo = document.querySelector('.company-logo');
  if (companyLogo) {
    companyLogo.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
    });
    
    companyLogo.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  }
});

// Add ripple animation
const style = document.createElement('style');
style.textContent = `
  @keyframes ripple {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
`;
document.head.appendChild(style);
</script>