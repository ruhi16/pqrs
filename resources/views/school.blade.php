@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>School Information...</h1>

{!! Form::open(['url'=>'/schoolInfo-submit','method'=>'post', 'class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label class="control-label col-sm-2" for="schname">School Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>					
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="schname">Village:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>	

        <label class="control-label col-sm-2" for="schname">Post Office:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>	
        
        <label class="control-label col-sm-2" for="schname">Police Station:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="schname">District:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>
        <label class="control-label col-sm-2" for="schname">Pin:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter Name of the Institution">
        </div>					
    </div>


    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>


{!! Form::close() !!}

<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
