<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Message;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // メッセージ一覧
    public function index()
    {
        $entryOffers = Application::where('user_id', Auth::id())->get();
        $offerId = $entryOffers->pluck('offer_id');
        // offer_idを元に、offerテーブルを取得
        $offers = Offer::whereIn('id', $offerId)->get();

        return view('user.message', compact('offers'));
    }

    // メッセージルーム
    public function room(string $id)
    {
        $offer = Offer::find($id);
        $company = $offer->company;
        $roomInfo = Application::where('user_id', Auth::id())
                          ->where('offer_id', $id)
                          ->first();
        // メッセージの取得
        $messages = Message::where('application_id', $roomInfo->id)->get();

        return view('user.message_room', compact('offer', 'company', 'messages', 'roomInfo'));
    }

    // メッセージ送信
    public function store(Request $request)
    {
        $operatorId = "user";

        Message::create([
            'operator' => $operatorId,
            'content' => $request->content,
            'application_id' => $request->application_id,
        ]);

        return redirect()->route('message.room', ['id' => $request->id])
            ->with('success', 'メッセージを送信しました。');
    }

}
