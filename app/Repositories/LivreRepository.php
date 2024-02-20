<?php

namespace App\Repositories;

use App\Models\Livre;
use App\Repositories\BaseRepository;

class LivreRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'isbn',
        'titre',
        'annedition',
        'prix',
        'qtestock',
        'couverture',
        'maised'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Livre::class;
    }
}
