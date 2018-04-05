@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Teachers Takpane ...</h1>
<h2><b>Name:</b> {{$teacher->name}}</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Exam Term</th>
      <th>Class</th>
      <th>Section</th>
      <th>Subject</th>
      <th>Total Students</th>
      <th>Scripts Received</th>
      <th>Issue Date</th>
      <th>Submit Date</th>
      <th>Finalize Date</th>
      <th>Remarks</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($anscrdists as $anscr)
      <tr>
        <td>{{$anscr->id}}</td>
        <td>{{$anscr->exam->name}}</td>
        <td>{{$anscr->clss->name}}</td>
        <td>{{$anscr->section->name}}</td>
        <td>{{$anscr->subject->name}}</td>
        <td>{{$anscr->nostudent_pre}}</td>
        <td>{{$anscr->noscripted_rec}}</td>
        <td>{{$anscr->issue_dt}}</td>
        <td>{{$anscr->submt_dt}}</td>
        <td>{{$anscr->finlz_dt}}</td>
        <td>{{$anscr->remark}}</td>
        <td>
          @php
            $extpclsbs = $extpclsbs
                  ->where('exam_id', $anscr->exam_id)
                  ->where('extype_id', $anscr->extype_id)
                  ->where('clss_id', $anscr->clss_id)
                  ->where('subject_id', $anscr->subject_id)
                  ->first();
            $clsb = $clsbs->where('clss_id', $anscr->clss_id)
                  ->where('subject_id', $anscr->subject_id)
                  ->first();

            $clsc = $clscs->where('clss_id', $anscr->clss_id)
                  ->where('section_id', $anscr->section_id)
                  ->first();
          @endphp
          {{--  {{$extpclsbs->id}}:{{$clsb->id}}:{{$clsc->id}}  --}}
          <a href="{{url('/Clssecstd-MarksEntry', [$extpclsbs->id,$clsb->id,$clsc->id])}}">Marks Entry</a>
          {{--  /Clssecstd-MarksEntry/{extpcl_id}/{clsb_id}/{clsc_id}  --}}
        </td>
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
