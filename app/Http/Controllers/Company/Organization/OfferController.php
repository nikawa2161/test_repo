<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasParentId = Auth::user()->parent_id;
        if($hasParentId !== null) {
            $offers = Offer::where('company_id', $hasParentId)->get();
        } else {
            $offers = Offer::where('company_id', Auth::user()->id)->get();
        }

        return view('company.organization.offer', ['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.organization.offer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->only(['title', "content"]); // 値を限定する
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Offer::create([
            'title' => $params['title'],
            'content' => $params['content'],
            'company_id' => auth()->user()->id, // 外部キー
        ]);

        return redirect()->route('company.offer')
            ->with('success', '求人を作成しました。');
    }
}
