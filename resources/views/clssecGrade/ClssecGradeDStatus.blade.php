@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<center>
    <h1>Class-Section-Subject Wise <u>Grade-D Status Count</u> on Total Students </h1>
</center>

{{--  {!! QrCode::size(200)->color(150,90,10)->generate('Make me a QrCode!'); !!}  --}}
{!! $chart->html() !!}

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>Class</th>
            <th>Section</th>
            @for($i=0; $i<=$class_subject_count; $i++)
                <th>{{ $i }}D</th>


            @endfor
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $clssec->clss->name}}</td>
            <td>{{ $clssec->section->name }}</td>
            @for($i=0; $i<=$class_subject_count; $i++)
                @if( array_key_exists($i, $class_D) )
                    <th>{{ $class_D[$i]}}</th>
                @else 
                    <th>Not Exists</th>
                @endif
            @endfor
            <th>{{ array_sum($class_D) }}</th>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}


@endsection

@section('footer')
	@include('layouts.footer')
@endsection
