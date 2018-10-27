<!DOCTYPE html>
<html>
    <head>
        <title>Mark Register Pdf</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 0px;
        width: 80%;
        font-size: 11px;
        border-collapse: collapse;
        
    }
    th, td {
    padding: 1px;
    {{--  text-align: center;  --}}
    }
    </style>
    <style>
    .page-break {
        {{--  page-break-inside:avoid;  --}}
        page-break-after: always;
    }
    </style>
    <body>
        <center>
        <h2>{{ $school->name }}</h2>
        <h3>Marks Entry Verificaton Sheet for Session: {{ $session->name }}</h3>
        <h5>For Class: {{ $clssec->clss->name }}, Section: {{ $clssec->section->name }}</h5>
        </center>

        <table border='1'>
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Exam</th>
                    @foreach($clssubs as $clsb)
                        <th>{{ $clsb->subject->code }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>            
                @foreach($stdcrs as $stdcr)
                <tr>
                    <td rowspan='{{ $exams->count() }}'>{{ $stdcr->id }}</td>
                    <td rowspan='{{ $exams->count() }}'>
                        {{ $stdcr->studentdb->name }}<br>
                        {{ $stdcr->clss->name }} - {{ $stdcr->section->name }}: {{ $stdcr->roll_no }} 
                        {{--  {{dd($stdMarksArray)}}  --}}
                    </td>
                    
                    @foreach($exams as $exam)  
                        @if(!$loop->first)                  
                            <tr>
                        @endif

                        <td>{{ substr($exam->name,0,3) }}</td>
                        @foreach($clssubs as $clsb)
                            <td class='text-center' style="text-align:center;">
                            @php
                                $etmcs_id = $extpmdclsbs->where('exam_id', $exam->id)
                                                ->where('subject_id', $clsb->subject_id)
                                                ->first()->id;
                                //echo $etmcs_id;
                            
                                if( isset($stdMarksArray[$stdcr->id][$etmcs_id]) ){
                                    $obMark = $stdMarksArray[$stdcr->id][$etmcs_id] < 0 ? 'AB' : $stdMarksArray[$stdcr->id][$etmcs_id];
                                }else{
                                    $obMark = '';
                                }                            
                            @endphp
                            
                            {{ $obMark }}
                            {{--  {{ $stdMarksArray[$stdcr->id][$etmcs_id] or ''}}  --}}
                            </td>
                        @endforeach
                        </tr>
                    @endforeach                    

                </tr>
                {{--  @if( ($loop->index+1 ) % 15 == 0)
                    <div class='page-break'></div>
                @endif  --}}
                @endforeach            
            </tbody>
        </table>
        
            {{--  @foreach($stdMarksArray[5] as $key => $smark)
                {{ $key }}:{{ $smark }}
            @endforeach   --}}
            {{--  {{$stdMarksArray[5][20]}}  --}}
    </body>
</html>