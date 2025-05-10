<div class="cst-switch switch-sm">
    <input type="checkbox" id="change_status" {{ $course->status == 'on' ? 'checked' : '' }} data-id="{{ $course->id }}"
        class="change_status">
</div>
