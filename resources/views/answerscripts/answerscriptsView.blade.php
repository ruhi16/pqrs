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
      <th>Teachers</th>
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
        <td>
          @foreach($subjs as $subj)
            @if($subj->id == $clsb->subject->id)
              @foreach($subj->teachers as $teacher)
                <small>{{$teacher->name}},</small><br>
              @endforeach
            @endif
          @endforeach
        </td>
        @foreach($clsecns as $clsc)
          <td><a href="#" class="btn-addTeacher" data-toggle="modal" data-target="#myModal" 
                data-exam_id="{{$exm->id}}"
                data-clss_id="{{$cls->id}}"
                data-secn_id="{{$clsc->id}}"
                data-subj_id="{{$clsb->id}}"><span class="glyphicon glyphicon-cutlery"></span></a>
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
  <div class="modal-dialog modal-lg">
  {!! Form::open(['url'=>'/answerscript-distribution-addsubject','method'=>'post', 'class'=>'form-horizontal']) !!}
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Teacher</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
        	<label class="control-label col-sm-1" for="exTerm">Term:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="exTerm" name="exTerm" disabled>
					</div>         
          
          <label class="control-label col-sm-1" for="exClss">Class:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="exClss" name="exClss" disabled>
					</div> 
          
          <label class="control-label col-sm-1" for="exSecn">Section:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="exSecn" name="exSecn" disabled>
					</div> 
                  
          <label class="control-label col-sm-1" for="exSubj">Subject:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="exSubj" name="exSubj" disabled>
					</div> 

      	</div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="exSubj">Select Teacher:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="exSubj" name="exSubj" disabled>
					</div> 
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
   {!! Form::close() !!}
  </div>
</div>



















<script type="text/javascript">
  $(document).ready(function(e){
    $('.btn-addTeacher').on('click', function(){
      var exId = $(this).data('exam_id');
      var clId = $(this).data('clss_id');
      var scId = $(this).data('secn_id');
      var sbId = $(this).data('subj_id');
      
      // alert(exId+':'+clId+':'+scId+':'+sbId);
      
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
