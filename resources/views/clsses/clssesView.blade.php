@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Classes Display Page...</h1>

<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">Session Details</h3>
      
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>#</th>
          <th>Class</th>
          <th>Session</th>          
          <th>Status</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($clsses as $clss)
        <tr id="tr{{$clss->id}}">
          <th id="id">{{$clss->id}}</th>
          <th id="name">{{ $clss->name }}</th>
          <td>{{ $clss->session->name }}</td>
          <td>{{ $clss->session_id }}</td>
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
