<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use App\Repositories\ItineraryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItineraryController extends AppBaseController
{
    /** @var  ItineraryRepository */
    private $itineraryRepository;

    public function __construct(ItineraryRepository $itineraryRepo)
    {
        $this->itineraryRepository = $itineraryRepo;
    }

    /**
     * Display a listing of the Itinerary.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itineraryRepository->pushCriteria(new RequestCriteria($request));
        $itineraries = $this->itineraryRepository->all();

        return view('itineraries.index')
            ->with('itineraries', $itineraries);
    }

    /**
     * Show the form for creating a new Itinerary.
     *
     * @return Response
     */
    public function create()
    {
        return view('itineraries.create');
    }

    /**
     * Store a newly created Itinerary in storage.
     *
     * @param CreateItineraryRequest $request
     *
     * @return Response
     */
    public function store(CreateItineraryRequest $request)
    {
        $input = $request->all();

        $itinerary = $this->itineraryRepository->create($input);

        Flash::success('Itinerary saved successfully.');

        return redirect(route('itineraries.index'));
    }

    /**
     * Display the specified Itinerary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            Flash::error('Itinerary not found');

            return redirect(route('itineraries.index'));
        }

        return view('itineraries.show')->with('itinerary', $itinerary);
    }

    /**
     * Show the form for editing the specified Itinerary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            Flash::error('Itinerary not found');

            return redirect(route('itineraries.index'));
        }

        return view('itineraries.edit')->with('itinerary', $itinerary);
    }

    /**
     * Update the specified Itinerary in storage.
     *
     * @param  int              $id
     * @param UpdateItineraryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItineraryRequest $request)
    {
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            Flash::error('Itinerary not found');

            return redirect(route('itineraries.index'));
        }

        $itinerary = $this->itineraryRepository->update($request->all(), $id);

        Flash::success('Itinerary updated successfully.');

        return redirect(route('itineraries.index'));
    }

    /**
     * Remove the specified Itinerary from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            Flash::error('Itinerary not found');

            return redirect(route('itineraries.index'));
        }

        $this->itineraryRepository->delete($id);

        Flash::success('Itinerary deleted successfully.');

        return redirect(route('itineraries.index'));
    }
}
