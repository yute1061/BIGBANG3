{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '記事のプレビュー')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記事のプレビュー</h2>
                <form method="POST" enctype="multipart/form-data" action={{ route('admin.article.create') }}>
                    @csrf
                    <div style="margin-top: 10px;" class="article_pankuzu">
                        <a>{{ $article->tag }}</a>
                        <a> > </a>
                        <a>{{ $article->title }}</a>
                    </div>
                    <div class="article_wrap">
                        <h1 class="article_title">{{ $article->title }}</h1>
                        <div class="article_thumbnail">
                            @if ($article->thumbnail_path)
                    	        <img style="margin-top: 10px;" width="800" height="533" src="{{ secure_asset('storage/image/' . $article->thumbnail_path) }}" class="img_page">
                	        @endif
                        </div>
                    </div>
                    <div class="entry-content cf" itemprop="mainEntityOfPage">
                        @if ($article->body1)
                            <?php
                                $text1 = nl2br( $article->body1 );
                                echo $text1;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path1)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path1) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body2)
                            <?php
                                $text2 = nl2br( $article->body2 );
                                echo $text2;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path2)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path2) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body3)
                	        <?php
                                $text3 = nl2br( $article->body3 );
                                echo $text3;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path3)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path3) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body4)
                	        <?php
                                $text4 = nl2br( $article->body4 );
                                echo $text4;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path4)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path4) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body5)
                	        <?php
                                $text5 = nl2br( $article->body5 );
                                echo $text5;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path5)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path5) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body6)
                	        <?php
                                $text6 = nl2br( $article->body6 );
                                echo $text6;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path6)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path6) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body7)
                            <?php
                                $text7 = nl2br( $article->body7 );
                                echo $text7;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path7)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path7) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body8)
                	        <?php
                                $text8 = nl2br( $article->body8 );
                                echo $text8;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path8)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path8) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body9)
                	        <?php
                                $text9 = nl2br( $article->body9 );
                                echo $text9;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path9)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path9) }}" class="img_page">
                        <br>
                        @endif
                        @if ($article->body10)
                            <?php
                                $text2 = nl2br( $article->body10 );
                                echo $text10;
                            ?>
                        <br>
                        @endif
                        @if ($article->image_path10)
                	        <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article->image_path10) }}" class="img_page">
                        <br>
                        @endif
                    </div>
                    <div style="margin-top: 10px;" class="register_btn">
                	    <input type="hidden" name="id" value="{{ $article->id }}">
                	    {{-- hidden...隠しファイル これを使うことでidをcreateに送れる --}}
                	    <input class="btn btn-primary" type="submit" value="投稿">
            	    </div>
                </form>
                <div style="margin: 10px 0px;" class="register_btn">
                    <input class="btn btn-primary" type="submit" onclick="history.back()" value="戻る">
            	</div>
            </div>
        </div>
    </div>
@endsection