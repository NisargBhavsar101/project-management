<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Employee::paginate('5');

        return view('employees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
        
        return redirect()
                ->back()
                ->withSuccess('EmployeeCreatedSuccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Employee::find($id);

        return view('employees.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update =Employee::find($id);
        $update->fill($request->all())->fresh();
        $update->save();

        return redirect()
        ->back()
        ->with('Update','Employee Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return redirect()
        ->back()
        ->with('deleted','EmployeeDeletedSuccessfully');
    }
}
