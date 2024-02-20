<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditeurRequest;
use App\Http\Requests\UpdateEditeurRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EditeurRepository;
use Illuminate\Http\Request;
use Flash;

class EditeurController extends AppBaseController
{
    /** @var EditeurRepository $editeurRepository*/
    private $editeurRepository;

    public function __construct(EditeurRepository $editeurRepo)
    {
        $this->editeurRepository = $editeurRepo;
    }

    /**
     * Display a listing of the Editeur.
     */
    public function index(Request $request)
    {
        $editeurs = $this->editeurRepository->paginate(10);

        return view('editeurs.index')
            ->with('editeurs', $editeurs);
    }

    /**
     * Show the form for creating a new Editeur.
     */
    public function create()
    {
        return view('editeurs.create');
    }

    /**
     * Store a newly created Editeur in storage.
     */
    public function store(CreateEditeurRequest $request)
    {
        $input = $request->all();

        $editeur = $this->editeurRepository->create($input);

        Flash::success('Editeur saved successfully.');

        return redirect(route('editeurs.index'));
    }

    /**
     * Display the specified Editeur.
     */
    public function show($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('editeurs.index'));
        }

        return view('editeurs.show')->with('editeur', $editeur);
    }

    /**
     * Show the form for editing the specified Editeur.
     */
    public function edit($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('editeurs.index'));
        }

        return view('editeurs.edit')->with('editeur', $editeur);
    }

    /**
     * Update the specified Editeur in storage.
     */
    public function update($id, UpdateEditeurRequest $request)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('editeurs.index'));
        }

        $editeur = $this->editeurRepository->update($request->all(), $id);

        Flash::success('Editeur updated successfully.');

        return redirect(route('editeurs.index'));
    }

    /**
     * Remove the specified Editeur from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $editeur = $this->editeurRepository->find($id);

        if (empty($editeur)) {
            Flash::error('Editeur not found');

            return redirect(route('editeurs.index'));
        }

        $this->editeurRepository->delete($id);

        Flash::success('Editeur deleted successfully.');

        return redirect(route('editeurs.index'));
    }
}
