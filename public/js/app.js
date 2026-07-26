// ===== SIDEBAR TOGGLE =====
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const sidebarToggle = document.getElementById('sidebarToggle');
const topbarToggle = document.getElementById('topbarToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');

// ===== USER DROPDOWN =====
const userMenuBtn = document.getElementById('userMenuBtn');
const userDropdown = document.getElementById('userDropdown');
if (userMenuBtn && userDropdown) {
  userMenuBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    userDropdown.classList.toggle('open');
  });
  document.addEventListener('click', () => userDropdown.classList.remove('open'));
}

// ===== AUTO-DISMISS FLASH =====
const flashMsg = document.getElementById('flashMsg');
if (flashMsg) {
  setTimeout(() => {
    flashMsg.style.transition = 'opacity 0.5s, transform 0.5s';
    flashMsg.style.opacity = '0';
    flashMsg.style.transform = 'translateY(-10px)';
    setTimeout(() => flashMsg.remove(), 500);
  }, 4000);
}



function toggleSidebar() {
  if (window.innerWidth <= 768) {
    sidebar.classList.toggle('mobile-open');
  } else {
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
  }
}

sidebarToggle && sidebarToggle.addEventListener('click', toggleSidebar);
topbarToggle && topbarToggle.addEventListener('click', toggleSidebar);
sidebarOverlay && sidebarOverlay.addEventListener('click', () => {
  sidebar.classList.remove('mobile-open');
});

// ===== ANIMATE ON SCROLL =====
const observer = new IntersectionObserver((entries) => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) {
      e.target.style.animationDelay = (i * 0.08) + 's';
      e.target.classList.add('animate-fade-up');
      observer.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.stat-card, .skill-card, .card, .lesson-card').forEach(el => {
  el.style.opacity = '0';
  observer.observe(el);
});

// ===== PROGRESS BARS ANIMATE =====
function animateProgressBars() {
  document.querySelectorAll('.progress-fill').forEach(bar => {
    const target = bar.dataset.width || bar.style.width;
    bar.style.width = '0';
    setTimeout(() => { bar.style.width = target; }, 200);
  });
}
window.addEventListener('load', animateProgressBars);

// ===== ACTIVE NAV =====
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', function () {
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    this.classList.add('active');
  });
});

// ===== TOPBAR SEARCH EXPAND =====
const globalSearch = document.getElementById('globalSearch');
globalSearch && globalSearch.addEventListener('focus', () => {
  globalSearch.parentElement.style.transform = 'scale(1.02)';
});
globalSearch && globalSearch.addEventListener('blur', () => {
  globalSearch.parentElement.style.transform = '';
});

// ===== RIPPLE EFFECT =====
function addRipple(e) {
  const el = e.currentTarget;
  const ripple = document.createElement('span');
  ripple.style.cssText = `
    position:absolute;border-radius:50%;
    background:rgba(255,255,255,0.12);
    transform:scale(0);animation:rippleAnim 0.6s linear;
    pointer-events:none;
  `;
  const rect = el.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);
  ripple.style.width = ripple.style.height = size + 'px';
  ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
  ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
  el.style.position = 'relative';
  el.style.overflow = 'hidden';
  el.appendChild(ripple);
  ripple.addEventListener('animationend', () => ripple.remove());
}

const rippleStyle = document.createElement('style');
rippleStyle.textContent = '@keyframes rippleAnim{to{transform:scale(4);opacity:0;}}';
document.head.appendChild(rippleStyle);

document.querySelectorAll('.btn, .nav-item, .skill-card').forEach(el => {
  el.addEventListener('click', addRipple);
});

// ===== TOOLTIP (simple) =====
document.querySelectorAll('[title]').forEach(el => {
  el.addEventListener('mouseenter', function () {
    const tip = document.createElement('div');
    tip.className = 'tooltip-popup';
    tip.textContent = this.getAttribute('title');
    tip.style.cssText = 'position:fixed;background:#1e1e3f;color:#f1f5f9;font-size:12px;padding:4px 10px;border-radius:6px;pointer-events:none;z-index:9999;transition:opacity 0.2s;';
    document.body.appendChild(tip);
    const rect = this.getBoundingClientRect();
    tip.style.top = (rect.bottom + 6) + 'px';
    tip.style.left = (rect.left + rect.width / 2 - tip.offsetWidth / 2) + 'px';
    this._tooltip = tip;
    this.removeAttribute('title');
    this._title = this.getAttribute('title');
  });
  el.addEventListener('mouseleave', function () {
    if (this._tooltip) { this._tooltip.remove(); this._tooltip = null; }
  });
});

// ===== COUNTER ANIMATION =====
function animateCounter(el) {
  const target = parseInt(el.dataset.count || el.textContent.replace(/\D/g, ''));
  const suffix = el.dataset.suffix || '';
  let current = 0;
  const step = Math.ceil(target / 50);
  const timer = setInterval(() => {
    current = Math.min(current + step, target);
    el.textContent = current.toLocaleString() + suffix;
    if (current >= target) clearInterval(timer);
  }, 25);
}
document.querySelectorAll('.stat-value[data-count]').forEach(el => {
  const obs = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) { animateCounter(el); obs.disconnect(); }
  });
  obs.observe(el);
});
