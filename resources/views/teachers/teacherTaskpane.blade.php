@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

{{--  <div class="container">
<div class="row">
  <div class="col-sm-3">
    <img src="https://picsum.photos/150/150/?random" class="img-circle thumbnail" alt="Cinque Terre">    
  </div>
  <div class="col-lg-9">
    <h4><b>Name:</b> {{ $teacher->name }} </h4>
    <h5><b>Designation:</b> {{ $teacher->desig }} </h5>
    <h5><b>Mobile No:</b> {{ $teacher->mob }} </h5>
  </div>
</div>
</div>  --}}
<ul class="nav nav-pills pull-right">{{-- tabs or pills --}}
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>  

</ul> 
<div class="clearfix"></div>

<table class="table">
  <tbody>
    <tr>
      <td width="15%">
      <div class="thumbnail">
      @php
        $imgUrl = "teachersImage/".$teacher->id.".jpg";
      @endphp
        <img src="{{url($imgUrl)}}" class="img-circle thumbnail" alt="Image Not Found!!" width="300px" >

        <form action="{{ route('teachers.image', [$teacher->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
              {!! Form::file('photo',['id'=>$teacher->id]) !!}        
              <button type='submit' class="btn btn-success btn-sm">Change DP</button>
        {!! Form::close() !!}        
      </div>
        
      </td>
      <td class="align-text-bottom">        
        <h4><b>Name:</b> {{ $teacher->name }} </h4>
        <h5><b>Designation:</b> {{ $teacher->desig }} </h5>
        <h5><b>Mobile No:</b> {{ $teacher->mobno }} </h5>        
      </td>
    </tr>
  </tbody>
</table>
{{--  <div class="well well-sm"><h1>Teachers Takpane ...</h1></div>  --}}


{{--  <h2>Assigned Task</h2>  --}}

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
            $extpclsb = $extpclsbs
                  ->where('exam_id', $anscr->exam_id)
                  ->where('extype_id', $anscr->extype_id)
                  ->where('clss_id', $anscr->clss_id)                  
                  ->where('subject_id', $anscr->subject_id)
                  ->first()
                  ;
            $clsb = $clsbs->where('clss_id', $anscr->clss_id)
                  ->where('subject_id', $anscr->subject_id)
                  ->first();

            $clsc = $clscs->where('clss_id', $anscr->clss_id)
                  ->where('section_id', $anscr->section_id)
                  ->first();
          @endphp

          {{--  {{ $extpclsb }}  --}}
          {{--  {{$extpclsbs->id}}:{{$clsb->id}}:{{$clsc->id}}  --}}
          <a href="{{url('/clssecstd-MarksEntry', [$extpclsb->id,$clsb->id,$clsc->id])}}">Marks Entry </a>
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
