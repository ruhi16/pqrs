@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Session Details...</h1>
@foreach($sessions as $session)
  @if($session->status == 'CURRENT')
    <h2>Current Session is: {{$session->name}} <small>From {{$session->stdate}} to {{$session->entdate}} </small></h2>
  @endif
@endforeach
<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">
        Session Details
      </h3>        
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered">
			<thead>
				<tr>
          <th>#</th>
          <th>Session</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Status</th>
          <th>Action</th>
				</tr>
			</thead>
			<tbody>
      @foreach($sessions as $session)
        <tr>
          <th scope="row">{{$session->id}}</th>
          <th>{{$session->name}}</th>
          <td>{{$session->stdate}}</td>
          <td>{{$session->entdate}}</td>
          <td><span class="label label-{{$session->status == 'CURRENT'?'danger':'success'}}">{{$session->status}}</span></td>
          <td><a href="{!! url('/setSession', [$session->id]) !!}" class="btn btn-primary" >Set As Current</a>
              {{--  <a href="{!! url('/editSession',[$session->id]) !!}" class="btn btn-primary">Edit</a>  --}}
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
