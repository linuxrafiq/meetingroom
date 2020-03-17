<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=['booking_date', 'description','user','room',
                         'client', 'category'];

}
