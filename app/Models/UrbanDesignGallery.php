<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrbanDesignGallery extends Model
{
    use HasFactory;

    protected $table = 'urbandesigns_gallery';

    protected $fillable = ['image'];

    public function urbandesign()
    {
        return $this->belongsTo(UrbanDesign::class, 'urbandesign_id');
    }
}
