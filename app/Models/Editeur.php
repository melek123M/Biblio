<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editeur extends Model
{
    public $table = 'editeurs';

    public $fillable = [
        'maisonedit',
        'siteweb',
        'email'
    ];

    protected $casts = [
        'maisonedit' => 'string',
        'email' => 'string'
    ];

    public static array $rules = [
        'maisonedit' => 'required,unique',
        'siteweb' => 'required',
        'email' => 'required,unique'
    ];

    
}
