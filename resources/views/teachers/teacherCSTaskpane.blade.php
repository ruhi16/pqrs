@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
{{--  {{ dd($teacher) }}  --}}

<ul class="nav nav-pills pull-right">{{-- tabs or pills --}}
  <li role="presentation"><a href="{{ url('/teachers-takspan', [$teacher->id]) }}">Home</a></li>
  @if($clteacher != NULL)
    <li role="presentation" class="active"><a href="{{ url('/teachers-CStakspan', [$teacher->id])}}">T-CS Task Pane</a></li>
  @endif
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>  

</ul> 
<div class="clearfix"></div>
<hr>




{{--  <div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#">Title</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
  </div>
</div>  --}}



<h2>Class: {{ $clteacher->clss->name }},  Section:{{ $clteacher->section->name }}</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Exam Type</th>
      <th>Subject Name</th>
      @foreach($exm as $ex)
        @foreach($modes as $mode)
          <th>{{ $ex->name }}-{{ $mode->name }}</th>
        @endforeach  
      @endforeach
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>Formative </td>
    <td>All Formative Subjects </td>
    @foreach($exm as $ex)
        @foreach($modes as $mode)
        <td>
          {{--  @foreach($extpcls->groupBy('subject_id')->first() as $extpcl)  --}}
          @foreach($extpmdcls as $extpcl)
            @if(  $extpcl->exam_id == $ex->id && 
                  $extpcl->extype_id == 1 &&                  
                  $extpcl->mode_id == $mode->id )
                  {{--  {{ $extpcl->id }}  --}}
                  <a href="{{ url('/clssecstd-MarksEntryForAllSubj', [$extpcl->id, $clsc->id]) }}"><span class="glyphicon glyphicon-floppy-saved"></span></a> Enter Marks
            @endif
          @endforeach
          </td>
        @endforeach
      @endforeach
  </tr>
  </tbody>
</table>





<table class="table table-bordered">
  <thead>
    <tr>
      <th>Exam Type</th>
      <th>Subject Name</th>
      @foreach($exm as $ex)
        @foreach($modes as $mode)
          <th>{{ $ex->name }}-{{ $mode->name }}</th>
        @endforeach  
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($clsb as $cl)
      @if($cl->subject->extype_id == 2) {{-- for formative subject only --}}
        <td>{{ $cl->subject->extype->name }}</td> 
        <td>{{ $cl->subject->name }}</td>
        @foreach($exm as $ex)
          @foreach($modes as $mode)
          <td>
            @foreach($extpcls as $extpcl)
              @if(  $extpcl->exam_id == $ex->id && 
                    $extpcl->extype_id == $cl->subject->extype->id && 
                    $extpcl->subject_id == $cl->subject_id  &&
                    $extpcl->mode_id == $mode->id )
                  
                  <a href="{{url('/clssecstd-MarksEntry',[$extpcl->id,$cl->id,$clsc->id])}}"><span class="glyphicon glyphicon-floppy-saved"></span></a>
                  
                  @if($stdmrk
                      ->where('exmtypmodclssub_id', $extpcl->id)
                      ->where('clssec_id', $clsc->id)
                      ->where('clssub_id',$cl->id)->sum('marks')  != 0)
                      <b>Done</b>
                  @else
                    <b>Pending</b>
                  @endif
              
              @endif
            @endforeach
          </td>
          @endforeach
        @endforeach
      </tr>
      @endif
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
