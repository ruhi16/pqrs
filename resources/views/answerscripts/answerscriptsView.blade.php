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
          <td>
                
                {{--  {{$clsc->section->id}}                  --}}
                {{--  {{$clsb->subject->id}}   <br>  --}}
                @php
                  $teacher_id = $ansscrdists->where('exam_id', $exm->id)
                    ->where('clss_id', $cls->id) 
                    ->where('section_id', $clsc->section->id)
                    ->where('subject_id', $clsb->subject->id)->pluck('teacher_id')->first()
                @endphp
                <small>{{ $teachers->where('id', $teacher_id)->pluck('name')->first()}}</small>
                <br>

                <a href="#" class="btn-addTeacher" data-toggle="modal" data-target="#myModal" 
                data-exam_nm="{{$exm->name}}"
                data-clss_nm="{{$cls->name}}"
                data-secn_nm="{{$clsc->section->name}}"
                data-subj_nm="{{$clsb->subject->name}}"
                data-subj_id="{{$clsb->subject->id  }}">                
                <span class="glyphicon glyphicon-cutlery"></span>                
                </a>
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
						<input type="text" class="form-control" id="exTerm" name="exTerm" readonly>
					</div>         
          
          <label class="control-label col-sm-1" for="exClss">Class:</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="exClss" name="exClss" readonly>
					</div> 
          
          <label class="control-label col-sm-1" for="exSecn">Section:</label>
					<div class="col-sm-1">
						<input type="text" class="form-control" id="exSecn" name="exSecn" readonly>
					</div> 
                  
          <label class="control-label col-sm-1" for="exSubj">Subject:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="exSubj" name="exSubj" readonly>
					</div> 

      	</div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="exTeach">Select Teacher:</label>
					<div class="col-sm-5">
            {{--  <input type="text" value="" name="tempSubId">  --}}
            <select class="form-control" name="exTeach" id="exTeach">
              <option value="0">                          </option>
              @foreach($subjs as $subj)
                {{--  @if($subj->id == 3)  --}}
                <optgroup label="{{$subj->name}}">
                    @foreach($subj->teachers as $teacher)                                  
                      <option value="{{$teacher->id}}">{{$teacher->name}}</option>              
                    @endforeach  
                </optgroup>
                {{--  @endif  --}}
              @endforeach
            </select>      
						{{--  <input type="text" class="form-control" id="exTeach" name="exTeach" disabled>  --}}
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
      var exId = $(this).data('exam_nm');
      var clId = $(this).data('clss_nm');
      var scId = $(this).data('secn_nm');
      var sbId = $(this).data('subj_nm');
      
      var sbjctId = $(this).data('subj_id');

      $('input[name="exTerm"]').val(exId);
      $('input[name="exClss"]').val(clId);
      $('input[name="exSecn"]').val(scId);
      $('input[name="exSubj"]').val(sbId);

      $('input[name="tempSubId"]').val(sbjctId);
      
      // alert(exId+':'+clId+':'+scId+':'+sbId);
      
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
