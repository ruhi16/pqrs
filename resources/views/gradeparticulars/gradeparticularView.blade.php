@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>School Information View...</h1>



<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">School Details</h3>
      
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>#</th>          
          <th class="text-center">School Name</th>   
          <th>Subject Code</th>   
          <th>Subject Type</th>
          <th>Session</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
            @foreach($schools as $school)
                <tr id="tr{{$school->id}}">
                <th id="id">{{$school->id}}</th>
                <th id="name">{{ $school->name }}</th>
                <th id="code">{{ $school->vill }}</th>
                <td id="type">{{ $school->post }}</td>
                <td>{{ $school->session_id }}</td>
                <td>
                    {{--  <button class="btn btn-success btn-sm btnEdit" data-id="{{$subject->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
                    <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$subject->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>  --}}
                    {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
                </td>
                </tr>
            @endforeach
			</tbody>
		</table>
  </div><!--/panel starting div -->
</div><!--/1st row within 2nd column -->








{{--  <div class="form-group">
    <label class="control-label col-sm-2" for="schname">School Name:</label>
    <div class="col-sm-10">
        <label class="control-label col-sm-10" for="schname">{{$sch->name}}</label>
    </div>					
</div>
<div class="form-group">
    <button class="btn btn-primary" onclick="location.href='{{route('finalizeSchool')}}'">Finalize</button>
</div>  --}}


<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
