@extends('layouts.dashboard')

@section('content')



<form method="post" class="form-horizontal" action="/city">
    @csrf
    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{old('name')}}"> 
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">

            <select name="country">
                @foreach($countries as $country)
                <option value='{{$country->name->common}}' {{$country->name->common == "Egypt" ? "selected" : ""}}>{{ $country->name->common }}</option>
                @endforeach
            </select>

            @if ($errors->has('country'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country')}}</strong>
            </span>
            @endif   
        </div>
    </div>


    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <a href="/home" class="btn btn-white">Cancel</a>
            <button class="btn btn-primary" type="submit">Save changes</button>
        </div>
    </div>
</form>

@endsection









