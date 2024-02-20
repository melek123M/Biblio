<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    public $table = 'specialites';

    public $fillable = [
        'nomspecialite'
    ];

    protected $casts = [
        'nomspecialite' => 'string'
    ];

    public static array $rules = [
        'nomspecialite' => 'required,unique'
    ];

    
}
