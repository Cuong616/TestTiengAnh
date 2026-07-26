@extends('layouts.admin')
@section('title', 'Bảng điều khiển')
@section('topbar-title', 'Bảng điều khiển')

@section('content')
<div class="adm-page-header">
    <div>
        <div class="adm-page-title">Bảng điều khiển</div>
        <div class="adm-breadcrumb">Xin chào, <strong>{{ auth()->user()->name }}</strong> — {{ now()->format('d/m/Y H:i') }}</div>
    </div>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Thêm khoá học
    </a>
</div>

<!-- Stats -->
<div class="adm-stat-grid">
    <div class="adm-stat">
        <div class="adm-stat-icon si-purple"><i class="fas fa-users"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total_users'] }}</div>
            <div class="adm-stat-label">Tổng người dùng</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon si-blue"><i class="fas fa-book"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total_courses'] }}</div>
            <div class="adm-stat-label">Khoá học</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon si-green"><i class="fas fa-check-circle"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['published'] }}</div>
            <div class="adm-stat-label">Đã xuất bản</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon si-amber"><i class="fas fa-user-plus"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['new_users_week'] }}</div>
            <div class="adm-stat-label">Người dùng mới (7 ngày)</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <!-- Recent Courses -->
    <div class="adm-card">
        <div class="adm-section-title"><i class="fas fa-book"></i> Khoá học gần đây</div>
        <div class="adm-table-wrap">
            <table class="adm-table">
                <thead><tr>
                    <th>Khoá học</th><th>Danh mục</th><th>Trạng thái</th>
                </tr></thead>
                <tbody>
                @forelse($recentCourses as $course)
                <tr>
                    <td>
                        <div style="font-weight:600;font-size:13px;">{{ $course->title }}</div>
                        <div style="font-size:11px;color:var(--text3);">{{ $course->level }}</div>
                    </td>
                    <td><span class="badge badge-blue">{{ $course->category_label }}</span></td>
                    <td>
                        @if($course->status === 'published') <span class="badge badge-green">Xuất bản</span>
                        @elseif($course->status === 'draft')  <span class="badge badge-amber">Nháp</span>
                        @else                                 <span class="badge badge-gray">Lưu trữ</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:var(--text3);padding:20px;">Chưa có khoá học nào</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top:12px;">
            <a href="{{ route('admin.courses.index') }}" class="btn btn-ghost btn-sm">
                Xem tất cả <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="adm-card">
        <div class="adm-section-title"><i class="fas fa-users"></i> Người dùng mới</div>
        <div class="adm-table-wrap">
            <table class="adm-table">
                <thead><tr><th>Tên</th><th>Role</th><th>Ngày tạo</th></tr></thead>
                <tbody>
                @forelse($recentUsers as $user)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:9px;">
                            <div class="adm-avatar" style="width:28px;height:28px;font-size:11px;">{{ strtoupper(mb_substr($user->name,0,1)) }}</div>
                            <div>
                                <div style="font-size:13px;font-weight:600;">{{ $user->name }}</div>
                                <div style="font-size:11px;color:var(--text3);">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($user->role === 'admin')
                        <span class="badge badge-purple">Admin</span>
                        @else
                        <span class="badge badge-gray">User</span>
                        @endif
                    </td>
                    <td style="font-size:12px;color:var(--text3);">{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:var(--text3);padding:20px;">Chưa có người dùng</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top:12px;">
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost btn-sm">
                Quản lý người dùng <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
