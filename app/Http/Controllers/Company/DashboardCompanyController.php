<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardCompanyController extends Controller
{
    /**
     * 求人一覧
     * @return View
     */
    public function index(): View
    {
        $company = Auth::user()->company;

        return view('company.dashboard',compact('company'));
    }
}
