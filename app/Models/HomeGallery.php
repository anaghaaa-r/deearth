<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    use HasFactory;

    protected $table = 'home_gallery';

    protected $fillable = ['image'];

    public function home()
    {
        return $this->belongsTo(Home::class, 'home_id');
    }
}
