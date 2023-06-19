<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    // 応募送信
    public function store(Request $request)
    {
        $params = $request->only(['offer_id']);
        $request->validate([
            'offer_id' => 'required',
        ]);

        Application::create([
            'user_id' => auth()->user()->id,
            'offer_id' => $params['offer_id'],
        ]);

        return redirect()->route('offer.show', ['id' => $params['offer_id']])
            ->with('success', '応募が完了しました。');
    }
}
