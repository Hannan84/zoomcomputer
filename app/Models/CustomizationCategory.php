<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizationCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function CustomizeProduct(){
        return $this->hasMany(CustomizationProduct::class);
    }
}
