<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificationRequest;
use App\Models\Certification;
use App\Models\CourseStudent;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;
class CertificationsController extends Controller
{
    use GeneralTrait;
    // store
    public function store(CertificationRequest $request)
    {

        // get course student
        $courseStudent = CourseStudent::find($request->id);

        // cetification exists
        $certificationExist = Certification::where('student_id', $courseStudent->student_id)->where('course_id', $courseStudent->course_id)->exists();

        if ($certificationExist) {
            return $this->returnError(__('general.add_error_message'), 404);
        } else {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $file_desctination = public_path('adminBoard/uploadedFiles/certifications//');
                $filePath = $this->saveFile($file, $file_desctination);
            } else {
                $filePath = '';
            }

            $certification = Certification::create([
                'student_id' => $courseStudent->student_id,
                'course_id' => $courseStudent->course_id,
                'status' => 'on',
                'file' => $filePath,
            ]);

            if ($certification) {
                $courseStudent->certification_flag = 'on';
                $courseStudent->save();
                return $this->returnSuccessMessage(__('general.add_success_message'));
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        }
    }

    public function update(CertificationRequest $request)
    {
        // get course student
        $courseStudent = CourseStudent::find($request->id);

        // get certification
        $certification = Certification::where('student_id', $courseStudent->student_id)->where('course_id', $courseStudent->course_id)->first();

        if ($certification->count() > 0) {
            // get certification

            if ($request->hasFile('file')) {
                if (!empty($certification->file)) {
                    $old_file = public_path('adminBoard/uploadedFiles/certifications//') . $certification->file;
                    if (File::exists($old_file)) {
                        File::delete($old_file);
                    }
                    $file = $request->file(key: 'file');
                    $file_desctination = public_path('adminBoard/uploadedFiles/certifications//');
                    $filePath = $this->saveFile($file, $file_desctination);
                } else {
                    $file = $request->file(key: 'file');
                    $file_desctination = public_path('adminBoard/uploadedFiles/certifications//');
                    $filePath = $this->saveFile($file, $file_desctination);
                }
            } else {
                if (!empty($certification->file)) {
                    $filePath = $certification->file;
                } else {
                    $filePath = '';
                }
            }

            $certification->update([
                'student_id' => $courseStudent->student_id,
                'course_id' => $courseStudent->course_id,
                'status' => 'on',
                'file' => $filePath,
            ]);

            if ($certification) {
                return $this->returnSuccessMessage(__('general.add_success_message'));
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        }
    }
}
