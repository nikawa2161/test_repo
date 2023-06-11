<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function index()
    {

        $hasParentId = Auth::user()->parent_id;
        if ($hasParentId !== null) {
            $offers = Offer::where('company_id', $hasParentId)->get();
        } else {
            $offers = Offer::where('company_id', Auth::user()->id)->get();
        }

        $entries = Application::whereIn('offer_id', $offers->pluck('id'))->get();

        return view('company.organization.entry', ['entries' => $entries]);
    }

    public function show(string $id)
    {
        $entryInfo = Application::findOrFail($id);
        $user = $entryInfo->user;
        $offer = $entryInfo->offer;

        return view('company.organization.entry_show', ['entryInfo' => $entryInfo, 'user' => $user, 'offer' => $offer]);
    }
}
