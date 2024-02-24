<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;



class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'post_code',
        'address',
        'tel_num',
        'term',
    ];

    public function item(){
        return $this->hasMany(Item::class); 
    }

}


