{{-- layouts/user.blade.phpを読み込む --}}
@extends('layouts.user')

{{-- user.blade.phpの@yield('title')を埋め込む --}}
@section('title', 'ユーザー情報編集')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>あなたのユーザー情報です</h2>
                <form action="{{ route('admin.user.update') }}" method="get" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>
                        <div class="col-md-6">
                            <a id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">{{ $user->name }}</a>
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
                            @if ($user->profile_image)
                	            <img src="{{ secure_asset('storage/image/' . $user->profile_image) }}">
            	            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mybike" class="col-md-4 col-form-label text-md-end">{{ __('愛車')}}</label>
                        <div class="col-md-6">
                            <a id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">{{ $user->mybike }}</a>
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="mybike_image_path" class="col-md-4 col-form-label text-md-end">{{ __('愛車画像')}}</label>
                        <div class="col-md-6">
                            @if ($user->mybike_image)
                	            <img src="{{ secure_asset('storage/image/' . $user->mybike_image) }}">
            	            @endif
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="career" class="col-md-4 col-form-label text-md-end">{{ __('自転車歴')}}</label>
                        <div class="col-md-1">
                            <a id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">{{ $user->career }}</a>年
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="objective" class="col-md-4 col-form-label text-md-end">{{ __('現在の目標')}}</label>
                        <div class="col-md-6">
                            <a id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">{{ $user->objective }}</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="introduction" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介')}}</label>
                        <div class="col-md-6">
                            <a id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">{{ $user->introduction }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="編集">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>