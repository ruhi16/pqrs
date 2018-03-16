@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1 class="text-center">{{$sch->name}}</h1>
<h4 class="text-center">{{$sch->po}} * {{$sch->ps}} * {{$sch->dist}} * {{$sch->pin}}</h4>
<h2 class="text-center">Progress Report</h2>
<br>
<strong>Name: </strong>{{$stcr->studentdb->name}} <strong>Class: </strong>{{$stcr->clss->name}}
<strong>Section: </strong>{{$stcr->section->name}}<strong>Roll No: </strong>{{$stcr->roll_no}}
<br>
<br>
<br>

<table class="table table-bordered">
  <thead>
    <tr>
      @foreach($exts as $ext)
        <th>{{$ext->name}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($exts as $ext)
      <td>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>            
            <th>Sl</th>
            <th>Subject</th>
            @foreach($exms as $exm)
              <th>{{$exm->name}}</th>
            @endforeach
            <th>Total</th>
            <th>Grade</th>
          </tr>          
        </thead>
        <tbody>
          @foreach($clsb as $cls)
            @if($cls->subject->extype_id == $ext->id)
              <tr>
                <td>{{$cls->id}}</td>
                <td>{{$cls->subject->name}}-{{$cls->subject_id}}</td>                
                @foreach($exms as $exm)
                  <td>
                  {{--  E:{{$exm->id}}-T:{{$ext->id}}-C:{{$cls->clss_id}}-S:{{$cls->subject_id}}  --}}                 
                    @php
                    $etcs_id = $etcs->where('exam_id',$exm->id)
                            ->where('subject_id',$cls->subject_id)
                            ->where('clss_id',$cls->clss_id)->first()->id;
                    @endphp
                    
                  {{ $mrks->where('exmtypclssub_id', $etcs_id)->pluck('marks')->first() }}
                  </td>
                @endforeach
                <td></td>
                <td></td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>          
      </td>
      @endforeach
    </tr>
  </tbody>
</table>
{{-- <table class="table table-bordered">
<thead>
  <tr>
    <th>Sl</th>
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Roll</th>
    <th>Total Marks Obt</th>
    <th>Full Marks</th>
    <th>Nos of Ds</th>
    <th>Result Status</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>  --}}
{{--  @foreach($stdcrs as $stdcr)
  <tr>
    <td>{{$stdcr->id}}</td>
    <td>{{$stdcr->studentdb->name}}</td>
    <td>{{$stdcr->clss->name}}</td>
    <td>{{$stdcr->section->name}}</td>
    <td>{{$stdcr->roll_no}}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
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
