<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecialiteRequest;
use App\Http\Requests\UpdateSpecialiteRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SpecialiteRepository;
use Illuminate\Http\Request;
use Flash;

class SpecialiteController extends AppBaseController
{
    /** @var SpecialiteRepository $specialiteRepository*/
    private $specialiteRepository;

    public function __construct(SpecialiteRepository $specialiteRepo)
    {
        $this->specialiteRepository = $specialiteRepo;
    }

    /**
     * Display a listing of the Specialite.
     */
    public function index(Request $request)
    {
        $specialites = $this->specialiteRepository->paginate(10);

        return view('specialites.index')
            ->with('specialites', $specialites);
    }

    /**
     * Show the form for creating a new Specialite.
     */
    public function create()
    {
        return view('specialites.create');
    }

    /**
     * Store a newly created Specialite in storage.
     */
    public function store(CreateSpecialiteRequest $request)
    {
        $input = $request->all();

        $specialite = $this->specialiteRepository->create($input);

        Flash::success('Specialite saved successfully.');

        return redirect(route('specialites.index'));
    }

    /**
     * Display the specified Specialite.
     */
    public function show($id)
    {
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            Flash::error('Specialite not found');

            return redirect(route('specialites.index'));
        }

        return view('specialites.show')->with('specialite', $specialite);
    }

    /**
     * Show the form for editing the specified Specialite.
     */
    public function edit($id)
    {
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            Flash::error('Specialite not found');

            return redirect(route('specialites.index'));
        }

        return view('specialites.edit')->with('specialite', $specialite);
    }

    /**
     * Update the specified Specialite in storage.
     */
    public function update($id, UpdateSpecialiteRequest $request)
    {
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            Flash::error('Specialite not found');

            return redirect(route('specialites.index'));
        }

        $specialite = $this->specialiteRepository->update($request->all(), $id);

        Flash::success('Specialite updated successfully.');

        return redirect(route('specialites.index'));
    }

    /**
     * Remove the specified Specialite from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $specialite = $this->specialiteRepository->find($id);

        if (empty($specialite)) {
            Flash::error('Specialite not found');

            return redirect(route('specialites.index'));
        }

        $this->specialiteRepository->delete($id);

        Flash::success('Specialite deleted successfully.');

        return redirect(route('specialites.index'));
    }
}
