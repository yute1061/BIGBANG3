<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//この2行がないとDB情報とユーザー情報が使えない
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// 以下を追記することでModelが扱えるようになる
use App\Models\Article;
use App\Models\User;
use App\Models\History;
// 以下を追記することでCarcon(現在日時)が扱えるようになる
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function add()
    {
        // User Modelからログイン中のデータを取得する
        $id = Auth::id();
        $user = User::find($id);
        return view('admin.article.create', ['user' => $user]);
    }
    
    public function preview(Request $request)
    {
        $this->validate($request, Article::$rules);
        
        $article = new Article;
        $form = $request->all();
     
        // フォームから画像が送信されてきたら、保存して、$article に画像のパスを保存する
        if (isset($form['thumbnail'])) {
            $path = $request->file('thumbnail')->store('public/image');
            $article->thumbnail_path = basename($path);
        } else {
            $article->thumbnail_path = null;
        }
        
        if (isset($form['image1'])) {
            $path = $request->file('image1')->store('public/image');
            $article->image_path1 = basename($path);
        } else {
            $article->image_path1 = null;
        }
        
        if (isset($form['image2'])) {
            $path = $request->file('image2')->store('public/image');
            $article->image_path2 = basename($path);
        } else {
            $article->image_path2 = null;
        }
        
        if (isset($form['image3'])) {
            $path = $request->file('image3')->store('public/image');
            $article->image_path3 = basename($path);
        } else {
            $article->image_path3 = null;
        }
        
        if (isset($form['image4'])) {
            $path = $request->file('image4')->store('public/image');
            $article->image_path4 = basename($path);
        } else {
            $article->image_path4 = null;
        }
        
        if (isset($form['image5'])) {
            $path = $request->file('image5')->store('public/image');
            $article->image_path5 = basename($path);
        } else {
            $article->image_path5 = null;
        }
        
        if (isset($form['image6'])) {
            $path = $request->file('image6')->store('public/image');
            $article->image_path6 = basename($path);
        } else {
            $article->image_path6 = null;
        }
        if (isset($form['image7'])) {
            $path = $request->file('image7')->store('public/image');
            $article->image_path7 = basename($path);
        } else {
            $article->image_path7 = null;
        }
        
        if (isset($form['image8'])) {
            $path = $request->file('image8')->store('public/image');
            $article->image_path8 = basename($path);
        } else {
            $article->image_path8 = null;
        }
        
        if (isset($form['image9'])) {
            $path = $request->file('image9')->store('public/image');
            $article->image_path9 = basename($path);
        } else {
            $article->image_path9 = null;
        }
        
        if (isset($form['image10'])) {
            $path = $request->file('image10')->store('public/image');
            $article->image_path10 = basename($path);
        } else {
            $article->image_path10 = null;
        }
        
         // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image1']);
        unset($form['image2']);
        unset($form['image3']);
        unset($form['image4']);
        unset($form['image5']);
        unset($form['image6']);
        unset($form['image7']);
        unset($form['image8']);
        unset($form['image9']);
        unset($form['image10']);
        
        // データベースに保存する    
        $article->fill($form);
        $article->save();
        
        return view('admin.article.preview', ['article' => $article]);
    }
    
    public function create(Request $request)
    {
        $user = Auth::user();
        $article = Article::find($request->id);
        $article->status = 1;
        
        $article->user_id = $user->id;
        $article->user_name = $user->name;
        
        $article->save();
        
        // admin/article にリダイレクトする
        return redirect('admin/article');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Article::where('title', $cond_title)->get();
        } else {
            // それ以外はすべての記事を取得する
            $posts = Article::all();
        }
        return view('admin.article.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // Article Modelからデータを取得する
        $article = Article::find($request->id);
        if (empty($article)) {
            abort(404);
        }
        return view('admin.article.edit', ['article_form' => $article]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Article::$rules);
        
        // Article Modelから編集前のデータを取得する
        $article = Article::find($request->id);
        // 送信されてきたフォームデータを格納する
        $article_form = $request->all();

        if ($request->remove_thumbnail == 'true') {
            $article_form['thumbnail_path'] = null;
        } elseif ($request->file('thumbnail')) {
            $path = $request->file('thumbnail')->store('public/image');
            $article_form['thumbnail_path'] = basename($path);
        } else {
            $article_form['thumbnail_path'] = $article->thumbnail_path;
        } 
        
        if ($request->remove1 == 'true') {
            $article_form['image_path1'] = null;
        } elseif ($request->file('image1')) {
            $path = $request->file('image1')->store('public/image');
            $article_form['image_path1'] = basename($path);
        } else {
            $article_form['image_path1'] = $article->image_path1;
        } 
        
        if ($request->remove2 == 'true') {
            $article_form['image_path2'] = null;
        } elseif ($request->file('image2')) {
            $path = $request->file('image2')->store('public/image');
            $article_form['image_path2'] = basename($path);
        } else {
            $article_form['image_path2'] = $article->image_path2;
        } 
        
        if ($request->remove3 == 'true') {
            $article_form['image_path3'] = null;
        } elseif ($request->file('image3')) {
            $path = $request->file('image3')->store('public/image');
            $article_form['image_path3'] = basename($path);
        } else {
            $article_form['image_path3'] = $article->image_path3;
        } 
        
        if ($request->remove4 == 'true') {
            $article_form['image_path4'] = null;
        } elseif ($request->file('image4')) {
            $path = $request->file('image4')->store('public/image');
            $article_form['image_path4'] = basename($path);
        } else {
            $article_form['image_path4'] = $article->image_path4;
        } 

        if ($request->remove5 == 'true') {
            $article_form['image_path5'] = null;
        } elseif ($request->file('image5')) {
            $path = $request->file('image5')->store('public/image');
            $article_form['image_path5'] = basename($path);
        } else {
            $article_form['image_path5'] = $article->image_path5;
        } 
        
        if ($request->remove6 == 'true') {
            $article_form['image_path6'] = null;
        } elseif ($request->file('image6')) {
            $path = $request->file('image6')->store('public/image');
            $article_form['image_path6'] = basename($path);
        } else {
            $article_form['image_path6'] = $article->image_path6;
        } 
        
        if ($request->remove7 == 'true') {
            $article_form['image_path7'] = null;
        } elseif ($request->file('image7')) {
            $path = $request->file('image7')->store('public/image');
            $article_form['image_path7'] = basename($path);
        } else {
            $article_form['image_path7'] = $article->image_path7;
        } 
        
        if ($request->remove8 == 'true') {
            $article_form['image_path8'] = null;
        } elseif ($request->file('image8')) {
            $path = $request->file('image8')->store('public/image');
            $article_form['image_path8'] = basename($path);
        } else {
            $article_form['image_path8'] = $article->image_path8;
        } 

        if ($request->remove9 == 'true') {
            $article_form['image_path9'] = null;
        } elseif ($request->file('image9')) {
            $path = $request->file('image9')->store('public/image');
            $article_form['image_path9'] = basename($path);
        } else {
            $article_form['image_path9'] = $article->image_path9;
        } 
        
        if ($request->remove10 == 'true') {
            $article_form['image_path10'] = null;
        } elseif ($request->file('image10')) {
            $path = $request->file('image10')->store('public/image');
            $article_form['image_path10'] = basename($path);
        } else {
            $article_form['image_path10'] = $article->image_path10;
        } 

        unset($article_form['_token']);
        unset($article_form['remove_thumbnail']);
        unset($article_form['remove1']);
        unset($article_form['remove2']);
        unset($article_form['remove3']);
        unset($article_form['remove4']);
        unset($article_form['remove5']);
        unset($article_form['remove6']);
        unset($article_form['remove7']);
        unset($article_form['remove8']);
        unset($article_form['remove9']);
        unset($article_form['remove10']);
        unset($article_form['image1']);
        unset($article_form['image2']);
        unset($article_form['image3']);
        unset($article_form['image4']);
        unset($article_form['image5']);
        unset($article_form['image6']);
        unset($article_form['image7']);
        unset($article_form['image8']);
        unset($article_form['image9']);
        unset($article_form['image10']);

        // 該当するデータを上書きして保存する
        $article->fill($article_form);
        $article->save();
        
        // 編集履歴を保存
        $history = new History();
        $history->article_id = $article->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return view('admin.article.preview', ['article' => $article]);
        // return redirect('admin/article');
    }
    
    public function delete(Request $request)
    {
        // 該当するArticle Modelを取得
        $article = Article::find($request->id);

        // 削除する
        $article->delete();

        return redirect('admin/article/');
    }
}
