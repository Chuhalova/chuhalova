@extends('layouts.app')
@section('content')
<div id='form-cont' class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="shopper-info">
                <div class="col-sm-12">
                    @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="contact-form">
                        <h2 class="title text-center">Залогінитись</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="email">{{ __('E-Mail адреса') }}</label>
                                <input class="form-control" placeholder="E-Mail адреса" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group col-md-12">
                                <label for="password">{{ __('Пароль') }}</label>
                                <input class="form-control" placeholder="Пароль" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div style="align-content: center !important;text-align:center !important;" class="form-group col-md-12">
                                <button type="submit" class="big-btn-in-form btn btn-primary">
                                    {{ __('Залогінитись') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection