    @extends('layouts.dashboard')


        @section('content')
                    <div class="ibox-content">

                        <div class="table-responsive">
                            
                            <form action="{{url('/roles/'.$role->id)}}" method="post">
                                @csrf
                                @method('patch')
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        
                    <thead>
                    <tr>
                        <th>Select all</th>
                        <th>Model name</th>
                            @foreach($actions as $action)
                        <th>{{$action}}</th>
                        @endforeach
                        
                    </tr>
                    </thead>
                    <tbody>
                  
        
        @foreach($names as $name)
         <tr class="gradeX">
                        <td class = "{{$name}}_all"><input type="checkbox" ></td>
                        <td>{{$name}}</td>
                        @foreach($actions as $action)
                        <td class = "{{$name}}_{{$action}}}"><input type="checkbox" name="actions[]" {{$role->permissions->contains(\App\Permission::where("name","=",$name."_".$action)->first())? "checked" : ""}} value="{{$name}}_{{$action}}" ></td>
                        @endforeach
                         
                       
                    </tr>
                    @endforeach
        
                    </tbody>
                    
                    </table>
                                
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="/home" class="btn btn-white" >Cancel</a>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                                 
                            </form>
                        </div>

                    </div>
        
        @endsection
               