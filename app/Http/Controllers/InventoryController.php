<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $inventories = Inventory::all();
            return view('inventories.index')->with('records', $inventories);
        }catch (\Exception $exception){

            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('inventories.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create');
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

            $inventory = new Inventory();
            $inventory->input_name = $request->input_name;
            $inventory->quantity = $request->quantity;
            $inventory->save();
            toast('Successfully created inventory profile', 'success');
            return redirect()->route('inventories.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('inventories.index');
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
            $inventory = Inventory::find($id);
            return view("inventories.edit")->with("inventory", $inventory);
        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('inventories.index');
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
            $inventory = Inventory::find($id);
            $inventory->input_name = $request->input_name;
            $inventory->quantity = $request->quantity;
            $inventory->save();
            toast('Successfully updated inventory profile', 'success');
            return redirect()->route('inventories.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('inventories.index');
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
            $inventory = Inventory::find($id);
            $inventory->delete();
            toast('Successfully deleted inventory profile', 'success');
            return redirect()->route('inventories.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('inventories.index');
        }
    }
}
