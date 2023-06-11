<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();

        return view('user.offer', compact('offers'));
    }

    public function show(string $id)
    {
        $offer = Offer::findOrFail($id);

        $isEntry = Application::where('user_id', Auth::id())->where('offer_id', $id)->exists();
        $company = Company::where('id', $offer->company_id)->first();

        return view('user.offer_show', ['offer' => $offer, 'company' => $company, 'isEntry' => $isEntry]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.offer_create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $params = $request->only(['title', "content"]); // 値を限定する
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     Offer::create([
    //         'title' => $params['title'],
    //         'content' => $params['content'],
    //         'id' => auth()->user()->id, // 外部キー
    //     ]);

    //     return redirect()->route('offer.show', ['id' => $params])
    //         ->with('success', '求人を作成しました。');
    // }
}
