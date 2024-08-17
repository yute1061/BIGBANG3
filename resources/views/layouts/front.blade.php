<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- レスポンシブデザイン（スマホ等の画面サイズに合わせられる）にする -->
        <meta charset="uth-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
            
        <title>@yield('title')</title>
            
        <!-- Scripts -->
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
                    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <!-- <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> -->
        {{-- 固有のCSSを読み込みます --}}
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front_width_max480.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/toppage.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/toppage_width_max480.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/page.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/page_width_max480.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="area">
            <header class="header">
                <a href="{{ route('toppage') }}" style="font-weight: bold;">                     
                    <div>
                        <div{{--style="float: left;"--}} {{--text-align: center;--}}>
                            <img class="team_name" src="{{ secure_asset('images/team_name.jpg/') }}">
                            <img class="syarin1" src="{{ secure_asset('images/935503.jpeg/') }}">
                            <img class="syarin2" src="{{ secure_asset('images/935503.jpeg/') }}">
                            <img class="syarin3" src="{{ secure_asset('images/935503.jpeg/') }}">
                        </div>
                    </div>
                </a>
                <nav class="h-nav">
                    <ul class="b">
                        <li><a href="{{ route('toppage') }}">HOME</a></li>
                        <li><a href="{{ route('about') }}">BIGBANGについて</a></li>
                        <li><a href="{{ route('toppage', ['tag' => "レースレポ", 'mode' => 2]) }}">レースレポ</a></li>
                        <li><a href="{{ route('schedule') }}">レース日程</a></li>
                    </ul>
                </nav>
                <nav class="h-nav_width_max480">
                    <ul class="b">
                        <li><a href="{{ route('toppage') }}">HOME</a></li>
                        <li><a href="{{ route('about') }}">BIGBANGについて</a></li>
                    </ul>
                </nav>
                <nav class="h-nav_width_max480">
                    <ul class="b">
                        <li><a href="{{ route('toppage', ['tag' => "レースレポ", 'mode' => 2]) }}">レースレポ</a></li>
                        <li><a href="{{ route('schedule') }}">レース日程</a></li>
                    </ul>
                </nav>  
            </header>
            <div class="c">
                @yield('main')
                <aside class="side">
                    <div class="side_team_logo">
                        <img width="100%" src="{{ secure_asset('images/Screen_BIGBANG_karui.jpg/') }}">
                    </div>
                    <div class="widgettitle">記事検索</div>
                    <form action="{{ route('toppage') }}" method="get" class="searchform" role="search">
                      	<input type="text" size="25" placeholder="タイトルor本文から検索" name="search" value="{{ old('search') }}">
                      	<input type="hidden" name="mode" value=1><!--検索したときはtoppage表示のモードを変える-->
                      	<button type="submit">
                            {{ __('検索') }}
                        </button>
                    </form>
                    
                    <div class="widgettitle">チームSNS</div>
                    <div class="meta">
                        <ul class="team_sns">
                            <li style="float: left; margin-left: 20px;">
                                <a href="https://www.facebook.com/teambigbangkumamoto/?locale=ja_JP" target="_blank">
                                    <img src="{{ secure_asset('images/facebook-logo_49354.png/') }}">
                                </a>
                            </li>                             
                            <li>
                                <a href="https://www.instagram.com/team_bigbang_imp/" target="_blank">
                                    <img src="{{ secure_asset('images/instagram_1384015.png/') }}">
                                </a>
                            </li>                                                                
                        </ul> 
                        <p style="text-align: left; margin-top: 20px;">チーム・練習会への参加申し込みはSNSのDMからお願いいたします！</p>
                        <p style="text-align: left;">定期練習会：毎週金曜日早朝</p>
                    </div>
                   
                    <div class="widgettitle">サイト管理者</div>
                    <div class="profile">
                        <div class="img_profile">
                            <img src="{{ secure_asset('images/S__70172675.jpg/') }}">
                        </div>
                        <div>
                            <div class="name">テズカ</div>
                            <div class="profile_sns">
                                <a class="X_button" href="https://twitter.com/silencetezuka?ref_src=twsrc%5Etfw" target="_blank">
                                    <img src="{{ secure_asset('images/twitter_x_new_logo_x_rounded_icon_256078.png') }}">
                                </a>                                                                                    
                            </div> 
                        </div>
                        <div class="meta">
                            <p style="text-align: left;">2019年よりTEAM BIGBANGに所属<br>一応ロードバイク歴10年。最近はレースよりブルベに夢中...ヒルクライムとエンデューロには出ます。目下の目標はSR取得で、2027年のPBP出場を目指してます。</p>
                            <p style="text-align: left;">愛車はチームメイトに塗装してもらったSTORCK Fascenario.3 comp<br>マイナーなブランドやアイテムを使いたがる癖あり</p>
                        </div>
                    </div>
                    
        		    <div class="widgettitle">最新記事</div>
        		    <div>
  				        <?php $count_side=0; ?>
  			            @foreach ($all as $post)
      			            <?php $count_side++; ?>
            				<a href="{{ route('article.page', ['id' => $post->id]) }}">
  							    <div class="new_article_side">
        						    <div class="new_article_thumbnail-side">
                						@if ($post->thumbnail_path != null)
                							<img width="100%" height="100%" src="{{ secure_asset('storage/image/' . $post->thumbnail_path) }}" class="img_new_article">
                						@else
                						    <img width="100%" height="100%" src="{{ secure_asset('images/no_image.png/') }}" class="img_new_article">
                						@endif
                					</div>
                					<div class="entry-card-content-side">
                    					<span class="entry-card-title-side">{{ $post->title }}</span>
                    				</div>
                					<div class="entry-card-meta-side">
                		        		<div class="entry-card-info-side">
                		        		    <span class="post-date-side">
                		                	    <span class="entry-date-side">{{ $post->created_at }}</span>
                		                	</span>
                	                    </div>
                	                    <!-- <div class="entry-card-categorys e-card-categorys"> -->
                		        		<div class="entry-card-categorys-side">
                	        				<span class="entry-category-side">{{ $post->tag }}</span>
                	        			</div>
                		    		</div>
            					</div>
                			</a>
  							@if ($count_side == 5)
  		                        @break
  		                    @endif
                        @endforeach
                    </div>
        		    
                    <div class="widgettitle">カテゴリー</div>
                    <ul style="margin-left: 15px;">
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "レースレポ", 'mode' => 2]) }}">
                                <span class="category_name">レースレポ</span>
                                <?php $category_count_side_1=0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "レースレポ")
                                        <?php $category_count_side_1++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_1 }}</span>
                            </a>
                        </li>
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "練習会", 'mode' => 2]) }}">
                                <span class="category">練習会</span>
                                <?php $category_count_side_2 = 0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "練習会")
                                        <?php $category_count_side_2++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_2 }}</span>
                            </a>
                        </li>
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "機材レビュー", 'mode' => 2]) }}">
                                <span class="category">機材レビュー</span>
                                <?php $category_count_side_3 = 0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "機材レビュー")
                                        <?php $category_count_side_3++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_3 }}</span>
                            </a>
                        </li>
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "用品レビュー", 'mode' => 2]) }}">
                                <span class="category">用品レビュー</span>
                                <?php $category_count_side_4 = 0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "用品レビュー")
                                        <?php $category_count_side_4++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_4 }}</span>
                            </a>
                        </li>
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "ブルベ", 'mode' => 2]) }}">
                                <span class="category">ブルベ</span>
                                <?php $category_count_side_5 = 0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "ブルベ")
                                        <?php $category_count_side_5++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_5 }}</span>
                            </a>
                        </li>
                        <li class="category">
                            <a href="{{ route('toppage', ['tag' => "その他", 'mode' => 2]) }}">
                                <span class="category">その他</span>
                                <?php $category_count_side_etc = 0; ?>
                                @foreach ($all as $post)
                                    @if ($post->tag == "その他")
                                        <?php $category_count_side_etc++; ?>
                                    @endif
                                @endforeach
                                <span class="category_count">{{ $category_count_side_etc }}</span>
                            </a>
                        </li>
                    </ul>
                    {{--
                    <div>
                        <div class="widgettitle">X（エックス）</div>
                            <a class="twitter-timeline" data-height="600" href="https://twitter.com/silencetezuka?ref_src=twsrc%5Etfw">Tweets by silencetezuka</a> 
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div> 
                    </div>
                    --}}
                </aside>
            </div>
            <footer class="footer">
      			<div class="footer_content clearfix">
      			    {{--
      				<nav class="footer_navi" role="navigation">
      					<ul id="menu-%e3%83%95%e3%83%83%e3%82%bf%e3%83%bc%e3%83%a1%e3%83%8b%e3%83%a5%e3%83%bc" class="menu">
  				          　<li id="menu-item-4748" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4748">
  				                <a href="https://www.longride.org/webinfo/">当サイトについて</a>
  				          　</li>
                            <li id="menu-item-4749" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-4749">
                                <a href="https://www.longride.org/webprofile/" aria-current="page">管理者について</a>
                            </li>
                            <li id="menu-item-4747" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4747">
                                <a href="https://www.longride.org/contactus/">お問い合わせ</a>
                            </li>
                        </ul>
                    </nav>
                    --}}
      			    <div id="copyright">©2014-2024 TEAM BIGBANG</div>
      			</div>
      		</footer>
        </div>
    </body>
</html>