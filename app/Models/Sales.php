<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // use HasFactory;

    protected $fillable = ["user_id","quantity","total_price","total_received","change","pyment_type","payment_status"];


    public function menus()
    {
       return $this->belongsToMany(Menu::class);
    }


    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }


    public function servants()
    { 
        return $this->belongsToMany(Servants::class);
    }


}
