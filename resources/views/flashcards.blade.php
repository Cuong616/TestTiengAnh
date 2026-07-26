@extends('layouts.app')
@section('title','Flashcard')
@section('breadcrumb')<span>Flashcard</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">🃏 <span>Flashcard</span> Học Từ</div>
  <div class="page-hero-sub">Ghi nhớ từ vựng hiệu quả với phương pháp lặp lại ngắt quãng (SRS)</div>
</div>
<!-- Flashcard demo -->
<div style="display:flex;justify-content:center;margin:32px 0;" class="animate-fade-up delay-2">
  <div style="perspective:1000px;width:420px;">
    <div id="flashcard" style="width:100%;height:240px;cursor:pointer;position:relative;transform-style:preserve-3d;transition:transform 0.6s cubic-bezier(0.4,0,0.2,1);">
      <!-- Front -->
      <div style="position:absolute;inset:0;backface-visibility:hidden;background:linear-gradient(135deg,rgba(108,99,255,0.25),rgba(79,70,229,0.15));border:1px solid rgba(108,99,255,0.35);border-radius:20px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px;">
        <div style="font-size:11px;font-weight:700;letter-spacing:1px;color:var(--text-muted);margin-bottom:12px;">TIẾNG ANH</div>
        <div style="font-size:40px;font-weight:900;font-family:'Plus Jakarta Sans',sans-serif;color:var(--primary-light);">Serendipity</div>
        <div style="font-size:14px;color:var(--text-muted);margin-top:8px;">/ˌser.ənˈdɪp.ɪ.ti/</div>
        <div style="font-size:12px;color:var(--text-muted);margin-top:20px;"><i class="fas fa-rotate"></i> Nhấn để lật</div>
      </div>
      <!-- Back -->
      <div style="position:absolute;inset:0;backface-visibility:hidden;transform:rotateY(180deg);background:linear-gradient(135deg,rgba(16,185,129,0.2),rgba(5,150,105,0.1));border:1px solid rgba(16,185,129,0.3);border-radius:20px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px;">
        <div style="font-size:11px;font-weight:700;letter-spacing:1px;color:var(--text-muted);margin-bottom:12px;">TIẾNG VIỆT</div>
        <div style="font-size:28px;font-weight:800;color:#10b981;">Sự tình cờ may mắn</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:12px;font-style:italic;text-align:center;">"Life is full of serendipity if you stay open."</div>
      </div>
    </div>
    <!-- Actions -->
    <div style="display:flex;gap:12px;margin-top:20px;justify-content:center;">
      <button class="btn btn-ghost" style="padding:10px 28px;"><i class="fas fa-times" style="color:#ef4444;"></i> Chưa nhớ</button>
      <button class="btn btn-primary"><i class="fas fa-volume-up"></i> Nghe</button>
      <button class="btn btn-ghost" style="padding:10px 28px;"><i class="fas fa-check" style="color:#10b981;"></i> Đã nhớ</button>
    </div>
    <!-- Progress -->
    <div style="margin-top:20px;text-align:center;color:var(--text-muted);font-size:13px;">1 / 20 từ</div>
    <div class="progress-bar" style="margin-top:8px;"><div class="progress-fill purple" style="width:5%"></div></div>
  </div>
</div>

<div class="grid-3">
  @foreach(['Từ vựng cơ bản A1','TOEIC 600 từ','Idioms thông dụng'] as $i=>$deck)
  <div class="skill-card animate-fade-up delay-{{ $i+1 }}" style="text-align:center;">
    <div style="font-size:36px;margin-bottom:10px;">🃏</div>
    <div class="skill-name">{{ $deck }}</div>
    <div class="skill-desc">{{ [40,60,35][$i] }} thẻ cần ôn hôm nay</div>
    <div style="margin-top:14px;">
      <button class="btn btn-primary" style="width:100%;justify-content:center;">Ôn tập ngay</button>
    </div>
  </div>
  @endforeach
</div>
@endsection
@section('scripts')
<script>
const fc = document.getElementById('flashcard');
let flipped = false;
fc && fc.addEventListener('click', () => {
  flipped = !flipped;
  fc.style.transform = flipped ? 'rotateY(180deg)' : '';
});
</script>
@endsection
