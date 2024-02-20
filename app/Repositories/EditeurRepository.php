<?php

namespace App\Repositories;

use App\Models\Editeur;
use App\Repositories\BaseRepository;

class EditeurRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'maisonedit',
        'siteweb',
        'email'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Editeur::class;
    }
}
