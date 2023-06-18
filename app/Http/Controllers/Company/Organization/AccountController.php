<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AccountController extends Controller
{
    public function index()
    {
        $hasParentId = Auth::user()->parent_id;
        if ($hasParentId !== null) {
            $adminCompany = Company::where('id', $hasParentId)->first();
            $childCompanies = Company::where('parent_id', $adminCompany->id)->get();
        } else {
            $adminCompany = Auth::user();
            $childCompanies = Company::where('parent_id', $adminCompany->id)->get();
        }

        return view('company.organization.account', ['adminCompany' => $adminCompany, 'childCompanies' => $childCompanies]);
    }

    public function create()
    {
        return view('company.organization.account_create');
    }

    public function store(Request $request)
    {
        $hasParentId = Auth::user()->parent_id;
        if ($hasParentId !== null) {
            $AdminCompany = Company::where('id', $hasParentId)->first();
        } else {
            $AdminCompany = Auth::user();
        }
        // idがnullの場合は、企業情報を作成する
        if ($AdminCompany->id === null) {
            $AdminCompany = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'tell' => $request->tell,
                'password' => Hash::make($request->password),
            ]);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Company::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tell' => 'required',
        ]);

        $user = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'tell' => $request->tell,
            'password' => Hash::make($request->password),
            'parent_id' => $AdminCompany->id,
        ]);

        event(new Registered($user));

        return redirect()->route('company.account')
            ->with('success', 'アカウントを作成しました。');
    }
}
