<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    // 求人一覧
    public function index()
    {
        $offers = Offer::all();
        $entryStatus = Application::where('user_id', Auth::id());

        return view('user.offer', compact('offers', 'entryStatus'));
    }

    // 求人詳細
    public function show(string $id)
    {
        $offer = Offer::findOrFail($id);

        $isEntry = Application::where('user_id', Auth::id())->where('offer_id', $id)->exists();
        $company = Company::where('id', $offer->company_id)->first();

        return view('user.offer_show', ['offer' => $offer, 'company' => $company, 'isEntry' => $isEntry]);
    }
}
