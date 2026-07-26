@extends('layouts.auth')
@section('title', 'Đăng nhập')

@section('content')
<div class="auth-title">Chào mừng trở lại 👋</div>
<div class="auth-subtitle">Đăng nhập để tiếp tục hành trình học tiếng Anh</div>

{{-- General error --}}
@if($errors->has('email') && !$errors->has('password'))
<div class="alert alert-error">
    <i class="fas fa-exclamation-circle"></i>
    <span>{{ $errors->first('email') }}</span>
</div>
@endif

<form method="POST" action="{{ route('login') }}" id="loginForm">
    @csrf

    {{-- Email --}}
    <div class="form-group">
        <label class="form-label" for="email">Địa chỉ Email</label>
        <div class="input-wrap">
            <i class="fas fa-envelope input-icon"></i>
            <input
                type="email"
                id="email"
                name="email"
                class="form-input {{ $errors->has('email') ? 'input-error' : '' }}"
                placeholder="example@email.com"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >
        </div>
        @error('email')
        <div class="field-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="form-group">
        <label class="form-label" for="password">Mật khẩu</label>
        <div class="input-wrap">
            <i class="fas fa-lock input-icon"></i>
            <input
                type="password"
                id="password"
                name="password"
                class="form-input {{ $errors->has('password') ? 'input-error' : '' }}"
                placeholder="Nhập mật khẩu"
                autocomplete="current-password"
                required
            >
            <button type="button" class="pw-toggle" tabindex="-1">
                <i class="fas fa-eye"></i>
            </button>
        </div>
        @error('password')
        <div class="field-error"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
        @enderror
    </div>

    {{-- Remember + Forgot --}}
    <div class="form-row">
        <label class="checkbox-label" for="remember">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="checkbox-box"></span>
            Ghi nhớ đăng nhập
        </label>
        <a href="#" class="forgot-link">Quên mật khẩu?</a>
    </div>

    <button type="submit" class="btn-submit" id="loginBtn">
        <i class="fas fa-sign-in-alt"></i>
        <span>Đăng nhập</span>
    </button>
</form>

<div class="auth-divider">hoặc đăng nhập bằng</div>

<button class="social-btn">
    <svg width="18" height="18" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
    Tiếp tục với Google
</button>
@endsection

@section('footer')
<div class="auth-footer">
    Chưa có tài khoản?
    <a href="{{ route('register') }}">Đăng ký ngay</a>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('loginForm').addEventListener('submit', function () {
    const btn = document.getElementById('loginBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Đang đăng nhập...</span>';
    btn.disabled = true;
});
</script>
@endsection
