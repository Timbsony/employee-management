<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $farmers = Farmer::all();
            return view('farmers.index')->with('records', $farmers);
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
        return view('farmers.create');

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

            $farmer = new Farmer();
            $farmer->surname = $request->surname;
            $farmer->first_name = $request->first_name;
            $farmer->middle_name = $request->middle_name;
            $farmer->alias = $request->alias;
            $farmer->national_id = $request->national_id;
            $farmer->gender = $request->gender;
            $farmer->dob = $request->dob;
            $farmer->email = $request->email;
            $farmer->phone_number = $request->phone_number;
            $farmer->residential_address = $request->residential_address;
            $farmer->postal_address = $request->postal_address;
            $farmer->image = $request->image;
            $farmer->save();
            toast('Successfully created farmer profile', 'success');
            return redirect()->route('farmers.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farmers.index');
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
        //
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
        $farmer = Farmer::find($id);
        return view("farmers.edit")->with("farmer", $farmer);
            }catch (\Exception $exception){
        return $exception;
        toast('Failed to update,contact system administrator', 'error');
        return redirect()->route('farmers.index');
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
            $farmer = Farmer::find($id);
            $farmer->surname = $request->surname;
            $farmer->first_name = $request->first_name;
            $farmer->middle_name = $request->middle_name;
            $farmer->alias = $request->alias;
            $farmer->national_id = $request->national_id;
            $farmer->gender = $request->gender;
            $farmer->dob = $request->dob;
            $farmer->email = $request->email;
            $farmer->phone_number = $request->phone_number;
            $farmer->residential_address = $request->residential_address;
            $farmer->postal_address = $request->postal_address;
            $farmer->image = $request->image;
            $farmer->save();
            toast('Successfully updated farmer profile', 'success');
            return redirect()->route('farmers.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farmers.index');
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
            $farmer = Farmer::find($id);
            $farmer->delete();
            toast('Successfully deleted farmer profile', 'success');
            return redirect()->route('farmers.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('farmers.index');
        }
    }
}
