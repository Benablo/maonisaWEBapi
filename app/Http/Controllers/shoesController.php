<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateshoesRequest;
use App\Http\Requests\UpdateshoesRequest;
use App\Repositories\shoesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shoesController extends AppBaseController
{
    /** @var  shoesRepository */
    private $shoesRepository;

    public function __construct(shoesRepository $shoesRepo)
    {
        $this->shoesRepository = $shoesRepo;
    }

    /**
     * Display a listing of the shoes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shoes = $this->shoesRepository->all();

        return view('shoes.index')
            ->with('shoes', $shoes);
    }

    /**
     * Show the form for creating a new shoes.
     *
     * @return Response
     */
    public function create()
    {
        return view('shoes.create');
    }

    /**
     * Store a newly created shoes in storage.
     *
     * @param CreateshoesRequest $request
     *
     * @return Response
     */
    public function store(CreateshoesRequest $request)
    {
        $input = $request->all();

        $shoes = $this->shoesRepository->create($input);

        Flash::success('Shoes saved successfully.');

        return redirect(route('shoes.index'));
    }

    /**
     * Display the specified shoes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shoes = $this->shoesRepository->find($id);

        if (empty($shoes)) {
            Flash::error('Shoes not found');

            return redirect(route('shoes.index'));
        }

        return view('shoes.show')->with('shoes', $shoes);
    }

    /**
     * Show the form for editing the specified shoes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shoes = $this->shoesRepository->find($id);

        if (empty($shoes)) {
            Flash::error('Shoes not found');

            return redirect(route('shoes.index'));
        }

        return view('shoes.edit')->with('shoes', $shoes);
    }

    /**
     * Update the specified shoes in storage.
     *
     * @param int $id
     * @param UpdateshoesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateshoesRequest $request)
    {
        $shoes = $this->shoesRepository->find($id);

        if (empty($shoes)) {
            Flash::error('Shoes not found');

            return redirect(route('shoes.index'));
        }

        $shoes = $this->shoesRepository->update($request->all(), $id);

        Flash::success('Shoes updated successfully.');

        return redirect(route('shoes.index'));
    }

    /**
     * Remove the specified shoes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shoes = $this->shoesRepository->find($id);

        if (empty($shoes)) {
            Flash::error('Shoes not found');

            return redirect(route('shoes.index'));
        }

        $this->shoesRepository->delete($id);

        Flash::success('Shoes deleted successfully.');

        return redirect(route('shoes.index'));
    }
}
