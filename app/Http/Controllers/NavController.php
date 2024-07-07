<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Article;

use Carbon\Carbon;

class NavController extends Controller
{
    //
    public function toppage(Request $request)
    {   
        $mode = $request->mode;
        
        // modeがnullなら普通にトップページ表示
        if ($mode == null) { 
            $keyword = null;
            $posts = Article::all()->sortByDesc('id');
            
        //----ページング処理----
            //件数を取得する。
            $article_total = Article::count();
            // ページ数を取得する。GETでページが渡ってこなかった時(最初のページ)のときは$pageに１を格納する。
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            // 最大ページ数を取得する。10件ずつ表示させているので、$article_totalに入っている件数を10で割って小数点は切りあげると最大ページ数になる。
            $max_page = ceil($article_total / 10);
            
            if ($page == 1 || $page == $max_page) {
                $range = 4;
            } elseif ($page == 2 || $page == $max_page - 1) {
                $range = 3;
            } else {
                $range = 2;
            }
            
            $from_record = ($page - 1) * 10 + 1;
            if ($page == $max_page && $article_total % 10 !== 0) {
                $to_record = ($page - 1) * 10 + $article_total % 10;
            } else {
                $to_record = $page * 10;
            }
        //----ページングここまで----
        
        // modeが1なら検索でトップページ表示
        } elseif ($mode == 1) { 
            // キーワード取得
            if (isset($_GET['keyword'])) { // keywordがnullじゃない...一度検索した状態でのページングなのでkeywordをそのまま使い回す
                $keyword = $_GET['keyword'];
            } else {
                $keyword = $request->input('search', ''); // keywordがnull...初検索なのでsearchで渡ってきた文字をkeywordにする。デフォルトは空文字
            }
            // キーワード検索
            $article = Article::where('title', 'LIKE' , "%$keyword%")
                                ->orWhere('body1', 'LIKE', "%$keyword%")
                                ->orWhere('body2', 'LIKE', "%$keyword%")
                                ->orWhere('body3', 'LIKE', "%$keyword%")
                                ->orWhere('body4', 'LIKE', "%$keyword%")
                                ->orWhere('body5', 'LIKE', "%$keyword%")
                                ->orWhere('body6', 'LIKE', "%$keyword%")
                                ->orWhere('body7', 'LIKE', "%$keyword%")
                                ->orWhere('body8', 'LIKE', "%$keyword%")
                                ->orWhere('body9', 'LIKE', "%$keyword%")
                                ->orWhere('body10', 'LIKE', "%$keyword%")
                                ->get()->all();
            // get()で取得した配列は何故かsortできないのでcollect()を使用する
            $posts = collect($article)->sortByDesc('id')->all();
            // ページ更新時にクエリパラメータが消えないようにkeywordも渡す
            $params = array('posts' => $posts, 'keyword' => $keyword);
            
        //----ページング処理----
            // 件数を取得する。
            $article_total = Article::where('title', 'LIKE' , "%$keyword%")
                                    ->orWhere('body1', 'LIKE', "%$keyword%")
                                    ->orWhere('body2', 'LIKE', "%$keyword%")
                                    ->orWhere('body3', 'LIKE', "%$keyword%")
                                    ->orWhere('body4', 'LIKE', "%$keyword%")
                                    ->orWhere('body5', 'LIKE', "%$keyword%")
                                    ->orWhere('body6', 'LIKE', "%$keyword%")
                                    ->orWhere('body7', 'LIKE', "%$keyword%")
                                    ->orWhere('body8', 'LIKE', "%$keyword%")
                                    ->orWhere('body9', 'LIKE', "%$keyword%")
                                    ->orWhere('body10', 'LIKE', "%$keyword%")
                                    ->count();
            // ページ数を取得する。GETでページが渡ってこなかった時(最初のページ)のときは$pageに１を格納する。
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            // 最大ページ数を取得する。10件ずつ表示させているので、$article_totalに入っている件数を10で割って小数点は切りあげると最大ページ数になる。
            $max_page = ceil($article_total / 10);
            
            if ($page == 1 || $page == $max_page) {
                $range = 4;
            } elseif ($page == 2 || $page == $max_page - 1) {
                $range = 3;
            } else {
                $range = 2;
            }
            
            $from_record = ($page - 1) * 10 + 1;
            if ($page == $max_page && $article_total % 10 !== 0) {
                $to_record = ($page - 1) * 10 + $article_total % 10;
            } else {
                $to_record = $page * 10;
            }
        //----ページングここまで----

        // modeが2ならカテゴリー選択でトップページ表示
        } elseif ($mode == 2) {
            // キーワード取得
            if (isset($_GET['keyword'])) { // keywordがnullじゃない...一度カテゴリー選択した状態でのページングなのでkeywordをそのまま使い回す
                $keyword = $_GET['keyword'];
            } else {
                $keyword = $request->input('tag', ''); // keywordがnull...初カテゴリー選択なのでtagで渡ってきた文字をkeywordにする。デフォルトは空文字
            }
            // キーワード検索
            $article = Article::where('tag', 'LIKE' , "$keyword")->get()->all();
            // get()で取得した配列は何故かsortできないのでcollect()を使用する
            $posts = collect($article)->sortByDesc('id')->all();
            
        //----ページング処理----
            // 件数を取得する。
            $article_total = Article::where('tag', 'LIKE' , "$keyword")
                                    ->count();
            // ページ数を取得する。GETでページが渡ってこなかった時(最初のページ)のときは$pageに１を格納する。
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            // 最大ページ数を取得する。10件ずつ表示させているので、$article_totalに入っている件数を10で割って小数点は切りあげると最大ページ数になる。
            $max_page = ceil($article_total / 10);
            
            if ($page == 1 || $page == $max_page) {
                $range = 4;
            } elseif ($page == 2 || $page == $max_page - 1) {
                $range = 3;
            } else {
                $range = 2;
            }
            
            $from_record = ($page - 1) * 10 + 1;
            if ($page == $max_page && $article_total % 10 !== 0) {
                $to_record = ($page - 1) * 10 + $article_total % 10;
            } else {
                $to_record = $page * 10;
            }
        //----ページングここまで----
        }
        
        // トップページを開くたびにstatusが1じゃない＝DBに保存だけされて表示されていないデータを削除する
        $delete = Article::all()->sortBy('status')->first();
        if (!empty($delete)) {
            if ($delete->status != 1) {
                $delete->delete();
            }
        }
        
        // 共通サイドの最新記事とカテゴリーの数は常に全記事数からとりたいので別変数を用意
        $all = Article::all()->sortByDesc('id');

        return view('toppage.toppage', ['mode' => $mode,
                                        'posts' => $posts, 
                                        'keyword' => $keyword,
                                        'article_total' => $article_total, 
                                        'page' => $page, 
                                        'max_page' => $max_page, 
                                        'range' => $range, 
                                        'from_record' => $from_record, 
                                        'to_record' => $to_record,
                                        'all' => $all,
                                       ]);
    }
    
    public function article_page(Request $request)
    {         
        $user_id = Auth::id();
        if (empty($user_id)) {
            $user = null; //ログアウト時はnullを渡す
        } else {
            $user = User::find($user_id);
        }
        $id = $request->id;
        $article = Article::find($id);
        $all = Article::all()->sortByDesc('id');

        return view('article.page', ['article' => $article, 'user' => $user, 'all' => $all]);
    }
    
    public function about(Request $request)
    {   
        $all = Article::all()->sortByDesc('id');
        return view('about.about', ['all' => $all]);
    }
    
    public function schedule(Request $request)
    {
        $all = Article::all()->sortByDesc('id');
        return view('schedule.schedule', ['all' => $all]);     
    }
    
    public function contact()
    {   
        return view('contact.index');
    }
}
