@extends('layouts.dashboard')

@section('content')



<form method="post" action="/news" class="dropzone" id="mydropzone" enctype='multipart/form-data'>         
    <label>Username:<input type="text" name="uname"/> </label>
    <label>Password:<input type="text" name="pass"/> </label>
   
    <div id="dropzonePreview"></div>
    <input type="button" id="sbmtbtn" value="submit"/>
   
</form>

@endsection

@section('scripts')

<script src="{{asset('styles/dist/dropzone.js')}}"></script>
<script>
    Dropzone.options.mydropzone = {
    //url does not has to be written 
    //if we have wrote action in the form 
    //tag but i have mentioned here just for convenience sake 
        url: 'upload.php', 
        addRemoveLinks: true,
        autoProcessQueue: false, // this is important as you dont want form to be submitted unless you have clicked the submit button
        autoDiscover: false,
        paramName: 'pic', // this is optional Like this one will get accessed in php by writing $_FILE['pic'] // if you dont specify it then bydefault it taked 'file' as paramName eg: $_FILE['file'] 
        previewsContainer: '#dropzonePreview', // we specify on which div id we must show the files
        clickable: false, // this tells that the dropzone will not be clickable . we have to do it because v dont want the whole form to be clickable 
        accept: function(file, done) {
            console.log("uploaded");
            done();
        },
        error: function(file, msg){
            alert(msg);
        },
        init: function() {
            var myDropzone = this;
            //now we will submit the form when the button is clicked
            $("#sbmtbtn").on('click',function(e) {
               e.preventDefault();
               myDropzone.processQueue(); // this will submit your form to the specified action path
              // after this, your whole form will get submitted with all the inputs + your files and the php code will remain as usual 
        //REMEMBER you DON'T have to call ajax or anything by yourself, dropzone will take care of that
            });      
        } // init end
    };
</script>


@endsection









