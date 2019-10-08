@extends('layouts.dashboard')

@section('content')



                       <form method="post" class="form-horizontal" action="/users/{{$user->id}}">
                           @csrf
                           @method('PUT')
                                 <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">First name</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="first_name" value="{{old('first_name')? old('first_name') : $user->first_name}}"> 
                                         @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif   
                                    </div>
                                </div>
                           
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Last name</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="last_name" value="{{old('last_name')? old('last_name') : $user->last_name}}"> 
                                        @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name')}}</strong>
                                    </span>
                                @endif   
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="email" placeholder="placeholder" class="form-control" name = "email" value="{{old('email')? old('email') : $user->email}}">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email')}}</strong>
                                    </span>
                                @endif   
                                    </div>
                                </div>
                                
                                 <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Phone number</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="phone" value="{{old('phone')? old('phone') : $user->phone}}"> 
                                         @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif   
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Role</label>

                                    <div class="col-sm-10"><select class="form-control m-b" name="account">
                                            
                                            @foreach($roles as $role)
                                            <option>{{$role->name}}</option>
                                        @endforeach
                                    </select>

                                       
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
            
        
        




   

