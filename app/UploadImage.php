<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    //
    protected $fillable = [
        'title', 'image'
    ];
}
