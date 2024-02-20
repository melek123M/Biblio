<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEditeurAPIRequest;
use App\Http\Requests\API\UpdateEditeurAPIRequest;
use App\Models\Editeur;
use App\Repositories\EditeurRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EditeurAPIController
 */
class EditeurAPIController extends AppBaseController
{
    private EditeurRepository $editeurRepository;

    public function __construct(EditeurRepository $editeurRepo)
    {
        $this->editeurRepository = $editeurRepo;
    }

    /**
     * Display a listing of the Editeurs.
     * GET|HEAD /editeurs
     */
    public function index(Request $request): JsonResponse
    {
        $editeurs = $this->editeurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($editeurs->toArray(), 'Editeurs retrieved successfully');
    }

    /**
     * Store a newly created Editeur in storage.
     * POST /editeurs
     */
    public function store(CreateEditeurAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $editeur = $this->editeurRepository->create($input);

        return $this->sendResponse($editeur->toArray(), 'Editeur saved successfully');
    }

    /**
     * Display the specified Editeur.
     * GET|HEAD /editeurs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Editeur $editeur */
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            return $this->sendError('Editeur not found');
        }

        return $this->sendResponse($editeur->toArray(), 'Editeur retrieved successfully');
    }

    /**
     * Update the specified Editeur in storage.
     * PUT/PATCH /editeurs/{id}
     */
    public function update($id, UpdateEditeurAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Editeur $editeur */
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            return $this->sendError('Editeur not found');
        }

        $editeur = $this->editeurRepository->update($input, $id);

        return $this->sendResponse($editeur->toArray(), 'Editeur updated successfully');
    }

    /**
     * Remove the specified Editeur from storage.
     * DELETE /editeurs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Editeur $editeur */
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            return $this->sendError('Editeur not found');
        }

        $editeur->delete();

        return $this->sendSuccess('Editeur deleted successfully');
    }
}
