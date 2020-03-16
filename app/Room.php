<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','capacity','description','feature_image',
    'projector','dashboard','handicapped','active','ready','category'];
}
