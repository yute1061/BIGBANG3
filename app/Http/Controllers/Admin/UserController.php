<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//この2行がないとDB情報とユーザー情報が使えない
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// 以下を追記することでVaridator1gaが扱えるようになる
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

// 以下を追記することでModelが扱えるようになる
use App\Models\User;
use App\Models\Article;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        // User Modelからログイン中のデータを取得する
        $id = Auth::id();
        $user = User::find($id);

        return view('admin.user.edit', ['user_form' => $user]);
    }

    static public function update(Request $request)
    {
        // Validationをかける
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //重複チェック（email変更のとき、登録済のアドレスだと弾くが、元々の自分のアドレスだけは通す）
            'email' => ['required', Rule::unique('users')->ignore($request->id, 'id') ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['image'],
            'mybike' => ['required', 'string'],
            'mybike_image' => ['image'],
            'career' => ['required', 'integer', 'max_digits:3'],
            'objective' => ['required', 'string'],
            'introduction' => ['required', 'string'],
        ]);
        
        // 編集前の情報を$userに格納する
        $user = User::find($request->id);
        // 送信されてきたフォームデータを格納する
        $user_form = $request->all();
        
        if ($request->remove_profile_image == 'true') {
            //削除する場合
            $user_form['profile_image'] = null;
        } elseif ($request->file('profile_image_path')) {
            //更新する場合
            $path = $request->file('profile_image_path')->store('public/image');
            $user_form['profile_image'] = basename($path);
        } else {
            //更新しない場合
            $user_form['profile_image'] = $user->profile_image;
        }
        
        if ($request->remove_mybike_image == 'true') {
            //削除する場合
            $user_form['mybike_image'] = null;
        } elseif ($request->file('mybike_image_path')) {
            //更新する場合
            $path = $request->file('mybike_image_path')->store('public/image');
            $user_form['mybike_image'] = basename($path);
        } else {
            //更新しない場合
            $user_form['mybike_image'] = $user->mybike_image;
        }
        
        unset($user_form['_token']);      
        unset($user_form['remove_profile_image']);
        unset($user_form['remove_mybike_image']);
        unset($user_form['profile_image_path']);    
        unset($user_form['mybike_image_path']);
        
        $user->fill($user_form);
        $user->save();
        
        return redirect('admin/user/mypage');
    }
    
    public function mypage(Request $request)
    {   
        $id = Auth::id();
        $user = User::find($id);
        $article = Article::all()->sortByDesc('created_at');
        
        if (empty($user)) {
            return view('auth.login');  
        } else {
            return view('admin.user.mypage', ['user' => $user, 'article' => $article]);  
        }
    }
}
