<span class="text-info font-bolder" style="font-weight: 600">
    {!! App\Models\CourseStudent::where('course_id', $course->id)->get()->count() !!}
</span>
