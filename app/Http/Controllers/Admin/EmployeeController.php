<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeUpdate;
use App\Http\Requests\EmployeeStore;
use Storage;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create', ['companies' => Company::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStore $request)
    {
        $employee = new Employee;
        $employee->company_id = $request->company_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        
        if ($request->hasFile('avatar')) {
            $filename ='employees/'.$employee->id.'.'.$request->avatar->getClientOriginalExtension();
            $saved = Storage::disk('public')->put(
                $filename,
                file_get_contents($request->file('avatar')->getRealPath())
            );
            if ($saved) {
                $employee->avatar = $filename;
            }
            $employee->save();
        }
        return redirect()->route('employee.show', $employee->id)->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdate $request, Employee $employee)
    {
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        
        if ($request->hasFile('avatar')) {
            $old = $employee->avatar;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $filename ='employees/'.$employee->id.'.'.$request->avatar->getClientOriginalExtension();
            $saved = Storage::disk('public')->put(
                $filename,
                file_get_contents($request->file('avatar')->getRealPath())
            );
            if ($saved) {
                $employee->avatar = $filename;
            }
        }
        $employee->save();
        return redirect()->route('employee.show', $employee->id)->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if (Storage::disk('public')->exists($employee->avatar)) {
            Storage::disk('public')->delete($employee->avatar);
        }
        $employee->delete();
        return back()->with('success', 'Employee deleted');
    }
}
