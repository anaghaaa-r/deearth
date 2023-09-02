<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $table = 'institutions';

    protected $fillable = ['order','order_suffix', 'title', 'place', 'year', 'description', 'monogram', 'thumbnail'];

    public function gallery()
    {
        return $this->hasMany(InstitutionGallery::class, 'institution_id');
    }
}
