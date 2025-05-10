<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = "certifications";
    protected $fillable = ['student_id', 'course_id', 'status', 'file'];
    protected $hidden = ['created_at','updated_at'];
}
