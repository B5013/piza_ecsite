@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 70px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="margin-top: 50px;">新規登録</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/utuika') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">お名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('kana') ? ' has-error' : '' }}">
                            <label for="kana" class="col-md-4 control-label">フリガナ</label>

                            <div class="col-md-6">
                                <input id="kana" type="text" class="form-control" name="kana" value="{{ old('kana') }}" required autofocus>

                                @if ($errors->has('kana'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">電話番号</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required autofocus>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">パスワード　再入力</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('addn') ? ' has-error' : '' }}">
                            <label for="addn" class="col-md-4 control-label">郵便番号</label>

                            <div class="col-md-6">
                                <input id="addn" type="text" class="form-control" name="addn" value="{{ old('addn') }}" required autofocus>

                                @if ($errors->has('addn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('addn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('add') ? ' has-error' : '' }}">
                            <label for="add" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="add" type="text" class="form-control" name="add" value="{{ old('add') }}" required autofocus>

                                @if ($errors->has('add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    新規登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
