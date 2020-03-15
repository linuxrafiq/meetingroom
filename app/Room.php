<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['capacity','description','featured_image',
    'has_projector','has_dashboard','has_handicapped','is_active','is_ready',
    'category'];
}
