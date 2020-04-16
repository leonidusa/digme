<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyUpdate;
use App\Http\Requests\CompanyStore;
use Storage;
use App\Company;

class CompanyController extends Controller
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
        $companies = Company::paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStore $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        if ($request->hasFile('logo')) {
            $filename ='companies/'.$company->id.'.'.$request->logo->getClientOriginalExtension();
            $saved = Storage::disk('public')->put(
                $filename,
                file_get_contents($request->file('logo')->getRealPath())
            );
            if ($saved) {
                $company->logo = $filename;
            }
            $company->save();
        }
        return redirect()->route('company.show', $company->id)->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdate $request, Company $company)
    {
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        
        if ($request->hasFile('logo')) {
            $old = $company->logo;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $filename ='companies/'.$company->id.'.'.$request->logo->getClientOriginalExtension();
            $saved = Storage::disk('public')->put(
                $filename,
                file_get_contents($request->file('logo')->getRealPath())
            );
            if ($saved) {
                $company->logo = $filename;
            }
        }
        $company->save();
        return redirect()->route('company.show', $company->id)->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();
        return back()->with('success', 'Company deleted');
    }
}
