@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Gradeparticular Information...</h1>

{!! Form::open(['url'=>'/gradeparticulars-submit','method'=>'post', 'class'=>'form-horizontal']) !!}

<div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h3 class="panel-title pull-left">
          Grade Particular Details
              </h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            Add New Gradeparticular
          </button>
          <div class="clearfix"></div>
      
      </div>
      {{--  <div class="panel-body">
        <p>...</p>
      </div>  --}}
  
          <table class="table table-bordered" id="tabclss">
              <thead>
                  <tr>
            <th>#</th>
            <th>Grade Paticular</th>
            <th>Session</th>          
            <th>Status</th> 
            <th>Action</th>         
                  </tr>
              </thead>
              <tbody>
        @foreach($grparts as $grpart)
          <tr id="tr{{$grpart->id}}">
            <th id="id">{{$grpart->id}}</th>
            <th id="name">{{ $grpart->name }}</th>
            <td>{{ $grpart->session_id }}</td>
            <td>{{ $grpart->session_id }}</td>
            <td>
                <button class="btn btn-success btn-sm btnEdit" data-id="{{$grpart->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
                <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$grpart->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
            </td>
          </tr>
        @endforeach
              </tbody>
          </table>
    </div><!--/panel starting div -->
  </div><!--/1st row within 2nd column -->
  

{!! Form::close() !!}

<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
