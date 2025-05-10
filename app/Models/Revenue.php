<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';
    protected $fillable = ['student_id', 'revenue_for', 'date', 'value', 'details', 'payer_id', 'payment_id', 'token', 'payment_method'];
    protected $hidden = ['updated_at'];

    // relations
    // student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //////////////////////////////////// accessors ///////////////////////
    /// details accessors
    public function getDetailsAttribute($value)
    {
        if ($value == 'enroll_course') {
            return __('revenues.enroll_course');
        } else {
            return __('revenues.enroll');
        }
    }

        /// payment_method accessors
        public function getPaymentMethodAttribute($value)
        {
            if ($value == 'dashboard') {
                return __('revenues.dashboard');
            } elseif( $value == 'payment_gateway') {
                return __('revenues.payment_gateway');
            }
        }
}
