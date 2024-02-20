<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLivreRequest;
use App\Http\Requests\UpdateLivreRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LivreRepository;
use Illuminate\Http\Request;
use Flash;

class LivreController extends AppBaseController
{
    /** @var LivreRepository $livreRepository*/
    private $livreRepository;

    public function __construct(LivreRepository $livreRepo)
    {
        $this->livreRepository = $livreRepo;
    }

    /**
     * Display a listing of the Livre.
     */
    public function index(Request $request)
    {
        $livres = $this->livreRepository->paginate(10);

        return view('livres.index')
            ->with('livres', $livres);
    }

    /**
     * Show the form for creating a new Livre.
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Store a newly created Livre in storage.
     */
    public function store(CreateLivreRequest $request)
    {
        $input = $request->all();

        $livre = $this->livreRepository->create($input);

        Flash::success('Livre saved successfully.');

        return redirect(route('livres.index'));
    }

    /**
     * Display the specified Livre.
     */
    public function show($id)
    {
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            Flash::error('Livre not found');

            return redirect(route('livres.index'));
        }

        return view('livres.show')->with('livre', $livre);
    }

    /**
     * Show the form for editing the specified Livre.
     */
    public function edit($id)
    {
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            Flash::error('Livre not found');

            return redirect(route('livres.index'));
        }

        return view('livres.edit')->with('livre', $livre);
    }

    /**
     * Update the specified Livre in storage.
     */
    public function update($id, UpdateLivreRequest $request)
    {
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            Flash::error('Livre not found');

            return redirect(route('livres.index'));
        }

        $livre = $this->livreRepository->update($request->all(), $id);

        Flash::success('Livre updated successfully.');

        return redirect(route('livres.index'));
    }

    /**
     * Remove the specified Livre from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $livre = $this->livreRepository->find($id);

        if (empty($livre)) {
            Flash::error('Livre not found');

            return redirect(route('livres.index'));
        }

        $this->livreRepository->delete($id);

        Flash::success('Livre deleted successfully.');

        return redirect(route('livres.index'));
    }
}
