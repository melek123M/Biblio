<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSpecialiteAPIRequest;
use App\Http\Requests\API\UpdateSpecialiteAPIRequest;
use App\Models\Specialite;
use App\Repositories\SpecialiteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SpecialiteAPIController
 */
class SpecialiteAPIController extends AppBaseController
{
    private SpecialiteRepository $specialiteRepository;

    public function __construct(SpecialiteRepository $specialiteRepo)
    {
        $this->specialiteRepository = $specialiteRepo;
    }

    /**
     * Display a listing of the Specialites.
     * GET|HEAD /specialites
     */
    public function index(Request $request): JsonResponse
    {
        $specialites = $this->specialiteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($specialites->toArray(), 'Specialites retrieved successfully');
    }

    /**
     * Store a newly created Specialite in storage.
     * POST /specialites
     */
    public function store(CreateSpecialiteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $specialite = $this->specialiteRepository->create($input);

        return $this->sendResponse($specialite->toArray(), 'Specialite saved successfully');
    }

    /**
     * Display the specified Specialite.
     * GET|HEAD /specialites/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Specialite $specialite */
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            return $this->sendError('Specialite not found');
        }

        return $this->sendResponse($specialite->toArray(), 'Specialite retrieved successfully');
    }

    /**
     * Update the specified Specialite in storage.
     * PUT/PATCH /specialites/{id}
     */
    public function update($id, UpdateSpecialiteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Specialite $specialite */
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            return $this->sendError('Specialite not found');
        }

        $specialite = $this->specialiteRepository->update($input, $id);

        return $this->sendResponse($specialite->toArray(), 'Specialite updated successfully');
    }

    /**
     * Remove the specified Specialite from storage.
     * DELETE /specialites/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Specialite $specialite */
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            return $this->sendError('Specialite not found');
        }

        $specialite->delete();

        return $this->sendSuccess('Specialite deleted successfully');
    }
}
