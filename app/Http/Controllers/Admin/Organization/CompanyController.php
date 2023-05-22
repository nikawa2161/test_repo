<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::All();

        return view('admin.organization.company', ["companies" => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.organization.company_show', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.company')
        ->with('success','アイテムが削除されました');
    }
}
