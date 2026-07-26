<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    protected $fillable = [
        'course_id', 'title', 'slug', 'content', 'type',
        'video_url', 'duration_minutes', 'order', 'status', 'xp_reward',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($lesson) {
            if (empty($lesson->slug)) {
                $lesson->slug = Str::slug($lesson->title) . '-' . Str::random(5);
            }
        });
    }

    // ── Relations ────────────────────────────────────────────
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // ── Accessors ────────────────────────────────────────────
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'video'    => 'Video',
            'reading'  => 'Đọc hiểu',
            'exercise' => 'Bài tập',
            'quiz'     => 'Kiểm tra',
            default    => ucfirst($this->type),
        };
    }
}
