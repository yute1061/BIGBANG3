@extends('layouts.front')

@section('title', $article->title)

@section('main')
<main id="main" class="main" itemscope="" itemtype="https://schema.org/Blog">
    <div class="article_pankuzu">
        <a>{{ $article->tag }}</a>
        <a> > </a>
        <a>{{ $article->title }}</a>
    </div>
    <div style="margin-top: 10px;">
        <h1 class="article_title">{{ $article->title }}</h1>
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path1) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path2) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path3) }}" class="img_page">
        @endif
        <br>
        @if ($article->body4)
	        <?php
                $text4 = nl2br( $article->body4 );
                echo $text4;
            ?>
        <br>
        @endif
        @if ($article->image_path4)
	        <img src="{{ secure_asset('storage/image/' . $article->image_path4) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path5) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path6) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path7) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path8) }}" class="img_page">
        <br>
        @endif
        @if ($article->body9)
	        <?php
                $text9 = nl2br( $article->body9 );
                echo $text9;
            ?>
        @endif
        <br>
        @if ($article->image_path9)
	        <img src="{{ secure_asset('storage/image/' . $article->image_path9) }}" class="img_page">
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
	        <img src="{{ secure_asset('storage/image/' . $article->image_path10) }}" class="img_page">
        <br>
        @endif
    </div>
</main>
@endsection