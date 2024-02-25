<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    public $table = 'auteurs';

    public $fillable = [
        'nomauteur',
        'email',
        'numtel'
    ];

    protected $casts = [
        'nomauteur' => 'string',
        'email' => 'string',
        'numtel' => 'string'
    ];

    public static array $rules = [
        'nomauteur' => 'required',
        'email' => 'email|required|unique:auteurs',
        'numtel' => 'required'
    ];

    
}
