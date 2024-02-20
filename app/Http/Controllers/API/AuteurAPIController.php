<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAuteurAPIRequest;
use App\Http\Requests\API\UpdateAuteurAPIRequest;
use App\Models\Auteur;
use App\Repositories\AuteurRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class AuteurAPIController
 */
class AuteurAPIController extends AppBaseController
{
    private AuteurRepository $auteurRepository;

    public function __construct(AuteurRepository $auteurRepo)
    {
        $this->auteurRepository = $auteurRepo;
    }

    /**
     * Display a listing of the Auteurs.
     * GET|HEAD /auteurs
     */
    public function index(Request $request): JsonResponse
    {
        $auteurs = $this->auteurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($auteurs->toArray(), 'Auteurs retrieved successfully');
    }

    /**
     * Store a newly created Auteur in storage.
     * POST /auteurs
     */
    public function store(CreateAuteurAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $auteur = $this->auteurRepository->create($input);

        return $this->sendResponse($auteur->toArray(), 'Auteur saved successfully');
    }

    /**
     * Display the specified Auteur.
     * GET|HEAD /auteurs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        return $this->sendResponse($auteur->toArray(), 'Auteur retrieved successfully');
    }

    /**
     * Update the specified Auteur in storage.
     * PUT/PATCH /auteurs/{id}
     */
    public function update($id, UpdateAuteurAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        $auteur = $this->auteurRepository->update($input, $id);

        return $this->sendResponse($auteur->toArray(), 'Auteur updated successfully');
    }

    /**
     * Remove the specified Auteur from storage.
     * DELETE /auteurs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->find($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        $auteur->delete();

        return $this->sendSuccess('Auteur deleted successfully');
    }
}
