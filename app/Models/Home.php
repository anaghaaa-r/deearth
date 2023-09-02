<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = ['order', 'order_suffix', 'title', 'place', 'year', 'description', 'monogram', 'thumbnail'];

    public function gallery()
    {
        return $this->hasMany(HomeGallery::class, 'home_id');
    }
}
