@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Exam-Type Class Subject Wise Full Marks Distribution</h1>


<form method="post" class="form-horizontal" action="{!! url('/exmtypclssubfmEntry-submit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}
<table class="table table-bordered">
<caption><h3>For Class: {{ $cls->name }}</h3></caption>
<input type="hidden" name="clsId" value="{{ $cls->id }}">
<thead>
    <tr>
        <th rowspan="2">Exam Type</th>
        <th rowspan="2">Subject</th>
        @foreach($exams as $exam)
            <th colspan="2">{{ $exam->name }}</th>
        @endforeach
        <th rowspan="2">Total</th>
    </tr>
    <tr>        
        @foreach($exams as $exam)
            <th>ORAL</th>
            <th>WRITTEN</th>
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
            
            @foreach($exams as $exam)                
                <td>
                    {{--  to extract subject_id, use an hidden textbox  --}}
                    <input type="hidden"value="{{$clsb->subject_id}}" 
                                        name="sb{{$exam->id}}{{$clsb->subject->extype->id}}{{$cls->id}}[]">
                    @php                    
                    $xyz = $etcss->where('exam_id', $exam->id)
                                ->where('extype_id', $clsb->subject->extype->id)
                                ->where('subject_id', $clsb->subject_id)
                                ->first();
                    if($xyz == NULL){
                        $subMarks = 0;
                    }else{
                        $subMarks = $xyz->fm;
                    }
                    
                    @endphp

                    <input type="text"  value="{{ $subMarks }}" class="form-control input-sm"
                                        name="fm{{$exam->id}}{{$clsb->subject->extype->id}}{{$cls->id}}{{$clsb->subject_id}}[]">
                    @php $subTotal += $subMarks ; @endphp
                </td>
                <td>
                    <input type="text"  value="" class="form-control input-sm"
                                        name="">
                </td>
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
