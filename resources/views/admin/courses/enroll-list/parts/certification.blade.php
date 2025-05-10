@if (App\Models\Certification::where('student_id', $courseStudent->pivot->student_id)->where('course_id', $courseStudent->pivot->course_id)->first())
    <a href="{!! asset(
        'adminBoard/uploadedFiles/certifications/' .
            App\Models\Certification::where('student_id', $courseStudent->pivot->student_id)->where('course_id', $courseStudent->pivot->course_id)->first()->file,
    ) !!}" target="_blank">{!! __('courses.certitfication') !!}</a>
@else
    <span class="text-danger"> {!! __('courses.no_certification') !!}</span>
@endif
