@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title pull-left">
      Class & Section Details...
    </h3>      
		<div class="clearfix"></div>			
			</div><!--/end of panel heading-->
        <table class="table table-bordered">            
          <thead>
            <tr>
              <th class="text-center">SL No</th>
              <th class="text-center">Class</th>
              <th class="text-center">Sections</th>
              <th class="text-center">Subjects</th>
              <th class="text-center">Exam</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($clss as $cl)
              <tr>
                <td>{{ $cl->id }}</td>
                <td>{{ $cl->name }}</td>
                {{--  <td>{{ $cl->clss->distinct('name')->count() }}</td>  --}}

                <td>
                  @foreach($clssecs as $clsc)
                    @if($clsc->clss->id == $cl->id)
                    {{$clsc->section->name}}
                    @endif
                  @endforeach
                  <a href="{!! url('/addSec',[$cl->id]) !!}" class="btn btn-primary btn-sm pull-right">
                                      <span class="glyphicon glyphicon-plus"></span></a>
                  <a href="{!! url('/delSec',[$cl->id]) !!}" class="btn btn-danger btn-sm pull-right">
                                      <span class="glyphicon glyphicon-minus"></span></a>
                </td>
                <td>
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Edit</button>
                    {{--  <a href="{!! url('/#',[$cl->id]) !!}" class="btn btn-primary btn-sm pull-right">Edit</a>  --}}
                </td>  
                {{--  <td>{{ $cl->section->name }}</td>  --}}
              </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- end of panel-default -->


      <h1>Class Section Entry Page</h1>





<table class="table table-bordered">
<thead>
    <tr>
        <th>id</th>
        <th>Class</th>
        <th>Sections</th>                
    </tr>
</thead>
<tbody>
@foreach($clssecs as $clssec)
<tr>
  <td>{{ $clssec->id }}</td>
  <td>{{ $clssec->clss->name }}</td>
  <td>{{ $clssec->section->name }}</td>
</tr>
@endforeach

</tbody>
</table>


<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
