@extends('layouts.admin')

@section('title', '記事の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記事編集</h2>
                <form action="{{ route('admin.article.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="image1">サムネ画像</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->thumbnail_path) }}" class="img-review">
                            <input type="file" class="form-control-file" name="thumbnail">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->thumbnail_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove_thumbnail" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タグ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tag" value="{{ $article_form->tag }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $article_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body1">本文①</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body1" rows="20">{{ $article_form->body1 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image1">画像①</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path1) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image1">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path1 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove1" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body2">本文②</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body2" rows="20">{{ $article_form->body2 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image2">画像②</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path2) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image2">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path2 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove2" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body3">本文③</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body3" rows="20">{{ $article_form->body3 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image3">画像③</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path3) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image3">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path3 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove3" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body4">本文④</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body4" rows="20">{{ $article_form->body4 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image4">画像④</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path4) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image4">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path4 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove4" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body5">本文⑤</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body5" rows="20">{{ $article_form->body5 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image5">画像⑤</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path5) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image5">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path5 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove5" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body6">本文⑥</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body6" rows="20">{{ $article_form->body6 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image6">画像⑥</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path6) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image6">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path6 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove6" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body7">本文⑦</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body7" rows="20">{{ $article_form->body7 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image7">画像⑦</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path7) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image7">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path7 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove7" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body8">本文⑧</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body8" rows="20">{{ $article_form->body8 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image8">画像⑧</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path8) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image8">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path8 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove8" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body9">本文⑨</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body9" rows="20">{{ $article_form->body9 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image9">画像⑨</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path9) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image9">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path9 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove9" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body10">本文⑩</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body10" rows="20">{{ $article_form->body10 }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image10">画像⑩</label>
                        <div class="col-md-10">
                            <img width="800" height="533" src="{{ secure_asset('storage/image/' . $article_form->image_path10) }}" class="img-review">
                            <input type="file" class="form-control-file" name="image10">
                            <div class="form-text text-info">
                                設定中: {{ $article_form->image_path10 }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove10" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $article_form->id }}">
                            <input type="hidden" name="user_id" value="{{ $article_form->user_id }}">
                            <input type="hidden" name="user_name" value="{{ $article_form->user_name }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <?php
                            $edit_number = 1;
                        ?>
                        <h3>編集履歴</h3>
                        <ul class="list-group">
                            @if ($article_form->histories != NULL)
                                @foreach ($article_form->histories as $history)
                                    <li class="list-group-item">{{ $edit_number }}回目　{{ $history->edited_at }}</li>
                                    <?php
                                        $edit_number = $edit_number + 1;
                                    ?>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection