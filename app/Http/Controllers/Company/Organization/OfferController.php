<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{
    /**
     * 求人一覧
     * @return View
     */
    public function index(): View
    {
        $offers = Offer::where('account_id', Auth::user()->company_id)->get();

        return view('company.organization.offer', ['offers' => $offers]);
    }

    /**
     * 求人作成画面
     * @return View
     */
    public function create(): View
    {
        return view('company.organization.offer_create');
    }

    /**
     * 求人作成処理
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $params = $request->only(['title', 'content']);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Offer::create([
            'title' => $params['title'],
            'content' => $params['content'],
            'account_id' => Auth::user()->company_id, // 外部キー
        ]);

        return redirect()->route('company.offer')
            ->with('success', '求人を作成しました。');
    }
}
