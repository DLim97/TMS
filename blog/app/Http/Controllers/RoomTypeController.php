<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Repositories\RoomTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

class RoomTypeController extends AppBaseController
{
    /** @var  RoomTypeRepository */
    private $roomTypeRepository;

    public function __construct(RoomTypeRepository $roomTypeRepo)
    {
        $this->roomTypeRepository = $roomTypeRepo;
    }

    /**
     * Display a listing of the RoomType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roomTypeRepository->pushCriteria(new RequestCriteria($request));
        $roomTypes = $this->roomTypeRepository->all();

        return view('room_types.index')
            ->with('roomTypes', $roomTypes);
    }

    /**
     * Show the form for creating a new RoomType.
     *
     * @return Response
     */
    public function create()
    {
        return view('room_types.create');
    }

    /**
     * Store a newly created RoomType in storage.
     *
     * @param CreateRoomTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomTypeRequest $request)
    {
        $input = $request->all();

        $roomType = $this->roomTypeRepository->create($input);

        $this->validate($request, [
            'RoomType_IMG.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('RoomType_IMG'))
        {
            $image = $request->file('RoomType_IMG');
            $filename = $request->RoomType_Name . '_' . $roomType->hotel->Hotel_Name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/roomTypes/' . $filename) );
            $roomType->RoomType_IMG = '/uploads/roomTypes/' . $filename;
            $roomType->save();
        }

        Flash::success('Room Type saved successfully.');

        return redirect(route('roomTypes.index'));
    }

    /**
     * Display the specified RoomType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roomType = $this->roomTypeRepository->findWithoutFail($id);

        if (empty($roomType)) {
            Flash::error('Room Type not found');

            return redirect(route('roomTypes.index'));
        }

        return view('room_types.show')->with('roomType', $roomType);
    }

    /**
     * Show the form for editing the specified RoomType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomType = $this->roomTypeRepository->findWithoutFail($id);

        if (empty($roomType)) {
            Flash::error('Room Type not found');

            return redirect(route('roomTypes.index'));
        }

        return view('room_types.edit')->with('roomType', $roomType);
    }

    /**
     * Update the specified RoomType in storage.
     *
     * @param  int              $id
     * @param UpdateRoomTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomTypeRequest $request)
    {
        $roomType = $this->roomTypeRepository->findWithoutFail($id);

        if (empty($roomType)) {
            Flash::error('Room Type not found');

            return redirect(route('roomTypes.index'));
        }

        $roomType = $this->roomTypeRepository->update($request->all(), $id);


        $this->validate($request, [
            'RoomType_IMG.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('RoomType_IMG'))
        {
            $image = $request->file('RoomType_IMG');
            $filename = $request->RoomType_Name . '_' . $roomType->hotel->Hotel_Name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save( public_path('/uploads/roomTypes/' . $filename) );
            $roomType->RoomType_IMG = '/uploads/roomTypes/' . $filename;
            $roomType->save();
        }

        Flash::success('Room Type updated successfully.');

        return redirect(route('roomTypes.index'));
    }

    /**
     * Remove the specified RoomType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roomType = $this->roomTypeRepository->findWithoutFail($id);

        if (empty($roomType)) {
            Flash::error('Room Type not found');

            return redirect(route('roomTypes.index'));
        }

        $this->roomTypeRepository->delete($id);

        Flash::success('Room Type deleted successfully.');

        return redirect(route('roomTypes.index'));
    }
}
