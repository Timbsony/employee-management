<?php

namespace App\Http\Controllers;

use App\Models\RequisitionInput;
use Illuminate\Http\Request;

class RequisitionInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $inputs = RequisitionInput::all();
            return view('requisition-inputs.index')->with('records', $inputs);
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
        return view('requisition-inputs.create');
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

            $input = new RequisitionInput();
            $input->input_name = $request->input_name;
            $input->amount_requested = $request->amount_requested;
            $input->reason_for_request = $request->reason_for_request;
            $input->loan_classification = $request->loan_classification;
            $input->interest_rate = $request->interest_rate;
            $input->payment_period_months = $request->payment_period_months;
            $input->acknowledgement_of_debt_signed = $request->acknowledgement_of_debt_signed;
            $input->save();
            toast('Successfully created Requisition Input profile', 'success');
            return redirect()->route('requisitionInputs.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('requisitionInputs.index');
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
            $input = RequisitionInput::find($id);
            return view("requisition-inputs.edit")->with("input", $input);
        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('requisitionInputs.index');
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
            $input= RequisitionInput::find($id);
             $input->input_name = $request->input_name;
             $input->amount_requested = $request->amount_requested;
             $input->reason_for_request = $request->reason_for_request;
             $input->loan_classification = $request->loan_classification;
             $input->interest_rate = $request->interest_rate;
             $input->payment_period_months = $request->payment_period_months;
             $input->acknowledgement_of_debt_signed = $request->acknowledgement_of_debt_signed;
             $input->save();
             toast('Successfully updated Requisition Input profile', 'success');
             return redirect()->route('requisitionInputs.index');

         }catch (\Exception $exception){
             return $exception;
             toast('Failed to update,contact system administrator', 'error');
             return redirect()->route('requisitionInputs.index');
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
            $input = RequisitionInput::find($id);
            $input->delete();
            toast('Successfully deleted Requisition input profile', 'success');
            return redirect()->route('requisitionInputs.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('requisitionInputs.index');
        }
    }
}
