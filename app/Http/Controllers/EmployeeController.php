<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $employees = Employee::all();
            return view('employees.index')->with('employees', $employees);
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
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:employees",
            "phone" => "required",
            "designation" => "required",
        ]);
        try {

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->designation = $request->designation;
            $employee->save();

            toast('Successfully created Employee ', 'success');
            return redirect()->route('employees.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to create employee,contact system administrator', 'error');
            return redirect()->route('employees.index');
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
            $employee = Employee::find($id);
            return view("employees.update")->with("employee", $employee);
        }catch (\Exception $exception){
            return $exception;
            toast('Failed to update,contact system administrator', 'error');
            return redirect()->route('employees.index');
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

        $request->validate([
            "name" => "required",
            "email" => "required|email|",
            "phone" => "required",
            "designation" => "required",
        ]);
        try {
            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->designation = $request->designation;
            $employee->save();
            toast('Successfully updated Employee ', 'success');
            return redirect()->route('employees.index');

        }catch (\Exception $exception){
            return $exception;
            return redirect()->route('employees.index');
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
            $employee = Employee::find($id);
            $employee->delete();
            toast('Successfully deleted employee', 'success');
            return redirect()->route('employees.index');

        }catch (\Exception $exception){
            return $exception;
            toast('Failed to delete,contact system administrator', 'error');
            return redirect()->route('employees.index');
        }
    }

    public function downloadPDF(Request $request){
        /*// retreive all records from db
        $data = Employee::all();
        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');*/

        $employees = Employee::all();
        view()->share('employees',$employees);


        if($request->has('download')){
            $pdf = PDF::loadView('employees.pdfview');
            return $pdf->download('employees.pdfview.pdf');
        }

        return redirect()->route('employees.index');
    }
}
