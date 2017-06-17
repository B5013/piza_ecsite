@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 70px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="margin-top: 50px;"> ログイン</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

                    
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary" style="padding: 5px 40px;">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                            <div>
                                <a href="/user/register" class="btn btn-primary">
                                        新規登録はこちら
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
