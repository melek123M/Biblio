<?php

namespace App\Repositories;

use App\Models\Specialite;
use App\Repositories\BaseRepository;

class SpecialiteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nomspecialite'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Specialite::class;
    }
}
