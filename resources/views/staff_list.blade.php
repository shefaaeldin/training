    @extends('layouts.dashboard')

@section('content')
    
            <div class="row wrapper border-bottom white-bg page-heading">
                 @if (session('success'))
                 <div class="alert alert-success" role="alert" style="margin-top: 20px;">
                 {{ session('success') }}
                 </div>
                @endif
                <div class="col-lg-10" style="padding: 20px;">
                    <h2 style = "display:inline;">Staff members list</h2>
                     <a href="{{ route('profile.create') }}"><button type="button" class="btn btn-primary" style = "float:right">Create a new Staff member</button></a>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Staff members</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="demo_table" style="width:100%" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>country</th>
                        <th>city</th>
                        <th>Gender</th>
                        <th>Actions</th>
                        
                    </tr>
                    </thead>
              
                    
                    </table>
                        </div>

                    </div>
 
 @endsection

    <!-- Page-Level Scripts -->
   @section('scripts')
       <script>
       
        
        $(document).ready( function () {
  $('#demo_table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": '{{route('ajax.profile.index')}}',
    "columns": [
      { "data": "user_id" },
      { "data": "name" },
      { "data": "country" },
      { "data": "city" },
      { "data": "gender" },
     { data: null,
          "orderable":      false,
          "searchable":     false,
  render: function(data){
    var edit_button = '<a href="' + data.edit_profile + '" class="btn btn-primary" profile="button" aria-pressed="true">Edit</a>';
    var delete_button = '<form style = "display:inline;" action="' + data.delete_profile + '" method="POST"><input type="hidden" name="_method" value="delete">@csrf @method('delete')<button type="submit" class="btn btn-danger">Delete</button>';
    return edit_button + delete_button;
  }
     }
    ],
    
  });
} );

    </script>
    @endsection


