<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        try {
            $userId = Auth::user()->company_id;
            $users = Users::where('company_id', $userId)->get();
            return view('users.index')->with('records', $users);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function changeStatus ($id)
    {
        try {

            $users = Users::where('id', $id)->first();
            if($users->status == 'ACTIVE'){
                $users->status='BLOCKED';
            }else{
                $users->status='ACTIVE';
            }

            $users->save();
            toast('Successfully updated user profile', 'success');
            return redirect()->route('users.index');
        }catch (\Exception $exception){
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('users.index');
        }
    }

    public function changeRole ($id)
    {
        try {

            $users = Users::where('id', $id)->first();
            if($users->role == 'HR'){
                $users->role='EMPLOYEE';
            }else{
                $users->role='HR';
            }

            $users->save();
            toast('Successfully updated user profile', 'success');
            return redirect()->route('users.index');
        }catch (\Exception $exception){
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('users.index');
        }

    }


}
