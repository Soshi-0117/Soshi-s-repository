<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\CurrentPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * ユーザー編集画面
     */
    public function edit(string $id)
    {
        if (Auth::id() == $id) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        } else {
            abort(404, 'Unauthorized');
        }
    }

    /**
     * ユーザー編集内容を保存
     */
    public function update(Request $request)
    {   
        $inputs = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        
        $user = Auth::user();

        $user->update([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
        ]);

        return redirect()->route('users.index')->with('message', 'ユーザー情報を変更しました');
    }

    /**
     * ユーザー情報を削除
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message', 'ユーザーを削除しました');
    }

    /**
     * パスワード変更画面
     */
    public function showPasswordChangeForm(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.passwords.change', compact('user'));
    }

    /**
     * パスワードを変更する
     */
    public function changePassword(Request $request, User $user)
    {
        $inputs = $request->validate([
            'current-password' => ['required', 'string', new CurrentPasswordRule],
            'password' => 'required|string|confirmed|different:current-password',
        ]);

        $userId = request()->route('id');
        $user = User::findOrFail($userId);

        $user->update([
            'password' => $inputs['password'],
        ]);

        return redirect()->route('users.index')->with('message', 'パスワードを変更しました');
    }

    /**
     * ユーザー検索
     */
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $query = User::query();

        if (!empty($keyword)) {
            $query->where('id', '=', $keyword)
            ->orWhere('name', 'like', '%' . $keyword . '%');
        }

        $users = $query->paginate(10);
        return view('users.index', compact('users'));
    }
}