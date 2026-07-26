@extends('layouts.admin')
@section('title', 'Quản lý khoá học')
@section('topbar-title', 'Khoá học')

@section('content')
<div class="adm-page-header">
    <div>
        <div class="adm-page-title">Quản lý khoá học</div>
        <div class="adm-breadcrumb"><a href="{{ route('admin.dashboard') }}">Admin</a> / Khoá học</div>
    </div>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Thêm khoá học
    </a>
</div>

<!-- Filters -->
<form method="GET" class="adm-filters">
    <div class="adm-search-wrap">
        <i class="fas fa-search"></i>
        <input type="text" name="search" placeholder="Tìm tên khoá học..." value="{{ request('search') }}">
    </div>
    <select name="category" class="adm-select" style="width:auto;padding:8px 12px;">
        <option value="">Tất cả danh mục</option>
        @foreach(['vocabulary'=>'Từ vựng','grammar'=>'Ngữ pháp','listening'=>'Nghe','speaking'=>'Nói','reading'=>'Đọc','writing'=>'Viết'] as $val => $label)
        <option value="{{ $val }}" {{ request('category')===$val ? 'selected':'' }}>{{ $label }}</option>
        @endforeach
    </select>
    <select name="status" class="adm-select" style="width:auto;padding:8px 12px;">
        <option value="">Tất cả trạng thái</option>
        <option value="published" {{ request('status')==='published'?'selected':'' }}>Đã xuất bản</option>
        <option value="draft"     {{ request('status')==='draft'?'selected':'' }}>Nháp</option>
        <option value="archived"  {{ request('status')==='archived'?'selected':'' }}>Lưu trữ</option>
    </select>
    <button type="submit" class="btn btn-ghost">
        <i class="fas fa-filter"></i> Lọc
    </button>
    @if(request()->hasAny(['search','category','status']))
    <a href="{{ route('admin.courses.index') }}" class="btn btn-ghost">
        <i class="fas fa-times"></i> Xoá lọc
    </a>
    @endif
</form>

<div class="adm-table-wrap">
    <table class="adm-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Khoá học</th>
                <th>Danh mục</th>
                <th>Cấp độ</th>
                <th>Bài học</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th style="text-align:right;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        @forelse($courses as $course)
        <tr>
            <td style="color:var(--text3);font-size:12px;">{{ $course->id }}</td>
            <td>
                <div style="font-weight:600;">{{ $course->title }}</div>
                @if($course->description)
                <div style="font-size:11px;color:var(--text3);margin-top:2px;">{{ Str::limit($course->description, 60) }}</div>
                @endif
            </td>
            <td><span class="badge badge-blue">{{ $course->category_label }}</span></td>
            <td><span class="badge badge-purple">{{ $course->level }}</span></td>
            <td style="font-size:13px;">
                <i class="fas fa-layer-group" style="color:var(--text3);margin-right:4px;"></i>
                {{ $course->lessons_count }}
            </td>
            <td>
                @if($course->status === 'published')  <span class="badge badge-green">Xuất bản</span>
                @elseif($course->status === 'draft')  <span class="badge badge-amber">Nháp</span>
                @else                                 <span class="badge badge-gray">Lưu trữ</span>
                @endif
            </td>
            <td style="font-size:12px;color:var(--text3);">{{ $course->created_at->format('d/m/Y') }}</td>
            <td>
                <div style="display:flex;align-items:center;gap:6px;justify-content:flex-end;">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-ghost btn-xs">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs"
                            data-confirm="Xoá khoá học '{{ $course->title }}'? Tất cả bài học sẽ bị xoá!">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr><td colspan="8" style="text-align:center;padding:40px;color:var(--text3);">
            <i class="fas fa-book" style="font-size:32px;opacity:.3;display:block;margin-bottom:10px;"></i>
            Chưa có khoá học nào. <a href="{{ route('admin.courses.create') }}" style="color:var(--primary-l);">Tạo ngay?</a>
        </td></tr>
        @endforelse
        </tbody>
    </table>
</div>

@if($courses->hasPages())
<div style="margin-top:16px;display:flex;justify-content:flex-end;">
    {{ $courses->withQueryString()->links() }}
</div>
@endif
@endsection
