@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change password</div>

                <div class="card-body">
                    <form  class="form-horizontal" method="POST" action="{{ route('user_changepassword',$user->id) }}">
                        @csrf
                       @method('PUT')

                     

                        <div class="form-group row">
               
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="col-sm-10 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-2 control-label">Confirm password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="col-sm-10" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
