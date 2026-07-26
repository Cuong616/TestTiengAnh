@extends('layouts.app')
@section('title', 'Từ vựng')
@section('breadcrumb')
  <span>Từ vựng</span>
@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">📚 Học <span>Từ Vựng</span></div>
  <div class="page-hero-sub">Mở rộng vốn từ với hơn 5,000 từ theo chủ đề và cấp độ</div>
  <div class="hero-actions">
    <button class="btn btn-primary"><i class="fas fa-play"></i> Bắt đầu học</button>
    <button class="btn btn-outline"><i class="fas fa-layer-group"></i> Flashcard</button>
  </div>
</div>

<!-- CATEGORY FILTER -->
<div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px;" class="animate-fade-up delay-1">
  @foreach(['Tất cả','Cơ bản','Trung cấp','Nâng cao','Công việc','Du lịch','Học thuật','Gia đình'] as $cat)
  <button class="btn {{ $loop->first ? 'btn-primary' : 'btn-ghost' }}" style="font-size:13px;padding:7px 16px;">{{ $cat }}</button>
  @endforeach
</div>

<!-- TOPIC GRID -->
<div class="section-header animate-fade-up delay-2">
  <div class="section-title">Chủ đề phổ biến</div>
  <a href="#" class="section-link">Xem tất cả</a>
</div>
<div class="grid-4" style="margin-bottom:28px;">
  @foreach([
    ['icon'=>'🏠','name'=>'Gia đình','count'=>45,'color'=>'rgba(239,68,68,0.15)','c2'=>'#ef4444','done'=>80],
    ['icon'=>'🍜','name'=>'Ẩm thực','count'=>60,'color'=>'rgba(245,158,11,0.15)','c2'=>'var(--accent)','done'=>55],
    ['icon'=>'✈️','name'=>'Du lịch','count'=>72,'color'=>'rgba(59,130,246,0.15)','c2'=>'#3b82f6','done'=>30],
    ['icon'=>'💼','name'=>'Công việc','count'=>88,'color'=>'rgba(16,185,129,0.15)','c2'=>'#10b981','done'=>20],
    ['icon'=>'🏥','name'=>'Y tế','count'=>50,'color'=>'rgba(236,72,153,0.15)','c2'=>'#ec4899','done'=>45],
    ['icon'=>'🎓','name'=>'Học thuật','count'=>95,'color'=>'rgba(108,99,255,0.15)','c2'=>'var(--primary-light)','done'=>10],
    ['icon'=>'🌿','name'=>'Thiên nhiên','count'=>40,'color'=>'rgba(5,150,105,0.15)','c2'=>'#059669','done'=>65],
    ['icon'=>'💻','name'=>'Công nghệ','count'=>110,'color'=>'rgba(99,102,241,0.15)','c2'=>'#6366f1','done'=>15],
  ] as $i => $topic)
  <div class="skill-card animate-fade-up delay-{{ ($i%4)+1 }}">
    <div class="skill-top">
      <div class="skill-icon-wrap" style="background:{{ $topic['color'] }};font-size:22px;">{{ $topic['icon'] }}</div>
      <i class="fas fa-arrow-up-right-from-square skill-arrow"></i>
    </div>
    <div class="skill-name">{{ $topic['name'] }}</div>
    <div class="skill-desc">{{ $topic['count'] }} từ</div>
    <div class="progress-wrap">
      <div class="progress-info"><span>Đã học</span><span style="color:{{ $topic['c2'] }}">{{ $topic['done'] }}%</span></div>
      <div class="progress-bar"><div class="progress-fill" style="width:{{ $topic['done'] }}%;background:linear-gradient(90deg,{{ $topic['c2'] }}88,{{ $topic['c2'] }});"></div></div>
    </div>
  </div>
  @endforeach
</div>

<!-- RECENT WORDS -->
<div class="card animate-fade-up delay-3">
  <div class="section-header">
    <div class="section-title">Từ mới nhất</div>
    <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;"><i class="fas fa-plus"></i> Thêm từ</button>
  </div>
  <div style="overflow-x:auto;">
    <table style="width:100%;border-collapse:collapse;font-size:14px;">
      <thead>
        <tr style="border-bottom:1px solid var(--border);">
          <th style="text-align:left;padding:10px 12px;color:var(--text-muted);font-weight:600;font-size:12px;">TỪ TIẾNG ANH</th>
          <th style="text-align:left;padding:10px 12px;color:var(--text-muted);font-weight:600;font-size:12px;">PHIÊN ÂM</th>
          <th style="text-align:left;padding:10px 12px;color:var(--text-muted);font-weight:600;font-size:12px;">NGHĨA</th>
          <th style="text-align:left;padding:10px 12px;color:var(--text-muted);font-weight:600;font-size:12px;">CHỦ ĐỀ</th>
          <th style="text-align:left;padding:10px 12px;color:var(--text-muted);font-weight:600;font-size:12px;">TRẠNG THÁI</th>
        </tr>
      </thead>
      <tbody>
        @foreach([
          ['en'=>'Perseverance','ipa'=>'/ˌpɜː.sɪˈvɪər.əns/','vi'=>'Sự kiên trì','topic'=>'Học thuật','status'=>'done'],
          ['en'=>'Delicious','ipa'=>'/dɪˈlɪʃ.əs/','vi'=>'Ngon miệng','topic'=>'Ẩm thực','status'=>'done'],
          ['en'=>'Destination','ipa'=>'/ˌdes.tɪˈneɪ.ʃən/','vi'=>'Điểm đến','topic'=>'Du lịch','status'=>'ongoing'],
          ['en'=>'Negotiation','ipa'=>'/nɪˌɡəʊ.ʃiˈeɪ.ʃən/','vi'=>'Đàm phán','topic'=>'Công việc','status'=>'new'],
          ['en'=>'Sustainable','ipa'=>'/səˈsteɪ.nə.bəl/','vi'=>'Bền vững','topic'=>'Thiên nhiên','status'=>'new'],
        ] as $word)
        <tr style="border-bottom:1px solid rgba(255,255,255,0.04);transition:background 0.2s;" onmouseenter="this.style.background='rgba(108,99,255,0.05)'" onmouseleave="this.style.background=''">
          <td style="padding:12px;font-weight:700;color:var(--primary-light);">{{ $word['en'] }}</td>
          <td style="padding:12px;color:var(--text-muted);font-style:italic;">{{ $word['ipa'] }}</td>
          <td style="padding:12px;font-weight:500;">{{ $word['vi'] }}</td>
          <td style="padding:12px;"><span style="background:rgba(108,99,255,0.12);color:var(--primary-light);padding:3px 10px;border-radius:99px;font-size:11px;font-weight:700;">{{ $word['topic'] }}</span></td>
          <td style="padding:12px;">
            @if($word['status']==='done')<span class="lesson-badge badge-done">Thuộc</span>
            @elseif($word['status']==='ongoing')<span class="lesson-badge badge-ongoing">Đang học</span>
            @else<span style="background:rgba(239,68,68,0.12);color:#ef4444;padding:4px 10px;border-radius:99px;font-size:11px;font-weight:700;">Mới</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
