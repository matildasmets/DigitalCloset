<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
    protected $fillable = ['user_id', 'name', 'photo', 'type'];
    public $timestamps = false;
}
