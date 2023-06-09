<?php

namespace App\Http\Controllers\Company\Organization;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Message;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function index()
    {
        $accountId = Auth::user()->company_id;
        $offers = Offer::where('account_id', $accountId)->get();
        $entries = Application::whereIn('offer_id', $offers->pluck('id'))->get();

        return view('company.organization.entry', ['entries' => $entries]);
    }

    public function show(string $id)
    {
        $roomInfo = Application::findOrFail($id);
        $user = $roomInfo->user;
        $offer = $roomInfo->offer;
        // メッセージの取得
        $messages = Message::where('application_id', $roomInfo->id)->get();

        return view('company.organization.entry_show', compact('roomInfo', 'user', 'offer', 'messages'));
    }

    // メッセージ送信
    public function store(Request $request)
    {
        $operatorId = '0';

        Message::create([
            'operator' => $operatorId,
            'content' => $request->content,
            'application_id' => $request->application_id,
        ]);

        return redirect()->route('company.entry.show', ['id' => $request->application_id])
            ->with('success', 'メッセージを送信しました。');
    }
}
