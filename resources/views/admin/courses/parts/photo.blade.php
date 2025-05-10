<img @if ($course->photo) src="{{ asset('adminBoard/uploadedImages/courses/' . $course->photo) }}"
@else
src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    width="100" height="80" class="img-fluid img-thumbnail table-image" />
