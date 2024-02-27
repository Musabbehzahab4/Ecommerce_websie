<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;


class Product_color extends Model
{
    use HasFactory;
    protected $table = 'product_colors';

    public function productcolor()
    {
        return $this->belongsTo(Color::class,'color_id');
    }

}
