@extends('layouts.dashboard')

@section('content')



    <form method="post" class="form-horizontal" enctype='multipart/form-data' action="/profile">
    @csrf
    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">First name</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"> 
            @if ($errors->has('first_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('first_name')}}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Last name</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="last_name" value="{{old('last_name')}}"> 
            @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('last_name')}}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10"><input type="email" class="form-control" name="email" value="{{old('email')}}"> 
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('email')}}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Phone number</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="phone" value="{{old('phone')}}"> 
            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('phone')}}</strong>
            </span>
            @endif   
        </div>
    </div>


    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">   <select name="country" id="country">
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



    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">City</label>
        <div class="col-sm-10">   <select name="city" id="city"></select>
            @if ($errors->has('city'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('city')}}</strong>
            </span>
            @endif
        </div>
    </div>
    
      <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Gender</label>
          <div class="col-sm-10">   <select name="gender" id="gender">
                  <option value='male'  selected>Male</option>
                   <option value='female'>Female</option>
              </select>
            @if ($errors->has('gender'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gender')}}</strong>
            </span>
            @endif
        </div>
    </div>
    
    
<div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Profile image</label>
        <div class="col-sm-10"><input type="file" class="form-control" name="profile_image" value="{{old('profile_image')}}"> 
            @if($errors->has('profile_image'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('profile_image')}}</strong>
            </span>
            @endif   
        </div>
    </div>






    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10"><input type="password" class="form-control" name="password" value="{{old('password')}}"> 
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif   
        </div>
    </div>


    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Confirm password</label>
        <div class="col-sm-10"><input type="password" class="form-control" name="password_confirmation"> 
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

<!-- Page-Level Scripts -->
@section('scripts')
<script>

    $('#country').change(function () {
        var country = $(this).val();
        if (country) {
            $.ajax({
                type: "GET",
                url: "{{route('ajax.countries.index')}}?country=" + country,
                success: function (res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option>Select</option>');
                        $.each(res, function (key, cityObj) {
                            console.log(cityObj.name);
                            $("#city").append('<option value="' + cityObj.name + '">' + cityObj.name + '</option>');
                        });
                    } else {
                        $("#city").empty();
                        $("#city").empty();

                    }
                }})

        }
    })
            ;


</script>
@endsection









