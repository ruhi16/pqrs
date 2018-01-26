@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>School Information...</h1>

{!! Form::open(['url'=>'/school-submit','method'=>'post', 'class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label class="control-label col-sm-2" for="schname">School Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="schname" name="schname" value="{{$sch->name or ''}}" placeholder="Enter Name of the Institution">
        </div>					
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="vill">Village:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="vill" name="vill" placeholder="Enter Name of the Institution">
        </div>	

        <label class="control-label col-sm-2" for="poff">Post Office:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="poff" name="poff" placeholder="Enter Name of the Institution">
        </div>	
        
        <label class="control-label col-sm-2" for="pstn">Police Station:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="pstn" name="pstn" placeholder="Enter Name of the Institution">
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="dist">District:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dist" name="dist" placeholder="Enter Name of the Institution">
        </div>
        <label class="control-label col-sm-2" for="pcode">Pin Code:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="pcode" name="pcode" placeholder="Enter Name of the Institution">
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
