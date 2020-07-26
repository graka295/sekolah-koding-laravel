<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    // public $timestamps = false;
    protected $guarded = ['id'];
    use SoftDeletes;
    //
}
