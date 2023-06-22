<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('company_id',Auth::user()->company_id)->get();

        return view('company.organization.account', compact('accounts'));
    }

    public function create()
    {
        return view('company.organization.account_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Account::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $account = Account::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => Auth::user()->company_id,
        ]);
        event(new Registered($account));

        return redirect()->route('company.account')
            ->with('success', 'アカウントを作成しました。');
    }
}
