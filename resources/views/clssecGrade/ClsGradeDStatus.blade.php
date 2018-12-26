@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<center>
    <h1>Class Wise <u>Grade-D Status Count</u> on Total Students </h1>
</center>



@foreach($cls_GrD_Status as $key => $cls_GrD_Sts)
    {{ $key }}=> 
    {{--  {{ implode(', ',$cls_GrD_Sts) }}   --}}
    @foreach($cls_GrD_Sts as $k => $cls_GrD)
        {{ $k }}Ds: {{ $cls_GrD }},
    @endforeach 
    <br>

@endforeach









<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
