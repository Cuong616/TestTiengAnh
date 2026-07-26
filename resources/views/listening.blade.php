@extends('layouts.app')
@section('title','Luyện Nghe')
@section('breadcrumb')<span>Nghe</span>@endsection
@section('content')
<div class='page-hero animate-fade-up'>
  <div class='page-hero-title'>🎧 Luyện <span>Nghe</span></div>
  <div class='page-hero-sub'>Nghe và hiểu tiếng Anh qua podcast, bài hát, tin tức</div>
  <div class='hero-actions'><button class='btn btn-primary'><i class='fas fa-play'></i> Bắt đầu</button></div>
</div>
<div class='grid-3'>
  @foreach([['icon'=>'🎵','name'=>'Bài hát','count'=>20],['icon'=>'📻','name'=>'Podcast','count'=>15],['icon'=>'📰','name'=>'Tin tức','count'=>30]] as =>)
  <div class='skill-card animate-fade-up delay-{{ +1 }}'>
    <div style='font-size:40px;margin-bottom:12px;'>{{ [''icon''] }}</div>
    <div class='skill-name'>{{ [''name''] }}</div>
    <div class='skill-desc'>{{ [''count''] }} bài nghe</div>
    <div style='margin-top:14px;'><button class='btn btn-primary' style='width:100%;justify-content:center;'><i class='fas fa-play'></i> Nghe ngay</button></div>
  </div>
  @endforeach
</div>
@endsection
