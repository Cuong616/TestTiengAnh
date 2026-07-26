<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — TiếngAnh Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    :root {
        --bg:       #0d0d1a; --bg2: #13132b; --bg3: #1a1a35;
        --primary:  #6c63ff; --primary-d: #4f46e5; --primary-l: #8b85ff;
        --accent:   #f59e0b; --green: #10b981; --red: #ef4444; --blue: #3b82f6;
        --border:   rgba(108,99,255,0.18);
        --text:     #f1f5f9; --text2: #94a3b8; --text3: #64748b;
        --sidebar-w: 240px; --topbar-h: 60px;
        --radius: 12px; --tr: all 0.25s cubic-bezier(.4,0,.2,1);
    }
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
    html{scroll-behavior:smooth;}
    body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;overflow-x:hidden;}
    a{text-decoration:none;color:inherit;}
    button{cursor:pointer;border:none;background:none;font-family:inherit;}
    ::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-track{background:var(--bg);} ::-webkit-scrollbar-thumb{background:var(--primary-d);border-radius:99px;}

    /* ── SIDEBAR ── */
    .adm-sidebar{position:fixed;top:0;left:0;width:var(--sidebar-w);height:100vh;background:var(--bg2);border-right:1px solid var(--border);display:flex;flex-direction:column;z-index:100;overflow:hidden;}
    .adm-brand{display:flex;align-items:center;gap:10px;padding:18px 16px;border-bottom:1px solid var(--border);}
    .adm-brand-icon{width:34px;height:34px;border-radius:9px;background:linear-gradient(135deg,var(--primary),var(--primary-d));display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;flex-shrink:0;}
    .adm-brand-text{font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;font-weight:800;}
    .adm-brand-text .t1{color:var(--text);}
    .adm-brand-text .t2{color:var(--primary-l);}
    .adm-brand-badge{font-size:9px;font-weight:700;background:var(--accent);color:#000;padding:1px 6px;border-radius:99px;margin-left:4px;letter-spacing:.5px;}

    .adm-nav{flex:1;overflow-y:auto;padding:10px 8px;}
    .nav-group{margin-bottom:4px;}
    .nav-group-label{font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--text3);padding:10px 8px 4px;}
    .adm-nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;font-size:13px;font-weight:500;color:var(--text2);transition:var(--tr);cursor:pointer;}
    .adm-nav-item:hover{background:rgba(108,99,255,0.1);color:var(--text);}
    .adm-nav-item.active{background:linear-gradient(135deg,rgba(108,99,255,.22),rgba(108,99,255,.1));color:var(--primary-l);font-weight:600;}
    .adm-nav-item .nav-icon{width:18px;text-align:center;font-size:13px;}
    .adm-nav-item .nav-badge{margin-left:auto;font-size:10px;font-weight:700;background:var(--green);color:#fff;padding:1px 7px;border-radius:99px;}

    .adm-sidebar-footer{padding:10px 8px;border-top:1px solid var(--border);}
    .adm-user-card{display:flex;align-items:center;gap:9px;padding:10px;border-radius:9px;background:rgba(108,99,255,0.08);}
    .adm-avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;color:#fff;flex-shrink:0;}
    .adm-user-info{flex:1;min-width:0;}
    .adm-user-name{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
    .adm-user-role{font-size:10px;color:var(--accent);font-weight:700;text-transform:uppercase;letter-spacing:.5px;}

    /* ── TOPBAR ── */
    .adm-topbar{height:var(--topbar-h);background:rgba(13,13,26,.9);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 24px;gap:14px;position:sticky;top:0;z-index:90;}
    .adm-topbar-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:16px;font-weight:700;flex:1;}
    .adm-topbar-right{display:flex;align-items:center;gap:10px;margin-left:auto;}
    .adm-view-site{display:flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--text2);padding:6px 12px;border-radius:99px;border:1px solid var(--border);transition:var(--tr);}
    .adm-view-site:hover{color:var(--primary-l);border-color:var(--primary);}

    /* ── MAIN ── */
    .adm-main{margin-left:var(--sidebar-w);min-height:100vh;display:flex;flex-direction:column;}
    .adm-content{flex:1;padding:24px;}

    /* ── CARDS ── */
    .adm-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;transition:var(--tr);}
    .adm-card:hover{border-color:rgba(108,99,255,.3);}
    .adm-stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px;}
    .adm-stat{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;}
    .adm-stat-icon{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
    .adm-stat-val{font-size:24px;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;letter-spacing:-1px;}
    .adm-stat-label{font-size:11px;color:var(--text2);margin-top:2px;}
    .si-purple{background:rgba(108,99,255,.15);color:var(--primary-l);}
    .si-green{background:rgba(16,185,129,.15);color:var(--green);}
    .si-amber{background:rgba(245,158,11,.15);color:var(--accent);}
    .si-blue{background:rgba(59,130,246,.15);color:var(--blue);}
    .si-red{background:rgba(239,68,68,.15);color:var(--red);}

    /* ── TABLE ── */
    .adm-table-wrap{overflow-x:auto;border-radius:var(--radius);border:1px solid var(--border);}
    .adm-table{width:100%;border-collapse:collapse;}
    .adm-table th{background:var(--bg3);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--text3);padding:12px 16px;text-align:left;border-bottom:1px solid var(--border);}
    .adm-table td{padding:13px 16px;border-bottom:1px solid rgba(255,255,255,.04);font-size:13px;vertical-align:middle;}
    .adm-table tr:last-child td{border-bottom:none;}
    .adm-table tr:hover td{background:rgba(108,99,255,.04);}

    /* ── BADGES ── */
    .badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:700;}
    .badge-green {background:rgba(16,185,129,.15);color:var(--green);}
    .badge-amber {background:rgba(245,158,11,.15);color:var(--accent);}
    .badge-gray  {background:rgba(100,116,139,.15);color:var(--text3);}
    .badge-blue  {background:rgba(59,130,246,.15);color:var(--blue);}
    .badge-red   {background:rgba(239,68,68,.12);color:var(--red);}
    .badge-purple{background:rgba(108,99,255,.15);color:var(--primary-l);}

    /* ── BUTTONS ── */
    .btn{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;font-family:inherit;transition:var(--tr);cursor:pointer;border:none;}
    .btn-primary{background:linear-gradient(135deg,var(--primary),var(--primary-d));color:#fff;box-shadow:0 3px 12px rgba(108,99,255,.3);}
    .btn-primary:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(108,99,255,.4);}
    .btn-ghost{background:rgba(255,255,255,.06);color:var(--text2);border:1px solid var(--border);}
    .btn-ghost:hover{background:rgba(255,255,255,.1);color:var(--text);}
    .btn-danger{background:rgba(239,68,68,.12);color:var(--red);border:1px solid rgba(239,68,68,.2);}
    .btn-danger:hover{background:rgba(239,68,68,.2);}
    .btn-sm{padding:5px 12px;font-size:12px;}
    .btn-xs{padding:4px 9px;font-size:11px;border-radius:6px;}

    /* ── FORM ── */
    .adm-form-group{margin-bottom:16px;}
    .adm-form-label{display:block;font-size:12px;font-weight:600;color:var(--text2);margin-bottom:7px;text-transform:uppercase;letter-spacing:.5px;}
    .adm-input,.adm-select,.adm-textarea{width:100%;padding:10px 12px;background:rgba(255,255,255,.05);border:1.5px solid var(--border);border-radius:9px;color:var(--text);font-size:14px;font-family:inherit;outline:none;transition:var(--tr);}
    .adm-input::placeholder,.adm-textarea::placeholder{color:var(--text3);}
    .adm-input:focus,.adm-select:focus,.adm-textarea:focus{border-color:var(--primary);background:rgba(108,99,255,.06);box-shadow:0 0 0 3px rgba(108,99,255,.12);}
    .adm-select option{background:var(--bg2);color:var(--text);}
    .adm-textarea{resize:vertical;min-height:100px;}
    .adm-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
    .adm-form-grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;}

    /* ── PAGE HEADER ── */
    .adm-page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;}
    .adm-page-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;}
    .adm-breadcrumb{font-size:12px;color:var(--text3);margin-top:3px;}
    .adm-breadcrumb a{color:var(--primary-l);text-decoration:none;}

    /* ── FLASH ── */
    .adm-flash{display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:10px;font-size:13px;margin-bottom:18px;animation:slideDown .3s ease;}
    @keyframes slideDown{from{opacity:0;transform:translateY(-8px);}to{opacity:1;transform:translateY(0);}}
    .adm-flash-success{background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.25);color:#34d399;}
    .adm-flash-error  {background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.2);color:#f87171;}
    .adm-flash-close{margin-left:auto;opacity:.6;cursor:pointer;font-size:16px;}
    .adm-flash-close:hover{opacity:1;}

    /* ── SECTION ── */
    .adm-section-title{font-size:15px;font-weight:700;margin-bottom:14px;display:flex;align-items:center;gap:8px;}
    .adm-section-title i{color:var(--primary-l);}

    /* ── SEARCH & FILTER ── */
    .adm-filters{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:18px;}
    .adm-search-wrap{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,.05);border:1.5px solid var(--border);border-radius:9px;padding:8px 12px;flex:1;min-width:220px;max-width:340px;}
    .adm-search-wrap:focus-within{border-color:var(--primary);}
    .adm-search-wrap i{color:var(--text3);font-size:13px;}
    .adm-search-wrap input{background:none;border:none;outline:none;color:var(--text);font-size:13px;font-family:inherit;width:100%;}
    .adm-search-wrap input::placeholder{color:var(--text3);}

    /* ── RESPONSIVE ── */
    @media(max-width:900px){
        .adm-stat-grid{grid-template-columns:repeat(2,1fr);}
        .adm-form-grid,.adm-form-grid-3{grid-template-columns:1fr;}
    }
    @media(max-width:640px){
        .adm-sidebar{transform:translateX(-100%);}
        .adm-main{margin-left:0;}
        .adm-stat-grid{grid-template-columns:1fr;}
    }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="adm-sidebar">
    <div class="adm-brand">
        <div class="adm-brand-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="adm-brand-text">
            <span class="t1">Tiếng</span><span class="t2">Anh</span>
            <span class="adm-brand-badge">ADMIN</span>
        </div>
    </div>

    <nav class="adm-nav">
        <div class="nav-group">
            <div class="nav-group-label">Tổng quan</div>
            <a href="{{ route('admin.dashboard') }}" class="adm-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie nav-icon"></i> Bảng điều khiển
            </a>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Nội dung</div>
            <a href="{{ route('admin.courses.index') }}" class="adm-nav-item {{ request()->routeIs('admin.courses*') ? 'active' : '' }}">
                <i class="fas fa-book nav-icon"></i> Khoá học
                <span class="nav-badge">{{ \App\Models\Course::count() }}</span>
            </a>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Người dùng</div>
            <a href="{{ route('admin.users.index') }}" class="adm-nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i> Quản lý người dùng
            </a>
        </div>

        <div class="nav-group">
            <div class="nav-group-label">Hệ thống</div>
            <a href="{{ route('dashboard') }}" class="adm-nav-item">
                <i class="fas fa-globe nav-icon"></i> Xem website
            </a>
        </div>
    </nav>

    <div class="adm-sidebar-footer">
        <div class="adm-user-card">
            <div class="adm-avatar">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="adm-user-info">
                <div class="adm-user-name">{{ auth()->user()->name }}</div>
                <div class="adm-user-role">{{ auth()->user()->role }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-left:auto;">
                @csrf
                <button type="submit" title="Đăng xuất" style="color:var(--text3);padding:4px;transition:var(--tr);"
                    onmouseover="this.style.color='var(--red)'" onmouseout="this.style.color='var(--text3)'">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- MAIN -->
<main class="adm-main">
    <header class="adm-topbar">
        <div class="adm-topbar-title">@yield('topbar-title', 'Admin Panel')</div>
        <div class="adm-topbar-right">
            <a href="{{ route('dashboard') }}" class="adm-view-site" target="_blank">
                <i class="fas fa-external-link-alt"></i> Xem website
            </a>
        </div>
    </header>

    <div class="adm-content">
        @if(session('success'))
        <div class="adm-flash adm-flash-success" id="adm-flash">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <span class="adm-flash-close" onclick="this.parentElement.remove()">&times;</span>
        </div>
        @endif
        @if(session('error'))
        <div class="adm-flash adm-flash-error" id="adm-flash">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
            <span class="adm-flash-close" onclick="this.parentElement.remove()">&times;</span>
        </div>
        @endif

        @yield('content')
    </div>
</main>

<script>
// Auto-dismiss flash
const flash = document.getElementById('adm-flash');
if (flash) setTimeout(() => {
    flash.style.transition = 'opacity .4s,transform .4s';
    flash.style.opacity = '0'; flash.style.transform = 'translateY(-8px)';
    setTimeout(() => flash.remove(), 400);
}, 4000);

// Confirm delete
document.querySelectorAll('[data-confirm]').forEach(btn => {
    btn.addEventListener('click', e => {
        if (!confirm(btn.dataset.confirm)) e.preventDefault();
    });
});
</script>
@yield('scripts')
</body>
</html>
