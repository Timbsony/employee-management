<?php

namespace App\Http\Controllers;

use App\Models\RequisitionCash;
use Illuminate\Http\Request;

class RequisitionCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cash = RequisitionCash::all();
            return view('requisition-cash.index')->with('records', $cash);
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
        return view('requisition-cash.create');
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

            $cash = new RequisitionCash();
            $cash->amount_requested = $request->amount_requested;
            $cash->reason_for_request = $request->reason_for_request;
            $cash->loan_classification = $request->loan_classification;
            $cash->interest_rate = $request->interest_rate;
            $cash->payment_period_months = $request->payment_period_months;
            $cash->acknowledgement_of_debt_signed = $request->acknowledgement_of_debt_signed;
            $cash->save();
            toast('Successfully created Requisition Cash profile', 'success');
            return redirect()->route('requisitionCash.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('requisitionCash.index');
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
        //
    }
}
