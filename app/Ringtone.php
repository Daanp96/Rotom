<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ringtone extends Model
{
    protected $table = 'ringtone';
    public $timestamps = false;
    use SoftDeletes;
}
