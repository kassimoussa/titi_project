<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'site', 'type', 'image_name' ,'public_path','storage_path'
    ]; 
}
