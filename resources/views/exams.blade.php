@extends('layouts.app')
@section('title', 'Kiểm tra')
@section('breadcrumb')<span>Kiểm tra</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">🏆 <span>Kiểm Tra</span> & Thi Thử</div>
  <div class="page-hero-sub">Luyện đề IELTS, TOEIC, TOEFL và kiểm tra theo chủ đề</div>
</div>

<div class="grid-3" style="margin-bottom:28px;">
  @foreach([
    ['icon'=>'🎯','name'=>'TOEIC','desc'=>'Luyện đề TOEIC chuẩn format','color'=>'rgba(59,130,246,0.15)','c'=>'#3b82f6','tests'=>12],
    ['icon'=>'📖','name'=>'IELTS','desc'=>'Đề thi IELTS 4 kỹ năng','color'=>'rgba(108,99,255,0.15)','c'=>'var(--primary-light)','tests'=>8],
    ['icon'=>'🌐','name'=>'TOEFL','desc'=>'Luyện thi TOEFL iBT','color'=>'rgba(16,185,129,0.15)','c'=>'#10b981','tests'=>6],
  ] as $i => $exam)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="padding:28px;">
    <div class="skill-top">
      <div class="skill-icon-wrap" style="background:{{ $exam['color'] }};font-size:24px;width:54px;height:54px;">{{ $exam['icon'] }}</div>
    </div>
    <div class="skill-name" style="font-size:20px;">{{ $exam['name'] }}</div>
    <div class="skill-desc" style="margin-bottom:16px;">{{ $exam['desc'] }}</div>
    <div style="font-size:12px;color:var(--text-muted);margin-bottom:16px;">{{ $exam['tests'] }} đề thi</div>
    <button class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-play"></i> Luyện ngay</button>
  </div>
  @endforeach
</div>

<div class="grid-2">
  <div class="card animate-fade-up delay-2">
    <div class="section-header">
      <div class="section-title">Kết quả gần đây</div>
    </div>
    <div style="display:flex;flex-direction:column;gap:12px;">
      @foreach([
        ['name'=>'TOEIC Mock Test 1','score'=>750,'max'=>990,'date'=>'20/06/2026','color'=>'#10b981'],
        ['name'=>'IELTS Reading Practice','score'=>6.5,'max'=>9,'date'=>'18/06/2026','color'=>'var(--primary-light)'],
        ['name'=>'Vocabulary Quiz - Travel','score'=>88,'max'=>100,'date'=>'16/06/2026','color'=>'var(--accent)'],
      ] as $res)
      <div style="display:flex;align-items:center;gap:14px;padding:12px;background:rgba(255,255,255,0.03);border-radius:10px;">
        <div style="width:48px;height:48px;border-radius:12px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;flex-direction:column;flex-shrink:0;">
          <div style="font-size:14px;font-weight:800;color:{{ $res['color'] }}">{{ $res['score'] }}</div>
          <div style="font-size:9px;color:var(--text-muted);">/{{ $res['max'] }}</div>
        </div>
        <div style="flex:1;">
          <div style="font-size:13px;font-weight:600;margin-bottom:3px;">{{ $res['name'] }}</div>
          <div style="font-size:11px;color:var(--text-muted);">{{ $res['date'] }}</div>
        </div>
        <button class="btn btn-ghost" style="font-size:12px;padding:6px 12px;">Xem lại</button>
      </div>
      @endforeach
    </div>
  </div>

  <div class="card animate-fade-up delay-3">
    <div class="section-header">
      <div class="section-title">Quiz nhanh theo chủ đề</div>
    </div>
    <div style="display:flex;flex-direction:column;gap:8px;">
      @foreach(['Từ vựng cơ bản (A1-A2)','Ngữ pháp thì quá khứ','Nghe hiểu văn phòng','Đọc hiểu báo tiếng Anh','Phát âm /θ/ và /ð/'] as $i=>$q)
      <div class="lesson-card" style="justify-content:space-between;">
        <div style="display:flex;align-items:center;gap:12px;">
          <div style="width:36px;height:36px;border-radius:8px;background:rgba(108,99,255,0.12);color:var(--primary-light);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;">{{ $i+1 }}</div>
          <div style="font-size:13px;font-weight:500;">{{ $q }}</div>
        </div>
        <button class="btn btn-outline" style="font-size:12px;padding:6px 14px;">Bắt đầu</button>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
