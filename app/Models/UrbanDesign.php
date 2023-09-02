<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrbanDesign extends Model
{
    use HasFactory;

    protected $table = 'urbandesigns';

    protected $fillable = ['order','order_suffix', 'title', 'place', 'year', 'description', 'monogram', 'thumbnail'];

    public function gallery()
    {
        return $this->hasMany(UrbanDesignGallery::class, 'urbandesign_id');
    }
}
