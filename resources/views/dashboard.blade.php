@extends('layouts.app')
@section('title', 'Trang chủ')

@section('breadcrumb')
  <i class="fas fa-home" style="color:var(--primary-light);margin-right:6px;"></i>
  <span>Trang chủ</span>
@endsection

@section('content')

{{-- ===== HERO SECTION ===== --}}
@auth
{{-- Đã đăng nhập --}}
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">Chào mừng trở lại, <span>{{ auth()->user()->name }}! 👋</span></div>
  <div class="page-hero-sub">Bạn đang trong chuỗi học <strong style="color:var(--accent)">7 ngày liên tiếp</strong>. Hãy tiếp tục giữ phong độ!</div>
  <div class="hero-actions">
    <a href="{{ route('vocabulary') }}" class="btn btn-primary"><i class="fas fa-play"></i> Tiếp tục học</a>
    <a href="{{ route('exams') }}" class="btn btn-outline"><i class="fas fa-pen"></i> Làm bài kiểm tra</a>
  </div>
</div>

{{-- STATS --}}
<div class="grid-4" style="margin-bottom:28px;">
  <div class="stat-card purple animate-fade-up delay-1">
    <div class="stat-icon purple"><i class="fas fa-book-open"></i></div>
    <div class="stat-info">
      <div class="stat-value" data-count="248">248</div>
      <div class="stat-label">Từ đã học</div>
      <div class="stat-change up"><i class="fas fa-arrow-up"></i> +12 hôm nay</div>
    </div>
  </div>
  <div class="stat-card amber animate-fade-up delay-2">
    <div class="stat-icon amber"><i class="fas fa-fire"></i></div>
    <div class="stat-info">
      <div class="stat-value" data-count="7">7</div>
      <div class="stat-label">Ngày liên tiếp</div>
      <div class="stat-change up"><i class="fas fa-arrow-up"></i> Kỷ lục cá nhân!</div>
    </div>
  </div>
  <div class="stat-card green animate-fade-up delay-3">
    <div class="stat-icon green"><i class="fas fa-star"></i></div>
    <div class="stat-info">
      <div class="stat-value" data-count="1240">1,240</div>
      <div class="stat-label">Điểm XP</div>
      <div class="stat-change up"><i class="fas fa-arrow-up"></i> +80 tuần này</div>
    </div>
  </div>
  <div class="stat-card blue animate-fade-up delay-4">
    <div class="stat-icon blue"><i class="fas fa-check-circle"></i></div>
    <div class="stat-info">
      <div class="stat-value" data-count="34">34</div>
      <div class="stat-label">Bài hoàn thành</div>
      <div class="stat-change up"><i class="fas fa-arrow-up"></i> +3 tuần này</div>
    </div>
  </div>
</div>

@else
{{-- Khách chưa đăng nhập --}}
<div class="page-hero animate-fade-up" style="text-align:center;padding:48px 36px;">
  <div style="font-size:52px;margin-bottom:16px;" class="animate-float">🎓</div>
  <div class="page-hero-title" style="font-size:34px;text-align:center;">Chào mừng đến với <span>TiếngAnh</span></div>
  <div class="page-hero-sub" style="text-align:center;max-width:600px;margin:0 auto 24px;">
    Nền tảng học tiếng Anh thông minh với lộ trình cá nhân hóa. Học từ vựng, ngữ pháp, luyện nghe, nói, đọc, viết — tất cả trong một nơi.
  </div>
  <div class="hero-actions" style="justify-content:center;">
    <a href="{{ route('register') }}" class="btn btn-primary" style="padding:14px 32px;font-size:15px;">
      <i class="fas fa-user-plus"></i> Bắt đầu miễn phí
    </a>
    <a href="{{ route('login') }}" class="btn btn-outline" style="padding:14px 28px;font-size:15px;">
      <i class="fas fa-sign-in-alt"></i> Đăng nhập
    </a>
  </div>
</div>

{{-- Feature highlights --}}
<div class="grid-4" style="margin-bottom:28px;">
  @foreach([
    ['icon'=>'📚','title'=>'5,000+ Từ vựng','desc'=>'Theo chủ đề, cấp độ với SRS','color'=>'rgba(108,99,255,0.15)'],
    ['icon'=>'🎧','title'=>'Luyện Nghe','desc'=>'Podcast, tin tức, bài hát','color'=>'rgba(59,130,246,0.15)'],
    ['icon'=>'🤖','title'=>'AI Phân tích','desc'=>'Phát âm & ngữ pháp thông minh','color'=>'rgba(16,185,129,0.15)'],
    ['icon'=>'🏆','title'=>'Bảng xếp hạng','desc'=>'Cạnh tranh với cộng đồng','color'=>'rgba(245,158,11,0.15)'],
  ] as $i => $f)
  <div class="stat-card animate-fade-up delay-{{ $i+1 }}" style="flex-direction:column;align-items:flex-start;gap:12px;">
    <div style="font-size:32px;padding:10px;background:{{ $f['color'] }};border-radius:12px;">{{ $f['icon'] }}</div>
    <div>
      <div style="font-size:15px;font-weight:700;margin-bottom:4px;">{{ $f['title'] }}</div>
      <div style="font-size:12px;color:var(--text-muted);">{{ $f['desc'] }}</div>
    </div>
  </div>
  @endforeach
