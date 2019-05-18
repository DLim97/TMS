<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;


class StaffController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {   
        $regions = \App\Models\Region::get();
        $countries = \App\Models\Country::get();
        $places = \App\Models\Place::get();
        $travels = \App\Models\Travel::get();
        $hotels = \App\Models\Hotel::get();
        $orders = \App\Models\Order::get();
        $activities = \App\Models\Hotel::get();

        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        $f = 0;
        $g = 0;
        $h = 0;
        $i = 0;
        $j = 0;
        $k = 0;
        $l = 0;

        foreach ($travels as $travel) {

            $month = $travel->Start_date->month;

            if($month == 1){
                $a++;
            }
            else if($month == 2){
                $b++;
            }
            else if($month == 3){
                $c++;
            }
            else if($month == 4){
                $d++;
            }
            else if($month == 5){
                $e++;
            }
            else if($month == 6){
                $f++;
            }
            else if($month == 7){
                $g++;
            }
            else if($month == 8){
                $h++;
            }
            else if($month == 9){
                $i++;
            }
            else if($month == 10){
                $j++;
            }
            else if($month == 11){
                $k++;
            }
            else if($month == 12){
                $l++;
            }
        }

        $month_array = [$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l];

        return view('home', compact('countries','travels', 'places', 'travels', 'hotels', 'orders', 'regions', 'activities','month_array'));
        
    }


    public function index(Request $request)
    {

        $staffs = \App\Staff::get();

        return view('staffs.index')
        ->with('staffs', $staffs);
    }


    /**
     * Show the form for creating a new region.
     *
     * @return Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created region in storage.
     *
     * @param CreateregionRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'ic' => 'required',
            'gender' => 'required',
            'DOB' => 'required',
            'address' => 'required',
            'marital' => 'required',
            'password' => 'required',
            'job_title' => 'required',
            'ic' => 'required|min:12|max:12',
        ]);

        $staff = new \App\Staff;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password =  Hash::make($request->password);
        $staff->gender = $request->gender;
        $staff->ic = $request->ic;
        $staff->marital = $request->marital;
        $staff->job_title = $request->job_title;
        $staff->address = $request->address;
        $staff->DOB = $request->DOB;
        $staff->save();

        Flash::success('Staff saved successfully.');

        return redirect(route('staffPage.index'));
    }

    /**
     * Display the specified region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staff = \App\Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffPage.index'));
        }

        return view('staffs.show')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staff = \App\Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffPage.index'));
        }

        return view('staffs.edit')->with('staff', $staff);
    }

    /**
     * Update the specified region in storage.
     *
     * @param  int              $id
     * @param UpdateregionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $staff = \App\Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffPage.index'));
        }

        $request->validate([
            'name' => 'required',
            'ic' => 'required',
            'gender' => 'required',
            'DOB' => 'required',
            'address' => 'required',
            'marital' => 'required',
            'password' => 'required',
            'job_title' => 'required',
            'ic' => 'required|min:12|max:12',
        ]);

        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password =  Hash::make($request->password);
        $staff->gender = $request->gender;
        $staff->ic = $request->ic;
        $staff->marital = $request->marital;
        $staff->job_title = $request->job_title;
        $staff->address = $request->address;
        $staff->DOB = $request->DOB;
        $staff->save();

        Flash::success('Staff updated successfully.');

        return redirect(route('staffPage.index'));
    }

    /**
     * Remove the specified region from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staff = \App\Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffPage.index'));
        }

        $staff->delete($id);

        Flash::success('Staff deleted successfully.');

        return redirect(route('staffPage.index'));
    }
}
