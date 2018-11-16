<!DOCTYPE html>
<html>
    <head>
        <title>Html Result Format</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        {{--  <meta http-equiv="Content-Type" content="charset=utf-8" />  --}}
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 0px;
        {{--  width: 100%;  --}}
        font-size: 11px;
        {{--  border-collapse: collapse;  --}}
		vertical-align: top;
        
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

    <style> 
	
    @font-face {
        font-family: "arial";
        font-style: normal;
        font-weight: normal;
        src: url(resources/fonts/SolaimanLipi.ttf) format('truetype');
    }
    * {
        font-family: "SolaimanLipi";
    }

	</style>
	<body>

    <h1 align="center">{{$school->name }}</h1>
    <h3 align="center">{{$school->vill}}*{{$school->ps}}*{{$school->dist}}</h3>
    <h3 align="center"><u>Class-Section-Subject Wise Grade-Status Count on Total Students</u></h3>




@foreach($clsses as $clss)
    <h2 align="center"><u>For Class: {{ $clss->name}}</u></h2>
    <table class="table table-bordered" border="1" width="100%">
        <thead>
            <tr>
                <th rowspan='2'>Subjects</th>  
                <th rowspan='2'>Exam</th>     
                <th rowspan='2'>FM</th>                
                @foreach($clss->clssecs as $clssec)
                    @php
                        $clscStd = $stdcrs->where('clss_id',$clss->id)
                            ->where('section_id', $clssec->section->id)
                            ->count();
                    @endphp
                    <th colspan="{{ $grades->count()+1}}">{{ $clssec->section->name }}, Total:{{ $clscStd }}</th>
                @endforeach
            </tr>
            <tr>                
                @foreach($clss->clssecs as $clssec)
                    @foreach($grades as $grade)
                        <th><small>{{ (int)$grade->stpercentage }}-{{ (int)$grade->enpercentage }}</small></th>
                    @endforeach
                        <th>AB</th>
                @endforeach
            </tr>
            @foreach($clss->subjects as $clssub) 
                @php
                    $clsb = $clssubs->where('clss_id', $clss->id)
                                            ->where('subject_id', $clssub->id)                                            
                                            ;
                    $mark_clssub = $marks->where('clssub_id', $clsb->first()->id);
                    
                @endphp               
                @foreach($exams as  $exam)
                <tr>
                    @if( $loop->first )
                        <td rowspan="{{$exams->count()}}">{{$clssub->name}}</td>                        
                    @endif
                    @php
                        $subj_fm = $extpmdclsbs->where('exam_id', $exam->id)
                                        ->where('extype_id', $clssub->extype_id )
                                        ->where('subject_id', $clssub->id)
                                        ->first()->fm
                                        ;
                    @endphp
                    <td>{{ substr($exam->name,0,3) }}</td>
                    <td>{{ $subj_fm }}</td>
                    @foreach($clss->clssecs as $clssec)
                        @php
                            $etmcs_id = $extpmdclsbs->where('exam_id', $exam->id)
                                            ->where('extype_id', $clssub->extype_id )
                                            ->where('subject_id', $clssub->id)
                                            ->first()->id
                                            ;
                            $st_mark_flag = 0;
                        @endphp
                        @foreach($grades as $grade)
                            @php   
                                $st_mark = round( (($grade->stpercentage / 100) * $subj_fm), 0 );
                                $en_mark = round( (($grade->enpercentage / 100) * $subj_fm), 0 );

                                if( !$loop->first && $st_mark_flag == $en_mark ){
                                        $en_mark--;                                    
                                }
                                $st_mark_flag = $st_mark;

                                $std_count = $mark_clssub->where('exmtypmodclssub_id', $etmcs_id)                                                
                                                ->where('clssec_id', $clssec->id)
                                                //->where(DB::raw('marks+1'),   10)
                                                ->where('marks', '>=',  $st_mark)
                                                ->where('marks', '<=',  $en_mark)
                                                //->where('marks','=', function(){return 10;})
                                                ->pluck('marks')
                                                ->count()
                                                ;

                            @endphp                            
                            <td align="center">
                                {{ $std_count }}
                                {{--  <br><small>{{ $st_mark }}-{{ $en_mark }}</small>  --}}
                            </td>
                        @endforeach
                        @php
                            $std_count_ab = $mark_clssub->where('exmtypmodclssub_id', $etmcs_id)                                                
                                                ->where('clssec_id', $clssec->id)
                                                ->where('marks', '<', 0)
                                                ->count();
                        @endphp
                        <td align="center">{{ $std_count_ab }}</td>
                    @endforeach
                </tr>
                @endforeach
            @endforeach


        </thead>
        <tbody>
        
        </tbody>
    </table>    




@endforeach



    </body>

</html>