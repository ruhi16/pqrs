@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<center>
    <h1>Class-Section-Subject Wise <u>Grade-D Status Count</u> on Total Students </h1>
</center>

{{--  {{ dd($coll_class_data) }}  --}}
{{--  @foreach ($coll_class_data as $test)

    {{ $test['clss'] }}

@endforeach  --}}

{{--  {!! Chirts::assets() !!}  --}}
{!! $chart->container() !!}

{{--  {!! $chart->script() !!}  --}}

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

{!! $chart->script() !!}


{{--  <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
         --}}
@endsection

@section('footer')
	@include('layouts.footer')
@endsection
