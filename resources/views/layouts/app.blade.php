<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="TiếngAnh - Nền tảng học tiếng Anh thông minh, hiệu quả với lộ trình cá nhân hóa">
    <title>@yield('title', 'TiếngAnh') — Học Tiếng Anh Thông Minh</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>

<!-- ═══════════════════════════════════════════ SIDEBAR ═══ -->
<aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-logo" style="text-decoration:none;">
            <div class="logo-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="logo-text">
                <span class="logo-primary">Tiếng</span><span class="logo-accent">Anh</span>
            </div>
        </a>
        <button class="sidebar-toggle" id="sidebarToggle" title="Đóng/Mở menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Nav -->
    <nav class="sidebar-nav">
        <div class="nav-section">
            <span class="nav-section-label">Tổng quan</span>
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-home"></i></span>
                <span class="nav-label">Trang chủ</span>
                <span class="nav-indicator"></span>
            </a>
            @auth
            <a href="{{ route('profile') }}" class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-user-circle"></i></span>
                <span class="nav-label">Hồ sơ</span>
            </a>
            @endauth
            <a href="{{ route('progress') }}" class="nav-item {{ request()->routeIs('progress') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
                <span class="nav-label">Tiến độ</span>
                <span class="nav-badge">Mới</span>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Học tập</span>
            <a href="{{ route('vocabulary') }}" class="nav-item {{ request()->routeIs('vocabulary*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-book-open"></i></span>
                <span class="nav-label">Từ vựng</span>
            </a>
            <a href="{{ route('grammar') }}" class="nav-item {{ request()->routeIs('grammar*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-pen-nib"></i></span>
                <span class="nav-label">Ngữ pháp</span>
            </a>
            <a href="{{ route('listening') }}" class="nav-item {{ request()->routeIs('listening*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-headphones"></i></span>
                <span class="nav-label">Nghe</span>
            </a>
            <a href="{{ route('speaking') }}" class="nav-item {{ request()->routeIs('speaking*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-microphone"></i></span>
                <span class="nav-label">Nói</span>
            </a>
            <a href="{{ route('reading') }}" class="nav-item {{ request()->routeIs('reading*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                <span class="nav-label">Đọc</span>
            </a>
            <a href="{{ route('writing') }}" class="nav-item {{ request()->routeIs('writing*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-edit"></i></span>
                <span class="nav-label">Viết</span>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Luyện tập</span>
            <a href="{{ route('exercises') }}" class="nav-item {{ request()->routeIs('exercises*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-tasks"></i></span>
                <span class="nav-label">Bài tập</span>
            </a>
            <a href="{{ route('flashcards') }}" class="nav-item {{ request()->routeIs('flashcards*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-layer-group"></i></span>
                <span class="nav-label">Flashcard</span>
            </a>
            <a href="{{ route('exams') }}" class="nav-item {{ request()->routeIs('exams*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-trophy"></i></span>
                <span class="nav-label">Kiểm tra</span>
            </a>
            <a href="{{ route('leaderboard') }}" class="nav-item {{ request()->routeIs('leaderboard') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-ranking-star"></i></span>
                <span class="nav-label">Bảng xếp hạng</span>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Hỗ trợ</span>
            @auth
            <a href="{{ route('settings') }}" class="nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-cog"></i></span>
                <span class="nav-label">Cài đặt</span>
            </a>
            @endauth
            <a href="#" class="nav-item">
                <span class="nav-icon"><i class="fas fa-question-circle"></i></span>
                <span class="nav-label">Trợ giúp</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        @auth
        {{-- Logged-in user --}}
        <div class="user-avatar-mini">
            <div class="avatar-img" style="font-weight:800;font-size:15px;">
                {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="user-mini-info">
                <span class="user-mini-name">{{ auth()->user()->name }}</span>
                <span class="user-mini-level" style="font-size:10px;color:var(--text-muted);">{{ auth()->user()->email }}</span>
            </div>
            <div class="user-mini-actions">
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn" title="Đăng xuất">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
        @else
        {{-- Guest --}}
        <div style="display:flex;flex-direction:column;gap:8px;padding:4px 0;">
            <a href="{{ route('login') }}" class="btn btn-outline" style="width:100%;justify-content:center;font-size:13px;border-radius:10px;padding:9px;">
                <i class="fas fa-sign-in-alt"></i>
                <span class="nav-label">Đăng nhập</span>
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary" style="width:100%;justify-content:center;font-size:13px;border-radius:10px;padding:9px;">
                <i class="fas fa-user-plus"></i>
                <span class="nav-label">Đăng ký</span>
            </a>
        </div>
        @endauth
    </div>

</aside>

<!-- Overlay mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ═══════════════════════════════════════ MAIN CONTENT ═══ -->
<main class="main-content" id="mainContent">

    <!-- Topbar -->
    <header class="topbar">
        <div class="topbar-left">
            <button class="topbar-toggle" id="topbarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="breadcrumb">
                @yield('breadcrumb')
            </div>
        </div>

        <div class="topbar-right">
            <!-- Search -->
            <div class="topbar-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Tìm kiếm bài học, từ vựng..." id="globalSearch">
            </div>

            @auth
            {{-- Logged-in: show streak, XP, notif, user dropdown --}}
            <div class="streak-badge" title="Chuỗi học liên tiếp">
                <i class="fas fa-fire"></i>
                <span>7 ngày</span>
            </div>
            <div class="xp-badge" title="Điểm kinh nghiệm">
                <i class="fas fa-star"></i>
                <span>1,240 XP</span>
            </div>
            <div class="topbar-icon-btn" id="notifBtn" title="Thông báo">
                <i class="fas fa-bell"></i>
                <span class="notif-dot"></span>
            </div>
            <!-- User Dropdown -->
            <div class="topbar-user" id="userMenuBtn" style="position:relative;">
                <div class="topbar-avatar" style="font-weight:800;font-size:14px;">
                    {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                </div>
                <span style="font-size:13px;font-weight:600;max-width:110px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                    {{ auth()->user()->name }}
                </span>
                <i class="fas fa-chevron-down" style="font-size:10px;opacity:0.5;"></i>
                <!-- Dropdown Menu -->
                <div class="user-dropdown" id="userDropdown">
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="fas fa-user"></i> Hồ sơ của tôi
                    </a>
                    <a href="{{ route('settings') }}" class="dropdown-item">
                        <i class="fas fa-cog"></i> Cài đặt
                    </a>
                    <a href="{{ route('progress') }}" class="dropdown-item">
                        <i class="fas fa-chart-line"></i> Tiến độ học
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item dropdown-logout">
                            <i class="fas fa-sign-out-alt"></i> Đăng xuất
                        </button>
                    </form>
                </div>
            </div>

            @else
            {{-- Guest: show login/register buttons --}}
            <a href="{{ route('login') }}" class="btn btn-ghost" style="font-size:13px;padding:8px 16px;border-radius:99px;">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary" style="font-size:13px;padding:8px 18px;border-radius:99px;">
                <i class="fas fa-user-plus"></i> Đăng ký
            </a>
            @endauth
        </div>
    </header>

    <!-- Page Content -->
    <div class="page-content">
        {{-- Flash messages --}}
        @if(session('success'))
        <div class="flash-alert flash-success" id="flashMsg">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <button class="flash-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
        @endif
        @if(session('error'))
        <div class="flash-alert flash-error" id="flashMsg">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
            <button class="flash-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
        @endif

        @yield('content')
    </div>
</main>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
