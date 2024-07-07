{{-- layouts/user.blade.phpを読み込む --}}
@extends('layouts.user')

{{-- user.blade.phpの@yield('title')を埋め込む --}}
@section('title', 'ユーザー情報編集')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー情報編集</h2>
                <form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="email" value="{{ $user_form->email }}">
                    <input type="hidden" name="password" value="{{ $user_form->password }}">
                    <input type="hidden" name="password_confirmation" value="{{ $user_form->password }}">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_form->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="profile_image_path" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール画像')}}</label>
                        <div class="col-md-6">
                            <input id="profile_image_path" type="file" class="form-control-file" name="profile_image_path">
                            <div class="form-text text-info">
                                設定中: {{ $user_form->profile_image }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove_profile_image" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mybike" class="col-md-4 col-form-label text-md-end">{{ __('愛車')}}</label>
                        <div class="col-md-6">
                            <input id="mybike" type="text" class="form-control" name="mybike" value="{{ $user_form->mybike }}">
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="mybike_image_path" class="col-md-4 col-form-label text-md-end">{{ __('愛車画像')}}</label>
                        <div class="col-md-6">
                            <input id="profile_image_path" type="file" class="form-control-file" name="mybike_image_path">
                            <div class="form-text text-info">
                                設定中: {{ $user_form->mybike_image }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove_mybike_image" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="career" class="col-md-4 col-form-label text-md-end">{{ __('自転車歴')}}</label>
                        <div class="col-md-1">
                            <input id="career" type="text" class="form-control" name="career" value="{{ $user_form->career }}">年
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="objective" class="col-md-4 col-form-label text-md-end">{{ __('現在の目標')}}</label>
                        <div class="col-md-6">
                            <input id="objective" type="text" class="form-control" name="objective" value="{{ $user_form->objective }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="introduction" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介')}}</label>
                        <div class="col-md-6">
                            <input id="introduction" type="text" class="form-control" name="introduction" value="{{ $user_form->introduction }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                 </form>
            </div>
        </div>
    </div>