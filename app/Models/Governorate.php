<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $table ='governorates';
    protected $fillable=[
        'name',
        'deleted_at',


    ];
    
    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function halls(){
        return $this->hasMany(Hall::class);
    }
}
