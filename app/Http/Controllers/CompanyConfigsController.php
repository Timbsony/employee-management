<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Currency;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyConfigs;


class CompanyConfigsController extends Controller
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
            $configs = CompanyConfigs::where('company_id', $userId)->get();
            return view('company-configs.index')->with('records', $configs);
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
        try {
            $userId = Auth::user()->company_id;
            $currencies = Currency::where('company_id', $userId)->get();
            return view('company-configs.create')->with('currencies', $currencies);
        }catch (\Exception $exception){

        }
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
            $userId = Auth::user()->company_id;
            $config = new CompanyConfigs();
            $config->affordability_rate = $request->affordability_rate;
            $config->leave_day_accrual = $request->leave_day_accrual;
            $config->base_currency_id = $request->base_currency_id;
            $config->company_id = $userId;
            $config->save();
            toast('Successfully created company config profile', 'success');
            return redirect()->route('companyConfigs.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('companyConfigs.index');
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

            $userId = Auth::user()->company_id;
            $currencies = Currency::where('company_id', $userId)->get();
            $config = CompanyConfigs::find($id);
            return view("company-configs.edit")->with("config", $config)
                ->with("currencies", $currencies);
        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('companyConfigs.index');
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
            $userId = Auth::user()->company_id;
            $config = CompanyConfigs::find($id);
            $config->affordability_rate = $request->affordability_rate;
            $config->leave_day_accrual = $request->leave_day_accrual;
            $config->base_currency_id = $request->base_currency_id;
            $config->company_id = $userId;
            $config->save();
            toast('Successfully created company config profile', 'success');
            return redirect()->route('companyConfigs.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('companyConfigs.index');
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
            $config = CompanyConfigs::find($id);
            $config->delete();
            toast('Successfully deleted company config profile', 'success');
            return redirect()->route('companyConfigs.index');

        }catch (\Exception $exception){
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('companyConfigs.index');
        }
    }
}
