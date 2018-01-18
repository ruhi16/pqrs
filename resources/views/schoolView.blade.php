@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>School Information View...</h1>

<div class="form-group">
    <label class="control-label col-sm-2" for="schname">School Name:</label>
    <div class="col-sm-10">
        <label class="control-label col-sm-10" for="schname">{{$sch->name}}</label>
    </div>					
</div>
<div class="form-group">
    <button class="btn btn-primary" onclick="location.href='{{route('finalizeSchool')}}'">Finalize</button>
</div>


<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
