<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Đăng nhập') — TiếngAnh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #6c63ff; --primary-light: #8b85ff; --primary-dark: #4f46e5;
            --accent: #f59e0b; --accent-green: #10b981;
            --bg-dark: #0f0f1a; --bg-card: #1a1a2e;
            --border: rgba(108,99,255,0.18);
            --text-primary: #f1f5f9; --text-secondary: #94a3b8; --text-muted: #64748b;
        }
        *,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        /* Animated background orbs */
        .bg-orb {
            position: fixed; border-radius: 50%; filter: blur(80px);
            animation: orbFloat 8s ease-in-out infinite; pointer-events: none; z-index: 0;
        }
        .bg-orb-1 { width: 500px; height: 500px; top: -150px; left: -150px; background: radial-gradient(circle, rgba(108,99,255,0.18), transparent 70%); }
        .bg-orb-2 { width: 400px; height: 400px; bottom: -100px; right: -100px; background: radial-gradient(circle, rgba(245,158,11,0.12), transparent 70%); animation-delay: 3s; }
        .bg-orb-3 { width: 300px; height: 300px; top: 50%; left: 50%; transform: translate(-50%,-50%); background: radial-gradient(circle, rgba(16,185,129,0.08), transparent 70%); animation-delay: 1.5s; }
        @keyframes orbFloat { 0%,100% { transform: translate(0,0); } 33% { transform: translate(20px,-20px); } 66% { transform: translate(-15px,15px); } }
        .bg-orb-3 { animation: orbFloat3 8s ease-in-out infinite 1.5s; }
        @keyframes orbFloat3 { 0%,100% { transform: translate(-50%,-50%); } 33% { transform: translate(calc(-50% + 20px),calc(-50% - 20px)); } 66% { transform: translate(calc(-50% - 15px),calc(-50% + 15px)); } }

        /* Grid dots */
        body::before {
            content: ''; position: fixed; inset: 0;
            background-image: radial-gradient(rgba(108,99,255,0.08) 1px, transparent 1px);
            background-size: 32px 32px; pointer-events: none; z-index: 0;
        }

        .auth-container {
            position: relative; z-index: 10;
            width: 100%; max-width: 440px;
            padding: 16px;
        }
        /* Brand */
        .auth-brand {
            text-align: center; margin-bottom: 32px;
            animation: fadeInDown 0.6s ease both;
        }
        .brand-logo {
            display: inline-flex; align-items: center; gap: 10px;
            text-decoration: none; color: inherit;
        }
        .brand-icon {
            width: 46px; height: 46px; border-radius: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; color: #fff;
            box-shadow: 0 8px 24px rgba(108,99,255,0.4);
        }
        .brand-text { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 26px; font-weight: 800; }
        .brand-text span:first-child { color: var(--text-primary); }
        .brand-text span:last-child { color: var(--primary-light); }

        /* Card */
        .auth-card {
            background: rgba(26,26,46,0.85);
            backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 36px 32px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.5);
            animation: fadeInUp 0.6s ease 0.1s both;
        }
        .auth-title { font-size: 22px; font-weight: 800; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 4px; }
        .auth-subtitle { font-size: 14px; color: var(--text-muted); margin-bottom: 28px; }

        /* Form */
        .form-group { margin-bottom: 18px; }
        .form-label {
            display: block; font-size: 13px; font-weight: 600;
            color: var(--text-secondary); margin-bottom: 8px;
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); font-size: 14px; pointer-events: none;
            transition: color 0.3s;
        }
        .form-input {
            width: 100%; padding: 12px 14px 12px 42px;
            background: rgba(255,255,255,0.05);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 14px; font-family: inherit;
            outline: none; transition: all 0.3s;
        }
        .form-input::placeholder { color: var(--text-muted); }
        .form-input:focus {
            border-color: var(--primary);
            background: rgba(108,99,255,0.08);
            box-shadow: 0 0 0 3px rgba(108,99,255,0.15);
        }
        .form-input:focus ~ .input-icon,
        .input-wrap:focus-within .input-icon { color: var(--primary-light); }
        .input-wrap:focus-within .input-icon { color: var(--primary-light); }

        /* Password toggle */
        .pw-toggle {
            position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); cursor: pointer; font-size: 14px;
            background: none; border: none; padding: 4px; transition: color 0.3s;
        }
        .pw-toggle:hover { color: var(--primary-light); }

        /* Error */
        .field-error {
            font-size: 12px; color: #f87171; margin-top: 6px;
            display: flex; align-items: center; gap: 5px;
        }
        .input-error { border-color: rgba(248,113,113,0.5) !important; }
        .input-error:focus { box-shadow: 0 0 0 3px rgba(248,113,113,0.15) !important; }

        /* Alert */
        .alert {
            padding: 12px 16px; border-radius: 10px; font-size: 13px;
            margin-bottom: 20px; display: flex; align-items: flex-start; gap: 10px;
        }
        .alert-success { background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.25); color: #34d399; }
        .alert-error   { background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.25); color: #f87171; }

        /* Remember / Forgot */
        .form-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; }
        .checkbox-label {
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; color: var(--text-secondary); cursor: pointer;
        }
        .checkbox-label input[type="checkbox"] { display: none; }
        .checkbox-box {
            width: 18px; height: 18px; border-radius: 5px;
            border: 1.5px solid var(--border); background: transparent;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.2s; flex-shrink: 0;
        }
        .checkbox-label input:checked + .checkbox-box {
            background: var(--primary); border-color: var(--primary);
        }
        .checkbox-label input:checked + .checkbox-box::after {
            content: '✓'; color: #fff; font-size: 11px; font-weight: 700;
        }
        .forgot-link { font-size: 13px; color: var(--primary-light); font-weight: 600; text-decoration: none; transition: color 0.2s; }
        .forgot-link:hover { color: var(--primary); }

        /* Submit button */
        .btn-submit {
            width: 100%; padding: 13px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff; font-size: 15px; font-weight: 700;
            font-family: inherit; border: none; border-radius: 12px;
            cursor: pointer; transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(108,99,255,0.4);
            display: flex; align-items: center; justify-content: center; gap: 8px;
            position: relative; overflow: hidden;
        }
        .btn-submit::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(108,99,255,0.5); }
        .btn-submit:hover::before { opacity: 1; }
        .btn-submit:active { transform: translateY(0); }

        /* Divider */
        .auth-divider {
            display: flex; align-items: center; gap: 12px;
            margin: 22px 0; color: var(--text-muted); font-size: 12px;
        }
        .auth-divider::before, .auth-divider::after {
            content: ''; flex: 1; height: 1px; background: var(--border);
        }

        /* Social buttons */
        .social-btn {
            width: 100%; padding: 11px;
            background: rgba(255,255,255,0.05);
            border: 1.5px solid var(--border);
            border-radius: 12px; color: var(--text-secondary);
            font-size: 14px; font-weight: 600; font-family: inherit;
            cursor: pointer; transition: all 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .social-btn:hover { background: rgba(255,255,255,0.08); border-color: rgba(108,99,255,0.3); color: var(--text-primary); }

        /* Footer link */
        .auth-footer { text-align: center; margin-top: 24px; font-size: 13px; color: var(--text-muted); }
        .auth-footer a { color: var(--primary-light); font-weight: 600; text-decoration: none; }
        .auth-footer a:hover { color: var(--primary); }

        /* Password strength */
        .pw-strength { margin-top: 8px; }
        .pw-strength-bar { display: flex; gap: 4px; margin-bottom: 4px; }
        .pw-strength-seg { flex: 1; height: 3px; border-radius: 99px; background: rgba(255,255,255,0.08); transition: background 0.3s; }
        .pw-strength-label { font-size: 11px; color: var(--text-muted); }

        /* Animations */
        @keyframes fadeInUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeInDown { from { opacity:0; transform:translateY(-16px); } to { opacity:1; transform:translateY(0); } }

        @media(max-width:480px) {
            .auth-card { padding: 28px 20px; border-radius: 18px; }
            .auth-brand { margin-bottom: 24px; }
        }
    </style>
</head>
<body>
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>

    <div class="auth-container">
        <div class="auth-brand">
            <a href="{{ route('login') }}" class="brand-logo">
                <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="brand-text"><span>Tiếng</span><span>Anh</span></div>
            </a>
        </div>

        <div class="auth-card">
            @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            @yield('content')
        </div>

        @yield('footer')
    </div>

    <script>
    // Password visibility toggle
    document.querySelectorAll('.pw-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            const isPass = input.type === 'password';
            input.type = isPass ? 'text' : 'password';
            btn.innerHTML = isPass ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
        });
    });

    // Custom checkbox
    document.querySelectorAll('.checkbox-label').forEach(label => {
        label.addEventListener('click', () => {
            const cb = label.querySelector('input[type="checkbox"]');
            cb.checked = !cb.checked;
        });
    });
    </script>
    @yield('scripts')
</body>
</html>
