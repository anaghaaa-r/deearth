<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $fillable = ['order','order_suffix', 'name', 'description', 'image'];

    public function gallery()
    {
        return $this->hasMany(PublicationsGallery::class, 'publication_id');
    }
}
