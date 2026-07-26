@extends('layouts.app')
@section('title', 'Ngữ pháp')
@section('breadcrumb')<span>Ngữ pháp</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">✏️ Học <span>Ngữ Pháp</span></div>
  <div class="page-hero-sub">Nắm vững các cấu trúc ngữ pháp từ cơ bản đến nâng cao</div>
</div>
<div class="grid-3">
  @foreach([
    ['name'=>'Thì hiện tại đơn','level'=>'A1','done'=>true,'lessons'=>8],
    ['name'=>'Thì hiện tại tiếp diễn','level'=>'A1','done'=>true,'lessons'=>6],
    ['name'=>'Thì quá khứ đơn','level'=>'A2','done'=>false,'lessons'=>10],
    ['name'=>'Thì hoàn thành','level'=>'B1','done'=>false,'lessons'=>12],
    ['name'=>'Câu điều kiện','level'=>'B1','done'=>false,'lessons'=>9],
    ['name'=>'Mệnh đề quan hệ','level'=>'B2','done'=>false,'lessons'=>7],
  ] as $i => $gr)
  <div class="skill-card animate-fade-up delay-{{ ($i%3)+1 }}">
    <div class="skill-top">
      <div class="skill-icon-wrap" style="background:rgba(108,99,255,0.15);color:var(--primary-light);font-size:18px;"><i class="fas fa-pen-nib"></i></div>
      <span style="font-size:11px;font-weight:700;padding:3px 8px;border-radius:99px;background:{{ $gr['done']?'rgba(16,185,129,0.15)':'rgba(255,255,255,0.06)' }};color:{{ $gr['done']?'#10b981':'var(--text-muted)' }}">{{ $gr['level'] }}</span>
    </div>
    <div class="skill-name">{{ $gr['name'] }}</div>
    <div class="skill-desc">{{ $gr['lessons'] }} bài học</div>
    <div style="margin-top:14px;">
      <button class="btn {{ $gr['done']?'btn-ghost':'btn-primary' }}" style="width:100%;justify-content:center;font-size:13px;">
        <i class="fas {{ $gr['done']?'fa-redo':'fa-play' }}"></i> {{ $gr['done']?'Ôn lại':'Học ngay' }}
      </button>
    </div>
  </div>
  @endforeach
</div>
@endsection
