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
          <th>Exams</th>
          <th>Session</th>          
          <th>Status</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($exams as $exam)
        <tr id="tr{{$exam->id}}">
          <th id="id">  {{ $exam->id}}</th>
          <th id="name">{{ $exam->name }}</th>
          <td>{{ $exam->session_id }}</td>
          <td>{{ $exam->session_id }}</td>
          <td>              
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
