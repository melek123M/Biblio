<?php

namespace App\Repositories;

use App\Models\Auteur;
use App\Repositories\BaseRepository;

class AuteurRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nomauteur',
        'email',
        'numtel'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Auteur::class;
    }
}
