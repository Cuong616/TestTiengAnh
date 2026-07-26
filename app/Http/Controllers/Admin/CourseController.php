<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['creator', 'lessons']);

        // Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $courses = $query->orderBy('order')->orderByDesc('created_at')->paginate(12);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:200',
            'description'      => 'nullable|string',
            'level'            => 'required|in:A1,A2,B1,B2,C1,C2',
            'category'         => 'required|in:vocabulary,grammar,listening,speaking,reading,writing',
            'status'           => 'required|in:draft,published,archived',
            'duration_minutes' => 'nullable|integer|min:0',
            'order'            => 'nullable|integer|min:0',
        ], [
            'title.required'    => 'Vui lòng nhập tên khoá học.',
            'level.required'    => 'Vui lòng chọn cấp độ.',
            'category.required' => 'Vui lòng chọn danh mục.',
            'status.required'   => 'Vui lòng chọn trạng thái.',
        ]);

        $validated['slug']       = Str::slug($validated['title']) . '-' . Str::random(5);
        $validated['created_by'] = auth()->id();

        // Thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', "Khoá học \"{$validated['title']}\" đã được tạo thành công!");
    }

    public function edit(Course $course)
    {
        $lessons = $course->lessons()->orderBy('order')->get();
        return view('admin.courses.edit', compact('course', 'lessons'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:200',
            'description'      => 'nullable|string',
            'level'            => 'required|in:A1,A2,B1,B2,C1,C2',
            'category'         => 'required|in:vocabulary,grammar,listening,speaking,reading,writing',
            'status'           => 'required|in:draft,published,archived',
            'duration_minutes' => 'nullable|integer|min:0',
            'order'            => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $course->update($validated);

        return redirect()->route('admin.courses.edit', $course)
            ->with('success', 'Khoá học đã được cập nhật!');
    }

    public function destroy(Course $course)
    {
        $title = $course->title;
        $course->delete();
        return redirect()->route('admin.courses.index')
            ->with('success', "Đã xoá khoá học \"$title\".");
    }

    // ── Lessons sub-resource ─────────────────────────────────
    public function storelesson(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:200',
            'type'             => 'required|in:video,reading,exercise,quiz',
            'content'          => 'nullable|string',
            'video_url'        => 'nullable|url',
            'duration_minutes' => 'nullable|integer|min:0',
            'xp_reward'        => 'nullable|integer|min:0',
            'status'           => 'required|in:draft,published',
            'order'            => 'nullable|integer|min:0',
        ]);

        $validated['course_id'] = $course->id;
        $validated['slug']      = Str::slug($validated['title']) . '-' . Str::random(5);

        Lesson::create($validated);

        return redirect()->route('admin.courses.edit', $course)
            ->with('success', "Bài học \"{$validated['title']}\" đã được thêm!");
    }

    public function destroyLesson(Course $course, Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('admin.courses.edit', $course)
            ->with('success', 'Đã xoá bài học.');
    }
}
