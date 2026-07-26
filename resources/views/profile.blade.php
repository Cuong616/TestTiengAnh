@extends('layouts.app')
@section('title','Hồ sơ')
@section('breadcrumb')<span>Hồ sơ</span>@endsection
@section('content')
<div style="max-width:800px;margin:0 auto;">
  <!-- Profile hero -->
  <div class="card animate-fade-up" style="margin-bottom:24px;padding:32px;display:flex;align-items:center;gap:28px;">
    <div style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;font-size:36px;font-weight:800;border:3px solid rgba(108,99,255,0.5);flex-shrink:0;">H</div>
    <div style="flex:1;">
      <div style="font-size:24px;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:4px;">Học viên</div>
      <div style="font-size:14px;color:var(--text-muted);margin-bottom:12px;">hocvien@tienganh.vn • Tham gia từ 01/2026</div>
      <div style="display:flex;gap:12px;flex-wrap:wrap;">
        <span style="background:rgba(108,99,255,0.15);color:var(--primary-light);padding:5px 12px;border-radius:99px;font-size:12px;font-weight:700;">🎓 Cấp độ B1</span>
        <span style="background:rgba(245,158,11,0.15);color:var(--accent);padding:5px 12px;border-radius:99px;font-size:12px;font-weight:700;">🔥 7 ngày streak</span>
        <span style="background:rgba(16,185,129,0.15);color:#10b981;padding:5px 12px;border-radius:99px;font-size:12px;font-weight:700;">⭐ 1,240 XP</span>
      </div>
    </div>
    <button class="btn btn-outline"><i class="fas fa-pen"></i> Chỉnh sửa</button>
  </div>

  <!-- Stats -->
  <div class="grid-3 animate-fade-up delay-2" style="margin-bottom:24px;">
    @foreach([
      ['val'=>'248','label'=>'Từ đã học','color'=>'var(--primary-light)'],
      ['val'=>'34','label'=>'Bài hoàn thành','color'=>'#10b981'],
      ['val'=>'8','label'=>'Huy hiệu','color'=>'var(--accent)'],
    ] as $s)
    <div class="card" style="text-align:center;padding:22px;">
      <div style="font-size:32px;font-weight:900;font-family:'Plus Jakarta Sans',sans-serif;color:{{ $s['color'] }};">{{ $s['val'] }}</div>
      <div style="font-size:13px;color:var(--text-muted);margin-top:4px;">{{ $s['label'] }}</div>
    </div>
    @endforeach
  </div>

  <!-- Edit form -->
  <div class="card animate-fade-up delay-3">
    <div class="section-title" style="margin-bottom:20px;">Thông tin cá nhân</div>
    <form style="display:flex;flex-direction:column;gap:16px;">
      @foreach([
        ['id'=>'pf-name','label'=>'Họ và tên','type'=>'text','val'=>'Học viên'],
        ['id'=>'pf-email','label'=>'Email','type'=>'email','val'=>'hocvien@tienganh.vn'],
        ['id'=>'pf-phone','label'=>'Số điện thoại','type'=>'tel','val'=>''],
        ['id'=>'pf-goal','label'=>'Mục tiêu học','type'=>'text','val'=>'Đạt IELTS 7.0'],
      ] as $f)
      <div>
        <label for="{{ $f['id'] }}" style="display:block;font-size:13px;font-weight:600;margin-bottom:6px;color:var(--text-secondary);">{{ $f['label'] }}</label>
        <input id="{{ $f['id'] }}" type="{{ $f['type'] }}" value="{{ $f['val'] }}" style="width:100%;background:rgba(255,255,255,0.05);border:1px solid var(--border);border-radius:10px;padding:10px 14px;color:var(--text-primary);font-size:14px;font-family:inherit;outline:none;transition:all 0.3s;" onfocus="this.style.borderColor='var(--primary)';this.style.boxShadow='0 0 0 3px rgba(108,99,255,0.15)';" onblur="this.style.borderColor='';this.style.boxShadow='';">
      </div>
      @endforeach
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" class="btn btn-ghost">Hủy</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu thay đổi</button>
      </div>
    </form>
  </div>
</div>
@endsection
