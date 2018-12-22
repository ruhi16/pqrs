
    @extends('layouts.baselayout')
    @section('title','Home')

    @section('header')
        @include('layouts.navbar')
    @endsection

    @section('content')


<h1 align="center">{{ $school->name }}</h1>
<h3 align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
<h4 align="center"><u>Class Section</u> wise Students Merit List</h4>
<h4 align="center">For Class: {{ $clssec->clss->name }}, Section: {{ $clssec->section->name }} </h4>

<a class="btn btn-success pull-right" href="{{ url('/clssec-StdcrMeritList', [$clssec->id, 1]) }}">Download</a><br>

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
    @foreach($resultcrs->where('extype_id', 2)->sortByDesc('obtnmarks') as $resultcr)
        <tr>
            <td>{{ $resultcr->id }}</td>
            <td>{{ $resultcr->studentcr->studentdb->name }}</td>
            <td align="center">{{ $resultcr->clss->name }}</td>
            <td align="center">{{ $resultcr->section->name }}</td>
            <td align="center">{{ $resultcr->studentcr->roll_no }}</td>
            <td align="center">{{ $resultcr->obtnmarks }}</td>
            <td align="center">{{ $resultcr->noofds }}</td>
            <td align="center">{{ ++$i }}</td>        
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
