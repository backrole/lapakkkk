<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wd extends Model
{

    protected $fillable = [
        'users_id',
        'wd',
        'status'
    ];

}
