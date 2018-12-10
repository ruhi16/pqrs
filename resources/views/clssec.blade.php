@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<h1>Class Section Entry Page</h1>

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
              <th class="text-center">Action</th>
              {{--  <th class="text-center">Subjects</th>
              <th class="text-center">Exam</th>  --}}
            </tr>
          </thead>
          <tbody>
            
            @foreach($clss as $cl)
              <tr>
                <td class="text-center">{{ $cl->id }}</td>
                <td class="text-center">{{ $cl->name }}</td>
                {{--  <td>{{ $cl->clss->distinct('name')->count() }}</td>  --}}

                <td class="text-left">
                  @foreach($clssecs as $clsc)
                    @if($clsc->clss_id == $cl->id)
                    {{$clsc->section->name}}
                    @endif
                  @endforeach
                </td>
                <td class="text-center">
                  <a href="{!! url('/addSec',[$cl->id]) !!}" class="btn btn-primary btn-sm">
                                      <span class="glyphicon glyphicon-plus"></span></a>
                  <a href="{!! url('/delSec',[$cl->id]) !!}" class="btn btn-danger btn-sm">
                                      <span class="glyphicon glyphicon-minus"></span></a>
                </td>
                {{--  <td>
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Edit</button>
                    <a href="{!! url('/#',[$cl->id]) !!}" class="btn btn-primary btn-sm pull-right">Edit</a>
                </td>    --}}
                {{--  <td>{{ $cl->section->name }}</td>  --}}
                {{--  <td></td>  --}}
              </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- end of panel-default -->




{{--  <table class="table table-bordered">
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
  <td>{{ $clssec->clss_id }}</td>
  <td>{{ $clssec->section_id }}</td>
</tr>
@endforeach

</tbody>
</table>  --}}


<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
