<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizationProduct extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function CustomizeCategory(){
        return $this->belongsTo(CustomizationCategory::class);
    }
}
