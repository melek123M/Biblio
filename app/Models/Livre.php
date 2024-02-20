<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public $table = 'livres';

    public $fillable = [
        'isbn',
        'titre',
        'annedition',
        'prix',
        'qtestock',
        'couverture',
        'maised'
    ];

    protected $casts = [
        'isbn' => 'string',
        'titre' => 'string',
        'annedition' => 'integer',
        'prix' => 'float',
        'qtestock' => 'integer',
        'couverture' => 'string'
    ];

    public static array $rules = [
        'isbn' => 'required',
        'titre' => 'required',
        'annedition' => 'required|integer',
        'prix' => 'required|numeric',
        'qtestock' => 'required',
        'couverture' => 'required',
        'maised' => 'required|integer'
    ];

    public function editeur()
    {
        return $this->belongsTo(Editeur::class, 'editeur_id');
    }
    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'specialite_id');
    }
    public function auteurs()
    {
        return $this->belongsToMany(
            Auteur::class,
            'livre_auteur',
            'livre_id',
            'auteur_id'
        );
    }
}
