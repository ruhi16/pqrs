@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Exam-Type Class Subject Wise Full Marks Distribution</h1>


<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>Class</th>
    <th>Exam Type</th>
    @foreach($exams as $exm)
      <th>{{ $exm->name }}</th>
    @endforeach
  </tr>
</thead>
<tbody>

    @foreach($extps as $ext)
    <tr>    
        <th>{{ $cls->name }} </th>
    
        <th>{{ $ext->name }}</th>
        @foreach($exams as $exm)
            <th>
            @foreach($etmcs as $emd)
               @if($emd->exam_id == $exm->id && $emd->extype_id == $ext->id)
                {{ $emd->mode_id }}            

                @endif
            @endforeach
            </th>
        @endforeach        
    </tr>
    @endforeach
</tbody>
</table>



<form method="post" class="form-horizontal" action="{!! url('/exmtypmodclssubfmEntry-Submit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}


<table class="table table-bordered">
<caption class = "text-center"><h3>For Class: {{ $cls->name }}</h3></caption>
<input type="hidden" name="clsId" value="{{ $cls->id }}">
<thead>
    <tr>
        <th rowspan="2" class="text-center">Exam Type</th>
        <th rowspan="2" class="text-center">Subject</th>
        @foreach($exams as $exam)
            <th colspan="2" class="text-center">{{ $exam->name }}</th>
        @endforeach
        <th rowspan="2">Total</th>
    </tr>
    <tr>        
        @foreach($exams as $exam)
            <th class="text-center">ORAL</th>
            <th class="text-center">WRITTEN</th>
        @endforeach        
    </tr>
</thead>
<tbody>    
    @foreach($clsbs as $clsb)
        @if($clsb->clss_id == $cls->id)
        @php $subTotal = 0; @endphp
        <tr>
            <td>{{ $clsb->subject->extype->name }}</td>
            <td>{{ $clsb->subject->name }}</td>
            
            @foreach($exams as $exm)
                @foreach($exmds as $emd)
                    @php
                        $flag = $etmcs->where('exam_id', $exm->id)
                                      ->where('extype_id', $clsb->subject->extype_id)
                                      ->where('mode_id', $emd->id)
                                      ->first();
                    @endphp

                    
                    @if($flag)
                        <td>
                        <input type="hidden" class="form-control input-sm"
                                value="{{$exm->id}}-{{$clsb->subject->extype_id}}-{{$emd->id}}-{{$cls->id}}-{{$clsb->subject_id}}"
                                name="fmarksId[]">

                        <input  type="text"  
                                value="" 
                                class="form-control input-sm"
                                name="fmarks[]">
                        </td> 
                    @else
                        <td></td>
                    @endif
                    
                @endforeach
            @endforeach
            
            <td>{{ $subTotal }}</td>
        </tr>
        @endif
    @endforeach
</tbody>
</table>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

<br>

<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
