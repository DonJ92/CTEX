<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table = 'lk_users_login_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ip_addr',
        'device',
        'platform',
        'region',
        'accessed_at',
    ];
}