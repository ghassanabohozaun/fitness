<?php

namespace App\Traits;

use App\Models\Course;
use App\Models\Notification;
use App\Models\Student;
use Image;

trait GeneralTrait
{
    ////////////////////////////////////////////////////////////////////////
    public function getCurrentLang()
    {
        return app()->getLocale();
    }
    ////////////////////////////////////////////////////////////////////////
    public function returnError($msg = "", $errNum)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }
    ////////////////////////////////////////////////////////////////////////
    public function returnSuccessMessage($msg = "")
    {
        return [
            'status' => true,
            'errNum' => '',
            'msg' => $msg
        ];
    }
    ////////////////////////////////////////////////////////////////////////
    public function returnData($msg = "", $data)
    {
        return response()->json([
            'status' => true,
            'errNum' => "",
            'msg' => $msg,
            'data' => $data
        ]);
    }
    ////////////////////////////////////////////////////////////////////////
    public function returnValidationError($code = "", $validator)
    {
        return $this->returnError($code, $validator->errors());
    }
    ////////////////////////////////////////////////////////////////////////
    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }
    ////////////////////////////////////////////////////////////////////////
    public function getErrorCode($input)
    {
        if ($input == "name_ar")
            return 'E0011';

        else if ($input == "password")
            return 'E002';
        else
            return "";
    }
    ////////////////////////////////////////////////////////////////////////
    public function saveImage($name, $path)
    {
        $ImageExtenstion = $name->getClientOriginalExtension();
        $ImageName = time() . '.' . $ImageExtenstion;
        $name->move($path, $ImageName);
        return $ImageName;
    }
    ////////////////////////////////////////////////////////////////////////
    public function saveResizeImage($image, $destinationPath, $width, $height)
    {
        $input['photo'] = time() . '.' . $image->getClientOriginalExtension();
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . '/' . $input['photo']);
        return  $input['photo'];
    }
    ///////////////////////////////////////////
    public function saveFile($name, $path)
    {
        $fileExtenstion = $name->getClientOriginalExtension();
        $fileName = time() . rand() . '.' . $fileExtenstion;
        $name->move($path, $fileName);
        return $fileName;
    }

    ///////////////////////////////////////////
    public function notificationToAdminForStudentEnrollCourse($course , $student_id){

        Notification::create([
            'title_ar' => 'تنبيه التسجيل في دورة',
            'title_en' => 'Enrolled In Course Notification',
            'details_ar' => ' قام الطالب   ' . Student::find($student_id)->name_ar . ' بالتسجيل في الدورة التالية  ' . $course->title_ar ,
            'details_en' => ' The Student  ' . Student::find($student_id)->name_en . ' Enrolled In This Course   ' . $course->title_en ,
            'notify_status' => 'send',
            'notify_class' => 'unread',
            'notify_for' => 'admin',
            'notify_to' => $course->id,
            'student_id' => $student_id,
        ]);
    }


    public function notificationToThankStudentFromEnrolledCourse($course, $student_id)
    {
        Notification::create([
            'title_ar' => 'تنبيه التسجيل في دورة',
            'title_en' => 'Enrolled In Course Notification',
            'details_ar' => ' شكرا لتسجيلك في دورة  ' .'<strong style="color:#dc3545">'. $course->title_ar .'</strong>'.' عليك الانتظار لحين الموافقة علي طلبك ',
            'details_en' => ' Thank You For Enrolled In Course  ' .'<strong style="color:#dc3545">'. $course->title_en. '</strong>'.' You have to wait for your order to be approved ',
            'notify_status' => 'send',
            'notify_class' => 'unread',
            'notify_for' => 'student',
            'notify_to' => $course->id,
            'student_id' => $student_id,
        ]);
    }


    public function notificationToStudentFromEnrolledCourse($course, $student_id)
    {
        Notification::create([
            'title_ar' => 'تنبيه التسجيل في دورة',
            'title_en' => 'Enrolled In Course Notification',
            'details_ar' => ' تم تسجيلك في دورة  ' .'<strong style="color:#dc3545">'. $course->title_ar .'</strong>'.' عليك الانتظار لحين الموافقة علي طلبك ',
            'details_en' => '  Enrolled You In Course  ' .'<strong style="color:#dc3545">'. $course->title_en. '</strong>'.' You have to wait for your order to be approved ',
            'notify_status' => 'send',
            'notify_class' => 'unread',
            'notify_for' => 'student',
            'notify_to' => $course->id,
            'student_id' => $student_id,
        ]);
    }

    public function notificationToStudentForOrderAgreement($course_id, $student_id)
    {
        $course = Course::findOrFail($course_id);
        Notification::create([
            'title_ar' => 'تنبيه الموافقة علي التسجيل في دورة',
            'title_en' => 'Enrolled approved In Course Notification',
            'details_ar' => ' تم الموافقة علي تسجيلك في دورة  ' . $course->title_ar ,
            'details_en' => '  Enrolled approved For Course  ' . $course->title_en,
            'notify_status' => 'send',
            'notify_class' => 'unread',
            'notify_for' => 'student',
            'notify_to' => $course->id,
            'student_id' => $student_id,
        ]);
    }


    public function notificationToStudentForOrderAgreementCancled($course_id, $student_id)
    {

        $course = Course::findOrFail($course_id);
        Notification::create([
            'title_ar' => 'تنبيه الغاء الموافقة علي التسجيل في دورة',
            'title_en' => 'Enrolled approved Canceld In Course Notification',
            'details_ar' => ' تم  الغاء الموافقة علي تسجيلك في دورة  ' . $course->title_ar ,
            'details_en' => '  Enrolled approved Canceld For Course  ' . $course->title_en,
            'notify_status' => 'send',
            'notify_class' => 'unread',
            'notify_for' => 'student',
            'notify_to' => $course->id,
            'student_id' => $student_id,
        ]);
    }

}
