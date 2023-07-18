<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Feature;
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
        $offers = Offer::whereIn('account_id', Auth::user()->company->account->pluck('id'))->get();

        return view('company.organization.offer', ['offers' => $offers]);
    }

    /**
     * 求人作成画面
     * @return View
     */
    public function create(): View
    {
        $features = Feature::all();

        return view('company.organization.offer_create', compact('features'));
    }

    /**
     * 求人作成処理
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $params = $request->only(['title', 'content', 'feature_id']);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Offer::create([
            'title' => $params['title'],
            'content' => $params['content'],
            'account_id' => Auth::user()->id,
            'feature_id' => $params['feature_id'],
        ]);

        return redirect()->route('company.offer')
            ->with('success', '求人を作成しました。');
    }

    /**
     * 求人作成画面
     * @return View
     */
    public function edit(string $id): View
    {
        $offer = Offer::findOrFail($id);
        $features = Feature::all();

        return view('company.organization.offer_edit', compact('offer', 'features'));
    }

    /**
     * 求人作成処理
     * @param  Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $params = $request->only(['title', 'content', 'feature_id']);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update([
            'title' => $params['title'],
            'content' => $params['content'],
            'feature_id' => $params['feature_id'],
        ]);

        return redirect()->route('company.offer')
            ->with('success', '求人を更新しました。');
    }


    /**
     * 求人作成処理
     * @param  String $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('company.offer')
            ->with('success', '求人を削除しました。');
    }
}
