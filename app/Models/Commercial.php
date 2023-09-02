<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $table = 'commercials';

    protected $fillable = ['order','order_suffix', 'title', 'place', 'year', 'description', 'monogram', 'thumbnail'];

    public function gallery()
    {
        return $this->hasMany(CommercialGallery::class, 'commercial_id');
    }
}
