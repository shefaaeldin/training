    @extends('layouts.dashboard')

@section('content')
    
            <div class="row wrapper border-bottom white-bg page-heading">
                 @if (session('success'))
                 <div class="alert alert-success" role="alert" style="margin-top: 20px;">
                 {{ session('success') }}
                 </div>
                @endif
                <div class="col-lg-10">
                    <h2>Roles list</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Roles</strong>
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
    "ajax": '{{ route('ajax.roles.index') }}',
    "columns": [
      { "data": "id" },
      { "data": "name" },   
     { data: null,
  render: function(data){
    var edit_button = '<a href="' + data.edit_role + '" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>';
    var delete_button = '<form style = "display:inline;" action="' + data.delete_role + '" method="POST"><input type="hidden" name="_method" value="delete">@csrf @method('delete')<button type="submit" class="btn btn-danger">Delete</button>';
    return edit_button + delete_button;
  }
     }
    ],
    
  });
} );

    </script>
    @endsection


