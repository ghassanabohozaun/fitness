<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'patients';

    protected $fillable = ['name', 'email', 'age',  'mobile', 'gender','password', 'photo', 'status', 'freeze', 'notification_id', 'last_login_at', 'last_login_ip', 'remember_token'];

    protected $hidden = ['created_at', 'updated_at', 'remember_token'];

    // relations
    // notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
