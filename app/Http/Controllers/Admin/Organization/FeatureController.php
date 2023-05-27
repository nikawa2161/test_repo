<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Offer;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     *  特徴一覧
     */
    public function index()
    {
        $features = Feature::All();
        return view('admin.organization.feature',["features" => $features]);
    }

    public function create()
    {
        $offers = Offer::All();
        return view('admin.organization.feature_create',["offers" => $offers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'offer_id' => 'required',
        ]);

        Feature::create($request->all());

        return redirect()->route('admin.feature')
        ->with('success', '特徴を作成しました。');
    }

    public function edit(string $id)
    {
        $feature = Feature::findOrFail($id);
        $offers = Offer::All();

        return view('admin.organization.feature_edit', compact('feature', 'offers'));
    }

    public function update(Request $request, string $id)
    {
        $feature = Feature::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'offer_id' => 'required',
        ]);

        $feature->update($data);

        return redirect()->route('admin.feature')
        ->with('success', '特徴を更新しました。');
    }

    public function destroy(string $id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.feature')
        ->with('success','アイテムが削除されました');
    }
}
