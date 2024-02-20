<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLivreAPIRequest;
use App\Http\Requests\API\UpdateLivreAPIRequest;
use App\Models\Livre;
use App\Repositories\LivreRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class LivreAPIController
 */
class LivreAPIController extends AppBaseController
{
    private LivreRepository $livreRepository;

    public function __construct(LivreRepository $livreRepo)
    {
        $this->livreRepository = $livreRepo;
    }

    /**
     * Display a listing of the Livres.
     * GET|HEAD /livres
     */
    public function index(Request $request): JsonResponse
    {
        $livres = $this->livreRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($livres->toArray(), 'Livres retrieved successfully');
    }

    /**
     * Store a newly created Livre in storage.
     * POST /livres
     */
    public function store(CreateLivreAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $livre = $this->livreRepository->create($input);

        return $this->sendResponse($livre->toArray(), 'Livre saved successfully');
    }

    /**
     * Display the specified Livre.
     * GET|HEAD /livres/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Livre $livre */
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            return $this->sendError('Livre not found');
        }

        return $this->sendResponse($livre->toArray(), 'Livre retrieved successfully');
    }

    /**
     * Update the specified Livre in storage.
     * PUT/PATCH /livres/{id}
     */
    public function update($id, UpdateLivreAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Livre $livre */
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            return $this->sendError('Livre not found');
        }

        $livre = $this->livreRepository->update($input, $id);

        return $this->sendResponse($livre->toArray(), 'Livre updated successfully');
    }

    /**
     * Remove the specified Livre from storage.
     * DELETE /livres/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Livre $livre */
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            return $this->sendError('Livre not found');
        }

        $livre->delete();

        return $this->sendSuccess('Livre deleted successfully');
    }
}
