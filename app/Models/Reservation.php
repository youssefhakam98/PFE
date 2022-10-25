<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    // use HasFactory;

    protected $fillable = ["date", "time", "gest", "phone", "name", "email", "message"];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
