@extends('layouts.app')
@section('title','Luyện Nói')
@section('breadcrumb')<span>Nói</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">🎙️ Luyện <span>Nói</span></div>
  <div class="page-hero-sub">Cải thiện phát âm và tự tin giao tiếp tiếng Anh</div>
  <div class="hero-actions"><button class="btn btn-primary"><i class="fas fa-microphone"></i> Bắt đầu luyện</button></div>
</div>
<div class="grid-3">
  @foreach([['🗣️','Phát âm cơ bản',12],['💬','Hội thoại hàng ngày',18],['🎤','Phỏng vấn & thuyết trình',8]] as $i=>$c)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-align:center;padding:28px;">
    <div style="font-size:40px;margin-bottom:12px;">{{ $c[0] }}</div>
    <div class="skill-name">{{ $c[1] }}</div>
    <div class="skill-desc" style="margin-bottom:16px;">{{ $c[2] }} bài luyện</div>
    <button class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-microphone"></i> Luyện ngay</button>
  </div>
  @endforeach
</div>
@endsection
