{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')を埋め込む --}}
@section('title', '記事の新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記事の新規作成</h2>
                <form action="{{ route('admin.article.preview') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">サムネ画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="thumbnail">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2">タグ</label>
                        <div class="col-md-3">
                            {{--<input type="text" class="form-control" name="tag" value="{{ old('tag') }}">--}}
                    	    <select class="form-control" name="tag">
                    	        <option value = "レースレポ">レースレポ</option>
                                <option value = "練習会">練習会</option>
                                <option value = "機材レビュー">機材レビュー</option>
                                <option value = "用品レビュー">用品レビュー</option>
                                <option value = "ブルベ">ブルベ</option>
                                <option value = "その他">その他</option>
                            </select>
                        </div>
                    </div>                   
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <a>画像からスタートしたいときは本文①には何も書かない</a>
                    <a>文章の途中に画像挟むときは続きの文章は次の枠に書く</a>
                    <div class="form-group row">
                        <label class="col-md-2">本文①</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body1" rows="10">{{ old('body1') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像①</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image1">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2">本文②</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body2" rows="10">{{ old('body2') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像②</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文③</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body3" rows="10">{{ old('body3') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像③</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文④</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body4" rows="10">{{ old('body4') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像④</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑤</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body5" rows="10">{{ old('body5') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑤</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑥</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body6" rows="10">{{ old('body6') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑥</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image6">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑦</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body7" rows="10">{{ old('body7') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑦</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image7">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑧</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body8" rows="10">{{ old('body8') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑧</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image8">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑨</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body9" rows="10">{{ old('body9') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑨</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image9">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文⑩</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body10" rows="10">{{ old('body10') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像⑩</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image10">
                        </div>
                    </div>
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="user_name" value="{{ $user->name }}">
                    <input style="margin-bottom: 10px;" type="submit" class="btn btn-primary" value="プレビュー">
                </form>
            </div>
        </div>
    </div>
@endsection