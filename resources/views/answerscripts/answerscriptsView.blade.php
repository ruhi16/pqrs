@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Answer Script Distribution Point</h1>
<h2>Exam: {{$exm->name}}, Class: {{$cls->name}}</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Subject</th>
      @foreach($clsecns as $clsc)
        <th>{{$clsc->section->name}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>    
    @foreach($clsubjs as $clsb)
      <tr>
        <td>{{$clsb->subject->id}}</td>
        <td>{{$clsb->subject->name}}</td>
        @foreach($clsecns as $clsc)
          <td><a href="#" class="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></a>
            {{--  <button type="button" class="btn btn-info btn-lg" >Open Modal</button>  --}}
          </td>
        @endforeach
      </tr>
    @endforeach
  </tbody>
</table>




<!-- Trigger the modal with a button -->
{{--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>  --}}

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



















<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