</div>
@endauth

{{-- ===== SKILLS (always visible) ===== --}}
<div class="grid-2" style="margin-bottom:28px;">
  <div>
    <div class="section-header">
      <div class="section-title">Kỹ năng học tập</div>
      <a href="#" class="section-link">Xem tất cả <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="grid-2" style="gap:14px;">
      @foreach([
        ['icon'=>'fas fa-headphones','name'=>'Nghe','desc'=>'Luyện nghe mọi cấp độ','route'=>'listening','color'=>'rgba(59,130,246,0.15)','c'=>'#3b82f6','pct'=>65,'class'=>'blue'],
        ['icon'=>'fas fa-microphone','name'=>'Nói','desc'=>'Luyện phát âm chuẩn','route'=>'speaking','color'=>'rgba(16,185,129,0.15)','c'=>'#10b981','pct'=>42,'class'=>'green'],
        ['icon'=>'fas fa-file-alt','name'=>'Đọc','desc'=>'Đọc hiểu văn bản','route'=>'reading','color'=>'rgba(108,99,255,0.15)','c'=>'var(--primary-light)','pct'=>78,'class'=>'purple'],
        ['icon'=>'fas fa-edit','name'=>'Viết','desc'=>'Viết đúng ngữ pháp','route'=>'writing','color'=>'rgba(245,158,11,0.15)','c'=>'var(--accent)','pct'=>30,'class'=>'amber'],
      ] as $i => $sk)
      <a href="{{ route($sk['route']) }}" class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-decoration:none;">
        <div class="skill-top">
          <div class="skill-icon-wrap" style="background:{{ $sk['color'] }};color:{{ $sk['c'] }};"><i class="{{ $sk['icon'] }}"></i></div>
          <i class="fas fa-arrow-up-right-from-square skill-arrow"></i>
        </div>
        <div class="skill-name">{{ $sk['name'] }}</div>
        <div class="skill-desc">{{ $sk['desc'] }}</div>
        <div class="progress-wrap">
          <div class="progress-info"><span>Tiến độ</span><span style="color:{{ $sk['c'] }}">{{ $sk['pct'] }}%</span></div>
          <div class="progress-bar"><div class="progress-fill {{ $sk['class'] }}" style="width:{{ $sk['pct'] }}%" data-width="{{ $sk['pct'] }}%"></div></div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

  <div style="display:flex;flex-direction:column;gap:18px;">
    {{-- Word of the day --}}
    <div class="word-card animate-fade-up delay-2">
      <div style="font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text-muted);margin-bottom:10px;">
        <i class="fas fa-sun" style="color:var(--accent);margin-right:4px;"></i> TỪ TRONG NGÀY
      </div>
      <div class="word-en">Perseverance</div>
      <div class="word-ipa">/ˌpɜː.sɪˈvɪər.əns/</div>
      <div class="word-vi">Sự kiên trì, bền bỉ</div>
      <div class="word-example">"Success requires perseverance and hard work."</div>
      <div style="margin-top:14px;display:flex;gap:8px;">
        <button class="btn btn-primary" style="font-size:12px;padding:7px 14px;"><i class="fas fa-volume-up"></i> Nghe</button>
        @auth
        <button class="btn btn-ghost" style="font-size:12px;padding:7px 14px;"><i class="fas fa-bookmark"></i> Lưu</button>
        @else
        <a href="{{ route('register') }}" class="btn btn-ghost" style="font-size:12px;padding:7px 14px;"><i class="fas fa-bookmark"></i> Đăng ký để lưu</a>
        @endauth
      </div>
    </div>

    {{-- Streak Calendar --}}
    <div class="card animate-fade-up delay-3">
      <div class="section-header" style="margin-bottom:14px;">
        <div class="section-title" style="font-size:15px;"><i class="fas fa-calendar-check" style="color:var(--accent);margin-right:6px;"></i> Chuỗi học tập</div>
        @auth
        <span style="font-size:12px;color:var(--accent);font-weight:700;">🔥 7 ngày</span>
        @else
        <a href="{{ route('register') }}" style="font-size:12px;color:var(--primary-light);font-weight:600;">Đăng ký theo dõi</a>
        @endauth
      </div>
      <div class="streak-grid">
        @for($i = 0; $i < 35; $i++)
          <div class="streak-day {{ $i < 7 ? 'done' : ($i === 7 ? 'today' : '') }}"></div>
        @endfor
      </div>
      @guest
      <div style="font-size:12px;color:var(--text-muted);margin-top:10px;text-align:center;">
        <i class="fas fa-lock" style="margin-right:4px;"></i>
        <a href="{{ route('register') }}" style="color:var(--primary-light);">Đăng ký</a> để lưu chuỗi học tập của bạn
      </div>
      @endguest
    </div>
  </div>
