<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     */
    public function index()
    {
        $users = User::all();
        return view('admin.organization.user', ['users' => $users]);
    }

    /**
     * ユーザー詳細
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.organization.user_show', compact('user'));
    }

    /**
     * ユーザー削除
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')
        ->with('success','ユーザーが削除されました');
    }
}
