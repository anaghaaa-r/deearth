<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialGallery extends Model
{
    use HasFactory;

    protected $table = 'commercials_gallery';

    protected $fillable = ['image'];

    public function commercial()
    {
        return $this->belongsTo(Commercial::class, 'commercial_id');
    }
}
