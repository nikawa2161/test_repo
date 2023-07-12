<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Models\Account;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Account::All();

        return view('admin.organization.company', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(string $id)
    {
        $company = Account::findOrFail($id);

        return view('admin.organization.company_show', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Account::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.company')
            ->with('success', 'アイテムが削除されました');
    }
}
