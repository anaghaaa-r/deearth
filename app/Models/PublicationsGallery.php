<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsGallery extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
