@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exams Display Page...</h1>

<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">Exam Details</h3>
      
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>#</th>          
          <th class="text-center">Subject Name</th>   
          <th>Subject Code</th>   
          <th>Subject Type</th>
          <th>Session</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($subjects as $subject)
        <tr id="tr{{$subject->id}}">
          <th id="id">{{$subject->id}}</th>
          <th id="name">{{ $subject->name }}</th>
          <th id="code">{{ $subject->code }}</th>
          <td id="type">{{ $subject->extype->name }}</td>
          <td>{{ $subject->session_id }}</td>
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





<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
