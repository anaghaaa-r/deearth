<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chinthaer extends Model
{
    use HasFactory;

    protected $table = 'chinthaers';

    protected $fillable = ['order','order_suffix', 'name', 'description', 'image'];
}
