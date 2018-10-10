<!DOCTYPE html>
<html>
    <head>
        <title>Html Result Format</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 0px;
        {{--  width: 100%;  --}}
        font-size: 10px;
        {{--  border-collapse: collapse;  --}}
        
    }
    th, td {
    padding: 2px;
    }
    </style>
    <style>
    .page-break {
        page-break-after: always;
    }
    </style>


    <body>
        <center>
        <h2>{{ $school->name }}</h2>
        <h3>Answer Script Finalize Status for Term: <u>{{ $exam->name }}</u></h3>
        
        </center>

        @foreach($clss as $cls)
        <h3>For Class: {{ $cls->name }}</h3>   
            <table border="1" width="100%">
            <thead>
            <tr>
                <th>Subjects</th>
                    @foreach($cls->clssecs as $csec)
                        @php
                            $clscStd = $stdcrs->where('clss_id',$cls->id)
                                ->where('section_id', $csec->section->id)
                                ->count();
                        @endphp
                        <th>{{ $csec->section->name }}: {{ $clscStd }}</th>
        
                    @endforeach
            </tr>     
            </thead>
            <tbody>
                @foreach($cls->subjects as $csub)
                @if($csub->extype_id == 2)
                    <tr>
                    <td>{{ $csub->name }}</td>
                    @foreach($cls->clssecs as $csec)
                        @php
                            $allot_teacher = $ansscdists->where('clss_id', $cls->id)
                                ->where('section_id', $csec->section->id)
                                ->where('subject_id', $csub->id)
                                ->pluck('teacher_id')->first();


                            $teacher_name = $teachers->where('id',$allot_teacher)->pluck('name')->first();
                            
                            $status = $ansscdists->where('clss_id', $cls->id)
                                ->where('section_id', $csec->section->id)
                                ->where('subject_id', $csub->id)
                                ->pluck('finlz_dt')->first();
                            if( $status ){
                                $finalize_status = " Y ";
                                $teacher_name ='';
                            }else{
                                $finalize_status = " X ";                                
                            }
                        @endphp
                        <td>
                        {{ $teacher_name }}
                        @if($teacher_name != "")
                            {!! $finalize_status !!}
                        @endif
                        </td>    
                    @endforeach
                    </tr>
                @endif
                @endforeach
            
            
            </tbody>
        </table>
        @endforeach
    </body>
</html>