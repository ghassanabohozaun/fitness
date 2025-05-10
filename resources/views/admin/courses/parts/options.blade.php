<a href="{!! route('admin.course.enroll.student', $course->id) !!}" class="btn btn-hover-info btn-icon btn-pill" title="{{ __('courses.enrolled_list') }}">
    <i class="fa fa-users fa-1x"></i>
</a>

<a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-hover-primary btn-icon btn-pill "
    title="{{ __('general.edit') }}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_course_btn" data-id="{{ $course->id }}"
    title="{{ __('general.delete') }}">
    <i class="fa fa-trash fa-1x"></i>
</a>
