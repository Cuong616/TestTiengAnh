@extends('layouts.app')
@section('title', 'Tiến độ')
@section('breadcrumb')<span>Tiến độ</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">📊 <span>Tiến Độ</span> Học Tập</div>
  <div class="page-hero-sub">Theo dõi hành trình chinh phục tiếng Anh của bạn</div>
</div>

<div class="grid-4" style="margin-bottom:28px;">
  @foreach([
    ['icon'=>'fas fa-calendar-check','label'=>'Ngày học','val'=>'24','unit'=>'ngày','color'=>'purple'],
    ['icon'=>'fas fa-clock','label'=>'Thời gian','val'=>'48','unit'=>'giờ','color'=>'blue'],
    ['icon'=>'fas fa-book','label'=>'Bài hoàn thành','val'=>'34','unit'=>'bài','color'=>'green'],
    ['icon'=>'fas fa-medal','label'=>'Thành tích','val'=>'8','unit'=>'huy hiệu','color'=>'amber'],
  ] as $s)
  <div class="stat-card {{ $s['color'] }} animate-fade-up">
    <div class="stat-icon {{ $s['color'] }}"><i class="{{ $s['icon'] }}"></i></div>
    <div class="stat-info">
      <div class="stat-value">{{ $s['val'] }}</div>
      <div class="stat-label">{{ $s['unit'] }} {{ $s['label'] }}</div>
    </div>
  </div>
  @endforeach
</div>

<div class="grid-2" style="margin-bottom:28px;">
  <!-- Skills Progress -->
  <div class="card animate-fade-up delay-2">
    <div class="section-title" style="margin-bottom:20px;">Tiến độ theo kỹ năng</div>
    @foreach([
      ['name'=>'Nghe (Listening)','pct'=>65,'color'=>'#3b82f6','icon'=>'fas fa-headphones'],
      ['name'=>'Nói (Speaking)','pct'=>42,'color'=>'#10b981','icon'=>'fas fa-microphone'],
      ['name'=>'Đọc (Reading)','pct'=>78,'color'=>'var(--primary-light)','icon'=>'fas fa-book-open'],
      ['name'=>'Viết (Writing)','pct'=>30,'color'=>'var(--accent)','icon'=>'fas fa-edit'],
      ['name'=>'Từ vựng','pct'=>55,'color'=>'#ec4899','icon'=>'fas fa-font'],
      ['name'=>'Ngữ pháp','pct'=>70,'color'=>'#6366f1','icon'=>'fas fa-pen-nib'],
    ] as $sk)
    <div style="margin-bottom:16px;">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
        <i class="{{ $sk['icon'] }}" style="color:{{ $sk['color'] }};width:16px;font-size:13px;"></i>
        <span style="font-size:13px;font-weight:500;flex:1;">{{ $sk['name'] }}</span>
        <span style="font-size:13px;font-weight:700;color:{{ $sk['color'] }}">{{ $sk['pct'] }}%</span>
      </div>
      <div class="progress-bar" style="height:8px;">
        <div class="progress-fill" style="width:{{ $sk['pct'] }}%;background:linear-gradient(90deg,{{ $sk['color'] }}88,{{ $sk['color'] }});border-radius:99px;" data-width="{{ $sk['pct'] }}%"></div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Weekly Chart (CSS only) -->
  <div class="card animate-fade-up delay-3">
    <div class="section-title" style="margin-bottom:20px;">Hoạt động tuần này</div>
    <div style="display:flex;align-items:flex-end;gap:10px;height:150px;margin-bottom:10px;">
      @foreach([
        ['day'=>'T2','mins'=>25,'max'=>60],
        ['day'=>'T3','mins'=>45,'max'=>60],
        ['day'=>'T4','mins'=>30,'max'=>60],
        ['day'=>'T5','mins'=>60,'max'=>60],
        ['day'=>'T6','mins'=>50,'max'=>60],
        ['day'=>'T7','mins'=>20,'max'=>60],
        ['day'=>'CN','mins'=>35,'max'=>60],
      ] as $d)
      <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
        <div style="font-size:10px;color:var(--text-muted);font-weight:600;">{{ $d['mins'] }}p</div>
        <div style="width:100%;border-radius:6px 6px 0 0;background:linear-gradient(180deg,var(--primary-light),var(--primary-dark));height:{{ round($d['mins']/$d['max']*130) }}px;transition:height 1s ease;position:relative;" class="bar-item">
          <div style="position:absolute;inset:0;background:rgba(255,255,255,0.1);border-radius:inherit;opacity:0;" class="bar-shine"></div>
        </div>
        <div style="font-size:11px;color:var(--text-muted);font-weight:600;">{{ $d['day'] }}</div>
      </div>
      @endforeach
    </div>
    <div style="font-size:12px;color:var(--text-muted);text-align:center;">Tổng: 265 phút học trong tuần này</div>
  </div>
</div>

<!-- Achievements -->
<div class="card animate-fade-up delay-4">
  <div class="section-title" style="margin-bottom:18px;">🎖️ Thành tích đạt được</div>
  <div class="grid-4">
    @foreach([
      ['icon'=>'🔥','name'=>'7 ngày liên tiếp','desc'=>'Học 7 ngày không nghỉ','done'=>true],
      ['icon'=>'📚','name'=>'Từ điển sống','desc'=>'Học 200 từ vựng','done'=>true],
      ['icon'=>'⚡','name'=>'Học nhanh','desc'=>'Hoàn thành 10 bài/ngày','done'=>true],
      ['icon'=>'🎯','name'=>'Thi thử đầu tiên','desc'=>'Làm bài kiểm tra đầu tiên','done'=>true],
      ['icon'=>'🌟','name'=>'Hoàn hảo','desc'=>'Đạt 100% một bài','done'=>false],
      ['icon'=>'🏆','name'=>'Top 10','desc'=>'Vào top 10 bảng xếp hạng','done'=>false],
      ['icon'=>'🎙️','name'=>'Diễn giả','desc'=>'Luyện nói 5 giờ','done'=>false],
      ['icon'=>'📝','name'=>'Nhà văn','desc'=>'Hoàn thành 20 bài viết','done'=>false],
    ] as $ach)
    <div style="text-align:center;padding:18px;border-radius:12px;background:{{ $ach['done'] ? 'rgba(108,99,255,0.1)' : 'rgba(255,255,255,0.03)' }};border:1px solid {{ $ach['done'] ? 'rgba(108,99,255,0.3)' : 'rgba(255,255,255,0.06)' }};filter:{{ $ach['done'] ? 'none' : 'grayscale(1)' }};opacity:{{ $ach['done'] ? '1' : '0.5' }};transition:all 0.3s;">
      <div style="font-size:32px;margin-bottom:8px;">{{ $ach['icon'] }}</div>
      <div style="font-size:12px;font-weight:700;margin-bottom:4px;">{{ $ach['name'] }}</div>
      <div style="font-size:11px;color:var(--text-muted);">{{ $ach['desc'] }}</div>
    </div>
    @endforeach
  </div>
</div>
@endsection
