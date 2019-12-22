
    @extends('layouts.baselayout')
    @section('title','Home')

    @section('header')
        @include('layouts.navbar')
    @endsection

    @section('content')


<h1 align="center">{{ $school->name }}</h1>
<h3 align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
<h4 align="center"><u>Class Section wise Students Merit List</u></h4>
<h4 align="center"><b>For Class: {{ $clssec->clss->name }}, Section: {{ $clssec->section->name }},Session: {{ $session->name }}</b></h4>

<a class="btn btn-success pull-right" href="{{ url('/clssec-StdcrMeritList', [$clssec->id, 1]) }}">Download</a><br>

<table class="table table-bordered"> 
    <tr>
        <th>CrID</th>
        <th>Student Name</th>
        <th>Class Section Roll</th>        
        <th>Total Marks Obt</th>
        <th>Total Ds Obt</th>
        <th>Result</th>
        <th>Rank</th>
        <th>Next Class Section Roll</th>  
    </tr>
    @php $i = 0; @endphp
    @foreach($resultcrs->where('extype_id', $extypes->where('name', 'Summative')->first()->id)->sortByDesc('obtnmarks') as $resultcr)
        <tr>
            <td>{{ $resultcr->id }}</td>
            <td>{{ $resultcr->studentcr->studentdb->name }}</td>
            <td align="center">{{ $resultcr->clss->name }}-{{ $resultcr->section->name }}-{{ $resultcr->studentcr->roll_no }}</td>
            <td align="center">{{ $resultcr->obtnmarks }}</td>            
            <td align="center">{{ $resultcr->noofds }}</td>
            <td align="center">{{ $resultcr->studentcr->result }}</td>
            <td align="center">{{ ++$i }}</td>  
            <td></td>      
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
