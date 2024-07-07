{{-- layouts/user.blade.phpを読み込む --}}
@extends('layouts.user')

{{-- user.blade.phpの@yield('title')を埋め込む --}}
@section('title', 'ユーザー登録')

{{-- user.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー登録画面</h2>
                <form method="POST" action="{{ route('register') }}">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード確認') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="profile_image_path" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール画像')}}</label>
                            
                        <div class="col-md-6">
                            <input id="profile_image_path" type="file" class="form-control-file" name="profile_image_path">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mybike" class="col-md-4 col-form-label text-md-end">{{ __('愛車')}}</label>
                            
                        <div class="col-md-6">
                            <input id="mybike" type="text" class="form-control" name="mybike" value="{{ old('mybike') }}">
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="mybike_image_path" class="col-md-4 col-form-label text-md-end">{{ __('愛車画像')}}</label>
                            
                        <div class="col-md-6">
                            <input id="mybike_image_path" type="file" class="form-control-file" name="mybike_image_path">
                        </div>
                    </div>                      
                    <div class="row mb-3">
                        <label for="career" class="col-md-4 col-form-label text-md-end">{{ __('自転車歴')}}</label>
                            
                        <div class="col-md-6">
                            <input id="career" type="text" class="form-control" name="career" value="{{ old('career') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="objective" class="col-md-4 col-form-label text-md-end">{{ __('現在の目標')}}</label>
                            
                        <div class="col-md-6">
                            <input id="objective" type="text" class="form-control" name="objective" value="{{ old('objective') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="introduction" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介')}}</label>
                            
                        <div class="col-md-6">
                            <input id="introduction" type="text" class="form-control" name="introduction" value="{{ old('introduction') }}">
                        </div>
                    </div>
                        
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('登録') }}
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection