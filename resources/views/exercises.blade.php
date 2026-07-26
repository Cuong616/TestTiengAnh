@extends('layouts.app')
@section('title','Bài tập')
@section('breadcrumb')<span>Bài tập</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">📋 <span>Bài Tập</span> Luyện Tập</div>
  <div class="page-hero-sub">Hàng trăm bài tập theo dạng và kỹ năng</div>
</div>
<div class="grid-4">
  @foreach([['🔤','Điền từ',30,'purple'],['🔀','Sắp xếp câu',25,'blue'],['🎯','Chọn đáp án',50,'green'],['🔊','Điền từ nghe',20,'amber']] as $i=>$ex)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-align:center;padding:22px;">
    <div style="font-size:36px;margin-bottom:10px;">{{ $ex[0] }}</div>
    <div class="skill-name">{{ $ex[1] }}</div>
    <div class="skill-desc" style="margin-bottom:14px;">{{ $ex[2] }} bài tập</div>
    <button class="btn btn-primary" style="width:100%;justify-content:center;font-size:12px;padding:8px;"><i class="fas fa-play"></i> Làm ngay</button>
  </div>
  @endforeach
</div>
@endsection
