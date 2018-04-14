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
          <th>SL</th>
          <th>Exams Types</th>
          <th>Exam Mode</th>
          <th>Session</th>          
          <th>Status</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($exams as $extype)
        <tr id="tr{{$extype->id}}">
          <th id="id">  {{ $extype->id}}</th>
          <th id="name">{{ $extype->name }}</th>
          <th id="mode">{{ $extype->mode }}</th>
          <td>{{ $extype->session_id }}</td>
          <td>{{ $extype->session_id }}</td>
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
