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
<h4 align="center"><u>Class Section wise Students Merit List</u></h4>
<h4 align="center"><b>For Class: {{ $clssec->clss->name }}, Section: {{ $clssec->section->name }}, Session: {{ $session->name }} </b></h4>
@if( $is_pdf == 0 )
    <a class="btn btn-success pull-right" href="{{ url('/clssec-StdcrMeritList', [$clssec->id, 1]) }}">Download</a><br>
@else 
    
@endif

<table class="table table-bordered" border="1" width="100%"> 
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
    // only according to extype => Summative
    @foreach($resultcrs->where('extype_id', $extypes->where('name', 'Summative')->first()->id)->sortByDesc('obtnmarks') as $resultcr)
        <tr><small>
            <td>{{ $resultcr->id }}</td>
            <td>{{ $resultcr->studentcr->studentdb->name }}</td>
            <td align="center">{{ $resultcr->clss->name }}
            -{{ $resultcr->section->name }}
            -{{ $resultcr->studentcr->roll_no }}</td>
            <td align="center">{{ $resultcr->obtnmarks }}</td>
            <td align="center">{{ $resultcr->noofds }}</td>
            <td align="center">{{ $resultcr->studentcr->result }}</td>
            <td align="center">{{ ++$i }}</td> 
            <td></td>       
            </small>
        </tr>
    @endforeach
    
</table>


  
        </body>
    </html>
