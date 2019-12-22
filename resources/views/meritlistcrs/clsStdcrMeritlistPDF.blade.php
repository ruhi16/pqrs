    <!DOCTYPE html>
    <html>
        <head>
            {{--  <title>Html Result Format</title>  --}}
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            {{--  <meta http-equiv="Content-Type" content="charset=utf-8" />  --}}
        </head>
        <style>
            table,th,td {
                border: 1px solid black;
                border-spacing: 0px;
                {{--  width: 100%;  --}}
                {{--  font-size: 14px;  --}}
                {{--  border-collapse: collapse;  --}}
                vertical-align: top;
                
            }
            th, td {
                padding: 2px;
            }
            h1, p, h2, h3, h4, h5, h6 {
                margin-top: 0;
                margin-bottom: 0;
                /*line-height: *//* adjust to tweak wierd fonts */;
            }
            </style>

<h1 align="center">{{ $school->name }}</h1>
<h3 align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
<h4 align="center"><u>Class</u> wise Students Merit List</h4>
<h4 align="center">For Class: {{ $clss->name }}, Session: {{ $session->name }}</h4>
@if( $is_pdf == 0 )
    <a class="btn btn-success pull-right" href="{{ url('/cls-StdcrMeritList', [$clssec->id, 1]) }}">Download</a><br>
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
            <td align="left">{{ $resultcr->id }}</td>
            <td align="left">{{ $resultcr->studentcr->studentdb->name }}</td>
            <td align="center">{{ $resultcr->clss->name }}</td>
            <td align="center">{{ $resultcr->section->name }}</td>
            <td align="center">{{ $resultcr->studentcr->roll_no }}</td>
            <td align="center">{{ $resultcr->obtnmarks }}</td>
            <td align="center">{{ $resultcr->noofds }}</td>
            <td align="center">{{ ++$i }}</td>        
        </tr>
    @endforeach
    
</table>







        </body>
    </html>
