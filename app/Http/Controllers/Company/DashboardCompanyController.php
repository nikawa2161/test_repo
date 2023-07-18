<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardCompanyController extends Controller
{
    /**
     * 企業プロフィールのダッシュボード
     * @return View
     */
    public function index(): View
    {
        $company = Auth::user()->company;
        $industries = Industry::all()->except($company->industry_id);

        return view('company.dashboard',compact('company', 'industries'));
    }

    /**
     * 企業プロフィールの更新
     * @param Request $request
     * @return View
     */
    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'max:50',
            'tell' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ], [
            'tell.regex' => '電話番号の形式が不正です',
            'tell.min' => '電話番号は最低10文字です',
        ]);

        if (!$request->hasAny(['company_name', 'tell', 'industry_id'])) {
            return redirect()->route('company.dashboard')->with('error', '不正な送信のため更新に失敗しました');
        }

        $company = Auth::user()->company;
        $fieldsToUpdate = ['company_name', 'tell', 'industry_id'];
        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $company->$field = $request->$field;
            }
        }
        $company->save();


        return redirect()->route('company.dashboard')
                ->with('success', '値を変更しました');
    }
}
