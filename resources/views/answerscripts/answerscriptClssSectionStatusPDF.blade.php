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
        font-size: 11px;
        border-collapse: collapse;
        
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

	<style type="text/css">
    @font-face
    {
        font-family: 'SolaimanLipi';
        src: url('resources/fonts/SolaimanLipi.ttf');
    }
    * {
        font-family:'SolaimanLipi', sans-serif;
        font-size: 10pt;
    }

		
	</style>

    <body>
        <center>
        <h3>{{ $school->name }}</h3>
        <h5>Answer Script Finalize Status for Session: <u>{{ $session->name }}</u></h5>
        হালো
        </center>

        @foreach($clss as $cls)
        <h3>For Class: {{ $cls->name }}</h3>
            <table border="1" width="100%">
                <thead>
                    <tr>
                    <th rowspan='2'>Subjects</th>
                        @foreach($cls->clssecs as $csec)
                            @php
                                $clscStd = $stdcrs->where('clss_id',$cls->id)
                                    ->where('section_id', $csec->section->id)
                                    ->count();
                            @endphp
                            <th colspan='{{ $exams->count() }}' class='text-center'>{{ $csec->section->name }}: {{ $clscStd }}</th>    
                        @endforeach
                    </tr>        

                    <tr>                
                        @foreach($cls->clssecs as $csec)
                            @foreach($exams as $exam)
                                <th class='text-center'>{{ substr($exam->name, 0, 3) }}</th>
                            @endforeach
                        @endforeach                
                    </tr>    
                </thead>
                <tbody>
                @foreach($cls->subjects as $csub)
                @if($csub->extype_id == $extype->first()->id)      {{-- for Formative Subject Only --}}
                    <tr>
                    <td>{{ $csub->name }}</td>
                    @foreach($cls->clssecs as $csec)
                        @foreach($exams as $exam)
                            @php
                                $allot_teacher = $ansscdists->where('clss_id', $cls->id)
                                    ->where('exam_id', $exam->id)
                                    ->where('section_id', $csec->section->id)
                                    ->where('subject_id', $csub->id)
                                    ->pluck('teacher_id')->first();

                                $teacher_name = $teacher->where('id',$allot_teacher)->pluck('nickName')->first();
                                //dd($teacher_name)
                                $status = $ansscdists->where('clss_id', $cls->id)
                                    ->where('exam_id', $exam->id)
                                    ->where('section_id', $csec->section->id)
                                    ->where('subject_id', $csub->id)
                                    ->pluck('finlz_dt')->first();
                                if( $status ){
                                    $finalize_status = "<span class='glyphicon glyphicon-ok'></span>";
                                    $teacher_name ='';
                                }else{
                                    $finalize_status = "<span class='glyphicon glyphicon-remove' style='color:red'></span>";                                
                                }
                            @endphp
                            <td><small>
                                {{ $teacher_name }}x
                                @if($teacher_name != "")
                                    {!! $finalize_status !!}
                                @endif
                                </small>
                            </td> 
                        @endforeach   
                    @endforeach
                    </tr>
                @endif
            @endforeach
            
            
            </tbody>
        </table>
        @if( ($loop->index + 1) % 3 == 0)
            <div class='page-break'></div>
        @endif
            @if($loop->last)
            <h3>Teachers Details</h3>
                @foreach($teacher as $teach)
                    <u>{{ $teach->nickName }}</u>: {{ $teach->name }}, 
                @endforeach
                <p>N.B: any kind of mistaken!, feel free to inform Hari Narayan Das, Abdul Momen.</p>
            @endif
        @endforeach


    </body>
</html>