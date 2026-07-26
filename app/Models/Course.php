<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'thumbnail',
        'level', 'category', 'status', 'duration_minutes',
        'order', 'created_by',
    ];

    // ── Slug auto-generate ───────────────────────────────────
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title) . '-' . Str::random(5);
            }
        });
    }

    // ── Relations ────────────────────────────────────────────
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // ── Scopes ───────────────────────────────────────────────
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // ── Accessors ────────────────────────────────────────────
    public function getLessonsCountAttribute()
    {
        return $this->lessons()->count();
    }

    public function getCategoryLabelAttribute(): string
    {
        return match($this->category) {
            'vocabulary' => 'Từ vựng',
            'grammar'    => 'Ngữ pháp',
            'listening'  => 'Nghe',
            'speaking'   => 'Nói',
            'reading'    => 'Đọc',
            'writing'    => 'Viết',
            default      => ucfirst($this->category),
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'draft'     => 'Nháp',
            'published' => 'Đã xuất bản',
            'archived'  => 'Lưu trữ',
            default     => $this->status,
        };
    }
}
