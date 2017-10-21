@extends('layouts.card')

@section('header', 'Reset Password')

@section('body')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
        <p>The email may take a long time to reach you, please be patient! we don't have the fastest server in the world</p>
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </div>
    </div>
</form>
@endsection
