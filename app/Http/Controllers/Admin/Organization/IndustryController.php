<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::all();
        return view('admin.organization.industry', ['industries' => $industries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization.industry_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Industry::create($request->all());
        return redirect()->route('admin.industry')
                        ->with('success','新規作成しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industry = Industry::findOrFail($id);

        return view('admin.organization.industry_show', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $industry = Industry::findOrFail($id);

        return view('admin.organization.industry_edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industry = Industry::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
        ]);

        $industry->update($data);

        return redirect()->route('admin.industry')
                        ->with('success', 'アイテムが更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $industry = Industry::findOrFail($id);
        $industry->delete();

        return redirect()->route('admin.industry')
        ->with('success','アイテムが削除されました');
    }
}
