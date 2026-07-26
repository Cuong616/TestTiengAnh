@extends('layouts.app')
@section('title','Viết')
@section('breadcrumb')<span>Viết</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">✍️ Luyện <span>Viết</span></div>
  <div class="page-hero-sub">Rèn luyện kỹ năng viết từ email, đoạn văn đến bài luận</div>
  <div class="hero-actions"><button class="btn btn-primary"><i class="fas fa-pen"></i> Viết bài</button></div>
</div>
<div class="grid-3">
  @foreach([['📧','Email chính thức','Business writing',8],['📝','Đoạn văn','Paragraph writing',15],['📄','Bài luận','Essay IELTS Task 2',12]] as $i=>$c)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-align:center;padding:28px;">
    <div style="font-size:40px;margin-bottom:12px;">{{ $c[0] }}</div>
    <div class="skill-name">{{ $c[1] }}</div>
    <div class="skill-desc">{{ $c[2] }}</div>
    <div style="font-size:12px;color:var(--text-muted);margin:8px 0 16px;">{{ $c[3] }} bài tập</div>
    <button class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-pen"></i> Viết ngay</button>
  </div>
  @endforeach
</div>
@endsection
