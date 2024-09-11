@extends('layouts.app')

@section('content')

<div class="reservation-form">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form id="reservation-form" name="gs" method="POST" role="search" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Register</h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Name</label>
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Your Email</label>
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <label for="Name" class="form-label">Your Password</label>
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <button type="submit" class="main-button">register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
