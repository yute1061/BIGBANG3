@extends('layouts.front')

@section('title', $article->title)

@section('main')
<main id="main" class="main" itemscope="" itemtype="https://schema.org/Blog">
    <div class="article_pankuzu">
        <a>{{ $article->tag }}</a>
        <a> > </a>
        <a>{{ $article->title }}</a>
    </div>
    <div class="writer">
        <div>
            <span>この記事を書いた人</span>
        </div>
        <div>
            <span style="font-weight: 900; font-size: larger;">{{ $user->name }}</span>
            @if ($user->profile_image != null)
                <img class="writer_img" src="{{ secure_asset('storage/image/' . $user->profile_image) }}">
            @else
                <img class="writer_img" src="{{ secure_asset('images/no_image.png/') }}">
            @endif
        </div>
    </div>
    <div style="margin-top: 10px;">
        <h1 class="article_title">{{ $article->title }}</h1>
    </div>
    <div class="entry-content cf" itemprop="mainEntityOfPage">
        @if ($article->body1)
            <?php
                $text1 = nl2br( $article->body1 );
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text1   = preg_replace( $pattern, $replace, $text1 );
                echo $text1;
            ?>
        <br>
        @endif
	    @if ($article->image_path1)
	        <img style="margin-top: 10px;" src="{{ secure_asset('storage/image/' . $article->image_path1) }}" class="img_page">
        <br>
        @endif
        @if ($article->body2)
            <?php
                $text2 = nl2br( $article->body2 );
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text2   = preg_replace( $pattern, $replace, $text2 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text3   = preg_replace( $pattern, $replace, $text3 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text4   = preg_replace( $pattern, $replace, $text4 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text5   = preg_replace( $pattern, $replace, $text5 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text6   = preg_replace( $pattern, $replace, $text6 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text7   = preg_replace( $pattern, $replace, $text7 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text8   = preg_replace( $pattern, $replace, $text8 );
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
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text9   = preg_replace( $pattern, $replace, $text9 );
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
                $text10 = nl2br( $article->body10 );
                $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
                $replace = '<a href="$1">$1</a>';
                $text10   = preg_replace( $pattern, $replace, $text10 );
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