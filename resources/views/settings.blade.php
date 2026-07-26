@extends('layouts.app')
@section('title','Cài đặt')
@section('breadcrumb')<span>Cài đặt</span>@endsection
@section('content')
<div style="max-width:700px;margin:0 auto;">
  <div class="page-hero animate-fade-up" style="margin-bottom:24px;">
    <div class="page-hero-title">⚙️ <span>Cài Đặt</span></div>
    <div class="page-hero-sub">Tuỳ chỉnh trải nghiệm học tập của bạn</div>
  </div>
  @foreach([
    ['title'=>'Thông báo','icon'=>'fas fa-bell','items'=>[['Nhắc nhở học hàng ngày','Bật thông báo mỗi ngày'],['Thành tích mới','Khi đạt huy hiệu mới']]],
    ['title'=>'Giao diện','icon'=>'fas fa-palette','items'=>[['Chế độ tối','Dark mode (đang bật)']]],
    ['title'=>'Học tập','icon'=>'fas fa-graduation-cap','items'=>[['Mục tiêu hàng ngày','20 phút/ngày'],['Nhắc ôn tập','Mỗi 3 ngày']]],
  ] as $i=>$section)
  <div class="card animate-fade-up delay-{{ $i+1 }}" style="margin-bottom:16px;">
    <div class="section-header" style="margin-bottom:16px;">
      <div class="section-title" style="font-size:16px;"><i class="{{ $section['icon'] }}" style="color:var(--primary-light);margin-right:8px;"></i>{{ $section['title'] }}</div>
    </div>
    @foreach($section['items'] as $item)
    <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.04);">
      <div>
        <div style="font-size:14px;font-weight:500;">{{ $item[0] }}</div>
        <div style="font-size:12px;color:var(--text-muted);">{{ $item[1] }}</div>
      </div>
      <label style="position:relative;display:inline-block;width:44px;height:24px;cursor:pointer;">
        <input type="checkbox" checked style="opacity:0;width:0;height:0;" id="toggle-{{ $loop->index }}">
        <span style="position:absolute;inset:0;background:var(--primary);border-radius:99px;transition:0.3s;"></span>
        <span style="position:absolute;top:3px;left:3px;width:18px;height:18px;background:#fff;border-radius:50%;transition:0.3s;transform:translateX(20px);"></span>
      </label>
    </div>
    @endforeach
  </div>
  @endforeach
  <div class="animate-fade-up delay-4" style="display:flex;gap:10px;justify-content:flex-end;">
    <button class="btn btn-ghost"><i class="fas fa-undo"></i> Đặt lại</button>
    <button class="btn btn-primary"><i class="fas fa-save"></i> Lưu cài đặt</button>
  </div>
</div>
@endsection
