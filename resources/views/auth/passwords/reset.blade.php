@extends('layouts.app')

@section('content')

<div class="reservation-form" style="margin-top: 181px;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form id="reservation-form" method="POST" role="search" action="{{ route('password.update') }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Reset Password</h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">E-Mail Address</label>
                                <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Password</label>
                                <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Confirm Password</label>
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" class="main-button">Reset Password</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
