@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<center>
    <h1></b> <u>Grade-D Status Count</u> on Total Students </h1>
</center>

<h2>Class <b>{{ $clss->name }}</b>, No of Subjects: {{ $cls_no_of_subjects }}</h2>


<table class='table table-bordered'>
    <thead>
    <tr>
        <th>Sl No</th>
        <th>Class</th>
        <th>Section</th>
        @for($i=0; $i<=$cls_no_of_subjects; $i++)
            <th>{{$i}}D</th>
        @endfor
        <th>Total</th>
    </tr>
</thead>
@php $count = 0 @endphp
@foreach($cls_GrD_Status as $key => $cls_GrD_Sts)
    @php $section_total_students = 0 @endphp
    <tr>
        <td>{{ ++$count }}</td>
        <td>{{ $clss->name }}</td>
        <td>{{ $key }}</td>
        
    
    @php  ksort($cls_GrD_Sts)  @endphp
    {{--  {{ implode(', ',$cls_GrD_Sts) }}   --}}
    @foreach($cls_GrD_Sts as $k => $cls_GrD)        
        @php $section_total_students += $cls_GrD @endphp
    @endforeach 
    
    
    @php $c = 0 @endphp
    @foreach($cls_GrD_Sts as $k => $cls_GrD)
        {{-- {{ $k }}Ds: {{ $cls_GrD }}, --}}
        @if($c < $k)
            
            @for($i=0; $i<=$k-$c; $i++)
                <td></td>
                @php $c++ @endphp
            @endfor
            
        @endif

        @php $GrD_Percentage = round( ($cls_GrD/$section_total_students)*100, 2)  @endphp
        <td>{{ $k }}Ds:<strong>{{ $cls_GrD }} </strong><br/><small><b>({{ $GrD_Percentage }}%)</b></small></td>
        @php $c++ @endphp
        
    @endforeach 
    <th>{{ $section_total_students }}</th>

    </tr>

@endforeach
</table>








<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
