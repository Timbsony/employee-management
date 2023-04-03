<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $farms= Farm::all();
            return view('farms.index')->with('records', $farms);
        }catch (\Exception $exception){

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $farm = new Farm();
            $farm->business_name = $request->business_name;
            $farm->legal_owner_name = $request->legal_owner_name;
            $farm->geo_location_id = $request->geo_location_id;
            $farm->farm_size_ha = $request->farm_size_ha;
            $farm->farm_size_acres = $request->farm_size_acres;
            $farm->save();
            toast('Successfully created farm profile', 'success');
            return redirect()->route('farms.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farms.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $farm = Farm::find($id);
            return view("farms.edit")->with("farm", $farm);
        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farms.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $farm = Farm::find($id);
            $farm->business_name = $request->business_name;
            $farm->legal_owner_name = $request->legal_owner_name;
            $farm->geo_location_id = $request->geo_location_id;
            $farm->farm_size_ha = $request->farm_size_ha;
            $farm->farm_size_acres = $request->farm_size_acres;
            $farm->save();
            toast('Successfully updated farm profile', 'success');
            return redirect()->route('farms.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farms.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $farm = Farm::find($id);
            $farm->delete();
            toast('Successfully deleted farm profile', 'success');
            return redirect()->route('farms.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farms.index');
        }
    }
}
