@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container rounded mt-5 mb-5">
    <div class="row">

        <div class="col-md-8 offset-md-2 bg-white">
            <span class="username mt-2">{{$userData->name}}</span>
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                   
                </div>
                <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control current_password" name="password" required autocomplete="chrome-off">
                            </div>
                        </div>
                
                
                            <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control new_password" name="new-password"  autocomplete="chrome-off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control password_confirmation" name="password_confirmation" required autocomplete="chrome-off">
                            </div>
                        </div>

                <div class="mt-5 text-center"><button class="btn btn-primary password-update" type="button">Update</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
