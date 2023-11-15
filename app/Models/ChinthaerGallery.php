<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChinthaerGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];

    public function chinthaer()
    {
        return $this->belongsTo(Chinthaer::class, 'chinthaer_id');
    }
}
