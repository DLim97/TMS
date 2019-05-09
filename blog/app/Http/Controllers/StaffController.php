<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;


class StaffController extends Controller
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
        return view('home');
        
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
