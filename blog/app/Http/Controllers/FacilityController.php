<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Repositories\FacilityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

class FacilityController extends AppBaseController
{
    /** @var  FacilityRepository */
    private $facilityRepository;

    public function __construct(FacilityRepository $facilityRepo)
    {
        $this->facilityRepository = $facilityRepo;
    }

    /**
     * Display a listing of the Facility.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->facilityRepository->pushCriteria(new RequestCriteria($request));
        $facilities = $this->facilityRepository->all();

        return view('facilities.index')
            ->with('facilities', $facilities);
    }

    /**
     * Show the form for creating a new Facility.
     *
     * @return Response
     */
    public function create()
    {
        return view('facilities.create');
    }

    /**
     * Store a newly created Facility in storage.
     *
     * @param CreateFacilityRequest $request
     *
     * @return Response
     */
    public function store(CreateFacilityRequest $request)
    {
        $input = $request->all();

        $facility = $this->facilityRepository->create($input);

        $this->validate($request, [
            'Facility_IMG.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('Facility_IMG'))
        {
            $image = $request->file('Facility_IMG');
            $filename = $request->Facility_Name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(25, 25)->save( public_path('/uploads/facilities/' . $filename) );
            $facility->Facility_IMG = '/uploads/facilities/' . $filename;
            $facility->save();
        }

        Flash::success('Facility saved successfully.');

        return redirect(route('facilities.index'));
    }

    /**
     * Display the specified Facility.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facility = $this->facilityRepository->findWithoutFail($id);

        if (empty($facility)) {
            Flash::error('Facility not found');

            return redirect(route('facilities.index'));
        }

        return view('facilities.show')->with('facility', $facility);
    }

    /**
     * Show the form for editing the specified Facility.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facility = $this->facilityRepository->findWithoutFail($id);

        if (empty($facility)) {
            Flash::error('Facility not found');

            return redirect(route('facilities.index'));
        }

        return view('facilities.edit')->with('facility', $facility);
    }

    /**
     * Update the specified Facility in storage.
     *
     * @param  int              $id
     * @param UpdateFacilityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacilityRequest $request)
    {
        $facility = $this->facilityRepository->findWithoutFail($id);

        if (empty($facility)) {
            Flash::error('Facility not found');

            return redirect(route('facilities.index'));
        }

        $facility = $this->facilityRepository->update($request->all(), $id);

        $this->validate($request, [
            'Facility_IMG.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('Facility_IMG'))
        {
            $image = $request->file('Facility_IMG');
            $filename = $request->Facility_Name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/facilities/' . $filename) );
            $facility->Facility_IMG = '/uploads/facilities/' . $filename;
            $facility->save();
        }

        Flash::success('Facility updated successfully.');

        return redirect(route('facilities.index'));
    }

    /**
     * Remove the specified Facility from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facility = $this->facilityRepository->findWithoutFail($id);

        if (empty($facility)) {
            Flash::error('Facility not found');

            return redirect(route('facilities.index'));
        }

        $this->facilityRepository->delete($id);

        Flash::success('Facility deleted successfully.');

        return redirect(route('facilities.index'));
    }
}