</div>

{{-- ===== RECENT LESSONS + LEADERBOARD ===== --}}
<div class="grid-2">
  <div class="card animate-fade-up delay-2">
    <div class="section-header">
      <div class="section-title">Bài học gần đây</div>
      <a href="{{ route('vocabulary') }}" class="section-link">Tất cả <i class="fas fa-arrow-right"></i></a>
    </div>
    <div style="display:flex;flex-direction:column;gap:8px;">
      @foreach([
        ['icon'=>'📘','color'=>'rgba(59,130,246,0.15)','title'=>'Vocabulary: Daily Life','meta'=>'Từ vựng • 15 từ','badge'=>'badge-done','label'=>'Hoàn thành'],
        ['icon'=>'🎯','color'=>'rgba(108,99,255,0.15)','title'=>'Grammar: Present Perfect','meta'=>'Ngữ pháp • 20 phút','badge'=>'badge-ongoing','label'=>'Đang học'],
        ['icon'=>'🎧','color'=>'rgba(16,185,129,0.15)','title'=>'Listening: News Headlines','meta'=>'Nghe • 10 phút','badge'=>'badge-ongoing','label'=>'Đang học'],
        ['icon'=>'📝','color'=>'rgba(245,158,11,0.15)','title'=>'Writing: Email Formal','meta'=>'Viết • 25 phút','badge'=>'badge-locked','label'=>'Chưa mở'],
      ] as $lesson)
      <div class="lesson-card">
        <div class="lesson-thumb" style="background:{{ $lesson['color'] }}">{{ $lesson['icon'] }}</div>
        <div class="lesson-body">
          <div class="lesson-title">{{ $lesson['title'] }}</div>
          <div class="lesson-meta">{{ $lesson['meta'] }}</div>
        </div>
        <div class="lesson-badge {{ $lesson['badge'] }}">{{ $lesson['label'] }}</div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="card animate-fade-up delay-3">
    <div class="section-header">
      <div class="section-title">🏆 Bảng xếp hạng</div>
      <a href="{{ route('leaderboard') }}" class="section-link">Xem thêm</a>
    </div>
    <div style="display:flex;flex-direction:column;gap:2px;">
      @foreach([
        ['rank'=>'🥇','name'=>'Minh Tuấn','pts'=>'2,840','color'=>'#f59e0b','label'=>'#1'],
        ['rank'=>'🥈','name'=>'Thu Hà','pts'=>'2,610','color'=>'#94a3b8','label'=>'#2'],
        ['rank'=>'🥉','name'=>'Hữu Nam','pts'=>'2,200','color'=>'#b45309','label'=>'#3'],
        ['rank'=>'4','name'=>'Lan Anh','pts'=>'1,980','color'=>'var(--text-muted)','label'=>'#4'],
        ['rank'=>'5','name'=>auth()->check() ? auth()->user()->name : 'Bạn','pts'=>'1,240','color'=>'var(--primary-light)','label'=>'#5','self'=>true],
      ] as $user)
      <div class="rank-row" style="{{ !empty($user['self']) ? 'background:rgba(108,99,255,0.1);border-radius:10px;' : '' }}">
        <div class="rank-num">{{ $user['rank'] }}</div>
        <div class="rank-avatar" style="background:linear-gradient(135deg,{{ $user['color'] }},{{ $user['color'] }}88);">
          {{ mb_substr($user['name'], 0, 1) }}
        </div>
        <div class="rank-info">
          <div class="rank-name">{{ $user['name'] }}</div>
          <div class="rank-pts">{{ $user['pts'] }} XP</div>
        </div>
        <div class="rank-badge" style="color:{{ $user['color'] }}">{{ $user['label'] }}</div>
      </div>
      @endforeach
    </div>
    @guest
    <div style="margin-top:14px;padding:12px;background:rgba(108,99,255,0.06);border-radius:10px;text-align:center;font-size:13px;color:var(--text-muted);">
      <i class="fas fa-trophy" style="color:var(--accent);margin-right:6px;"></i>
      <a href="{{ route('register') }}" style="color:var(--primary-light);font-weight:600;">Đăng ký</a> để tham gia xếp hạng!
    </div>
    @endguest
  </div>
</div>
@endsection
