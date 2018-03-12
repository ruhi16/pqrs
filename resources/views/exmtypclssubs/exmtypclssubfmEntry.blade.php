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
        <th>Exam Type</th>
        <th>Subject</th>
        @foreach($exams as $exam)
            <th>{{ $exam->name }}</th>
        @endforeach
        <th>Total</th>
    </tr>
</thead>
<tbody>    
    @foreach($clsbs as $clsb)
        @if($clsb->clss_id == $cls->id)
        <tr>
            <td>{{ $clsb->subject->extype->name }}</td>
            <td>{{ $clsb->subject->name }}</td>
            @foreach($exams as $exam)                
                <td>
                    {{--  to extract subject_id, use an hidden textbox  --}}
                    <input type="hidden"value="{{$clsb->subject_id}}" 
                                        name="sb{{$exam->id}}{{$clsb->subject->extype->id}}{{$cls->id}}[]">

                    <input type="text"  value="" class="form-control input-sm"
                                        name="fm{{$exam->id}}{{$clsb->subject->extype->id}}{{$cls->id}}{{$clsb->subject_id}}[]">
                </td>                
            @endforeach
            <td></td>
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
