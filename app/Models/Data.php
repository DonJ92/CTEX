<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'ct_datas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'status',
    ];

    protected $hidden = [
        'created_at',
    ];
}