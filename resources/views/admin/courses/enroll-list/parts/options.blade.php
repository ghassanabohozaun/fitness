 @if ($courseStudent->pivot->certification_flag == 'on')
     <a href="#" class="btn btn-hover-warning btn-icon btn-pill update_student_cetification"
         data-id="{{ $courseStudent->pivot->id }}" title="{{ __('courses.update_certification') }}">
         <i class="fa fa-edit fa-1x"></i>
     </a>
 @else
     <a href="#" class="btn btn-hover-info btn-icon btn-pill add_student_cetification"
         data-id="{{ $courseStudent->pivot->id }}" title="{{ __('courses.add_certification') }}">
         <i class="fa fa-plus fa-1x"></i>
     </a>
 @endif


 <a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_enrolled_student"
     data-id="{{ $courseStudent->pivot->id }}" title="{{ __('general.delete') }}">
     <i class="fa fa-trash fa-1x"></i>
 </a>
