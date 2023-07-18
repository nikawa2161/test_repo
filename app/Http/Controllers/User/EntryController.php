<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $subject = '応募が完了しました。';
        $name = Auth::user()->name;

        $data = [
            'subject' => $subject,
            'name' => $name,
        ];

        Mail::send('emails.entry', $data, function($message){
            $user = Auth::user();
    	    $message->to($user->email, $user->name.'様')
            ->from('kanri@example.com', '株式会社EISHIN')
    	    ->subject('応募が完了しました。');
    	});

        return redirect()->route('offer.show', ['id' => $params['offer_id']])
            ->with('success', '応募が完了しました。');
    }
}
