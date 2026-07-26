@extends('layouts.app')
@section('title','Đọc Hiểu')
@section('breadcrumb')<span>Đọc</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">📖 Luyện <span>Đọc</span></div>
  <div class="page-hero-sub">Đọc hiểu văn bản từ báo chí, truyện ngắn đến tài liệu học thuật</div>
  <div class="hero-actions"><button class="btn btn-primary"><i class="fas fa-book-open"></i> Đọc ngay</button></div>
</div>
<div class="grid-3">
  @foreach([['📰','Tin tức','Đọc báo BBC, CNN',24],['📚','Truyện ngắn','Short stories A2-B2',16],['🔬','Học thuật','Academic reading',10]] as $i=>$c)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-align:center;padding:28px;">
    <div style="font-size:40px;margin-bottom:12px;">{{ $c[0] }}</div>
    <div class="skill-name">{{ $c[1] }}</div>
    <div class="skill-desc">{{ $c[2] }}</div>
    <div style="font-size:12px;color:var(--text-muted);margin:8px 0 16px;">{{ $c[3] }} bài đọc</div>
    <button class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-book-open"></i> Đọc ngay</button>
  </div>
  @endforeach
</div>
@endsection
