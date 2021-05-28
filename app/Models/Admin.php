<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    use SoftDeletes;
    
    const ROLE_ADMIN = 1;
    const ROLE_EDITER = 2;
    const ROLE_SHIPPER = 3;
    // const ROLE_USER = 4;

    protected $table = 'admins';
    
    protected $guarded = [];

    public const STATUS = [
        1,
        2,
        3,
    ];
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'role_id',
        'password',
        'remember_token',
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
