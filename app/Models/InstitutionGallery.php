<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionGallery extends Model
{
    use HasFactory;

    protected $table = 'institutions_gallery';

    protected $fillable = ['image'];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
}
