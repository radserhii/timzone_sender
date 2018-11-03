<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name', 'headline', 'message', 'time'];
    public $timestamps = false;
}
