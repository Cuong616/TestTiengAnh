@extends('layouts.app')
@section('title','Bảng xếp hạng')
@section('breadcrumb')<span>Bảng xếp hạng</span>@endsection
@section('content')
<div class="page-hero animate-fade-up">
  <div class="page-hero-title">🏆 <span>Bảng Xếp Hạng</span></div>
  <div class="page-hero-sub">Cạnh tranh cùng cộng đồng hàng nghìn học viên trên toàn quốc</div>
</div>

<!-- Tabs -->
<div style="display:flex;gap:8px;margin-bottom:24px;" class="animate-fade-up delay-1">
  @foreach(['Tuần này','Tháng này','Tất cả thời gian'] as $i=>$tab)
  <button class="btn {{ $i===0?'btn-primary':'btn-ghost' }}" style="font-size:13px;">{{ $tab }}</button>
  @endforeach
</div>

<!-- Top 3 podium -->
<div style="display:flex;align-items:flex-end;justify-content:center;gap:16px;margin-bottom:32px;" class="animate-fade-up delay-2">
  @foreach([
    ['rank'=>2,'name'=>'Thu Hà','xp'=>'2,610','h'=>'140px','bg'=>'linear-gradient(135deg,#94a3b8,#64748b)','icon'=>'🥈'],
    ['rank'=>1,'name'=>'Minh Tuấn','xp'=>'2,840','h'=>'180px','bg'=>'linear-gradient(135deg,#f59e0b,#d97706)','icon'=>'🥇'],
    ['rank'=>3,'name'=>'Hữu Nam','xp'=>'2,200','h'=>'110px','bg'=>'linear-gradient(135deg,#b45309,#92400e)','icon'=>'🥉'],
  ] as $u)
  <div style="text-align:center;flex:1;max-width:160px;">
    <div style="font-size:28px;margin-bottom:8px;">{{ $u['icon'] }}</div>
    <div style="width:52px;height:52px;border-radius:50%;background:{{ $u['bg'] }};display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:800;margin:0 auto 10px;border:3px solid rgba(255,255,255,0.2);">{{ mb_substr($u['name'],0,1) }}</div>
    <div style="font-weight:700;font-size:14px;margin-bottom:4px;">{{ $u['name'] }}</div>
    <div style="font-size:12px;color:var(--text-muted);">{{ $u['xp'] }} XP</div>
    <div style="width:100%;background:{{ $u['bg'] }};height:{{ $u['h'] }};border-radius:8px 8px 0 0;margin-top:12px;opacity:0.6;"></div>
  </div>
  @endforeach
</div>

<div class="card animate-fade-up delay-3">
  <div style="display:flex;flex-direction:column;gap:4px;">
    @foreach([
      ['rank'=>4,'name'=>'Lan Anh','xp'=>'1,980','c'=>'#f1f5f9'],
      ['rank'=>5,'name'=>'Bạn','xp'=>'1,240','c'=>'var(--primary-light)','self'=>true],
      ['rank'=>6,'name'=>'Quốc Bảo','xp'=>'1,100','c'=>'#f1f5f9'],
      ['rank'=>7,'name'=>'Ngọc Mai','xp'=>'980','c'=>'#f1f5f9'],
      ['rank'=>8,'name'=>'Văn Hùng','xp'=>'860','c'=>'#f1f5f9'],
      ['rank'=>9,'name'=>'Phương Linh','xp'=>'720','c'=>'#f1f5f9'],
      ['rank'=>10,'name'=>'Tuấn Anh','xp'=>'640','c'=>'#f1f5f9'],
    ] as $u)
    <div class="rank-row" style="{{ !empty($u['self'])?'background:rgba(108,99,255,0.12);border-radius:10px;':''; }}">
      <div class="rank-num" style="color:{{ $u['c'] }};font-weight:800;">#{{ $u['rank'] }}</div>
      <div class="rank-avatar" style="background:linear-gradient(135deg,rgba(108,99,255,0.4),rgba(79,70,229,0.3));font-weight:800;">{{ mb_substr($u['name'],0,1) }}</div>
      <div class="rank-info">
        <div class="rank-name" style="{{ !empty($u['self'])?'color:var(--primary-light);font-weight:700;':'' }}">{{ $u['name'] }}{{ !empty($u['self'])?' (Bạn)':'' }}</div>
        <div class="rank-pts">{{ $u['xp'] }} XP</div>
      </div>
      @if(!empty($u['self']))
      <span class="lesson-badge badge-ongoing">Vị trí của bạn</span>
      @endif
    </div>
    @endforeach
  </div>
</div>
@endsection
