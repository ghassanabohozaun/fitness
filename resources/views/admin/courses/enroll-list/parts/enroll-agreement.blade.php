{{-- <div class="cst-switch switch-sm">
    <input type="checkbox" {{ $courseStudent->pivot->enroll_agreement == 'on' ? 'checked' : '' }}
        data-id="{{ $courseStudent->pivot->id }}" class="enroll_agreement_status">
</div> --}}


<div class="cst-switch switch-sm">
    <input type="checkbox" id="enroll_agreement_status"
        {{ $courseStudent->pivot->enroll_agreement == 'on' ? 'checked' : '' }} data-id="{{ $courseStudent->pivot->id }}"
        class="enroll_agreement_status">
</div>
