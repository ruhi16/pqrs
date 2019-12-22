@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1 align="center">{{ $school->name }}</h1>
<h3 align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
<h4 align="center"><u>Class</u> wise Students Merit List</h4>
<h4 align="center">For Class: {{ $clss->name }}, Session: {{ $session->name }}</h4>
@if( $is_pdf == 0 )
    <a class="btn btn-success pull-right" href="{{ url('/cls-StdcrMeritList', [$clss->id, 1]) }}">Download</a><br>
@else 
    
@endif

<table class="table table-bordered"> 
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Roll No</th>
        <th>Total Marks Obt</th>
        <th>Total Ds Obt</th>
        <th>Rank</th>
    </tr>
    @php $i = 0; @endphp
    @foreach($resultcrs->where('extype_id', $extypes->where('name', 'Summative')->first()->id)->sortByDesc('obtnmarks') as $resultcr)
        <tr>
            <td>{{ $resultcr->id }}</td>
            <td>{{ $resultcr->studentcr->studentdb->name }}</td>
            <td>{{ $resultcr->clss->name }}</td>
            <td>{{ $resultcr->section->name }}</td>
            <td>{{ $resultcr->studentcr->roll_no }}</td>
            <td>{{ $resultcr->obtnmarks }}</td>
            <td>{{ $resultcr->noofds }}</td>
            <td>{{ ++$i }}</td>        
        </tr>
    @endforeach
    
</table>











<script>
    $(document).ready(function(e){  

    
    });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
