<!DOCTYPE html>
<html>
    <head>
        <title>Mark Register Pdf</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 1px;
        width: 90%;
        @if( $is_pdf == 1 )
            font-size: 250px;
        @else
            font-size:12px;
        @endif
        border-collapse: collapse;
        overflow: auto; //wrape
        
    }
    th, td {
    padding: 1px;
    text-align: center;
    {{--  line-height: 40px;  --}}
    }
    </style>
    <style>
    .page-break {
        page-break-inside:auto; {{-- avoid | auto --}}
        {{--  page-break-after: always;  --}}
    }
    @page {
	    header: page-header;
	    footer: page-footer;
    }
    </style>
    <body>
    <htmlpageheader name="page-header">
	    {{--  Header content {iteration varname}  --}}
    </htmlpageheader>

    <htmlpagefooter name="page-footer">
	    Page No: {PAGENO} of {nb}, <small>Roll Out Date: {DATE d/m/Y}</small>
    </htmlpagefooter>

        
        <h2 align="center">{{ $school->name }}</h2>
        <h3 align="center">Marks Entry Verificaton Sheet for Session: {{ $session->name }}</h3>
        <h5 align="center">For Class: {{ $clssec->clss->name }}, Section: {{ $clssec->section->name }}</h5>
        
        @php
            $clssubs = $clssubs->sortBy(['extype_id', 'subject_order']);
        @endphp
        <table border='1' style="page-break-inside:auto; autosize:5.4;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Exam</th>
                    @php
                        $extp_count = $extpmdclsbs->unique('extype_id')->count('extype_id');
                        $extp_count = ( $extp_count % 2 ) * 2;
                        
                    @endphp                    
                    @foreach($clssubs as $clsb)
                        <th colspan="{{ $extp_count }}">{{ $clsb->subject->code }}</th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>            
                @foreach($stdcrs as $stdcr)
                    @php
                        $std_grade = [];
                    @endphp
                    <tr>               
                    <td rowspan='{{ $exams->count()+2 }}'>{{ $stdcr->id }}</td>
                    <td rowspan='{{ $exams->count()+2 }}'>
                        {{ $stdcr->studentdb->name }}<br>
                        <small>{{ $stdcr->clss->name }} - {{ $stdcr->section->name }}, Roll: {{ $stdcr->roll_no }}</small>
                        
                    </td>
                    
                    @foreach($exams as $exam)  
                        @if(!$loop->first)                  
                            <tr>
                        @endif

                        <td>{{ substr($exam->name,0,3) }}</td>
                        
                        @foreach($clssubs as $clsb)
                            @php
                                $mode_count = $extpmdclsbs->where('exam_id', $exam->id)
                                                    ->where('subject_id', $clsb->subject_id)->pluck('mode_id');
                                
                                $blade_modes = $modes->whereIn('id', $mode_count);
                                
                            @endphp
                            @foreach($blade_modes as $mode)
                                <td class='text-center' style="text-align:center;">
                                @php
                                    $etmcs_id = $extpmdclsbs->where('exam_id', $exam->id)
                                                    ->where('subject_id', $clsb->subject_id)
                                                    ->where('mode_id', $mode->id)
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
                        @endforeach
                        </tr>                        
                    @endforeach  
                
                </tr>
                <tr>                            
                    <th>Total</th>
                    @foreach($clssubs as $clsb)
                        @php
                            $extp_count = $extpmdclsbs->unique('extype_id')->count('extype_id');
                            $extp_count = ( $extp_count % 2 ) * 2;

                            $etmcs_ids = $extpmdclsbs->where('subject_id', $clsb->subject_id)
                                                    ->pluck('id');
                            $subj_total = 0;
                            
                            foreach($etmcs_ids as $etmcs_id){
                                if( isset($stdMarksArray[$stdcr->id][$etmcs_id]) ){
                                    $subj_total += $stdMarksArray[$stdcr->id][$etmcs_id] < 0 ? 0 : $stdMarksArray[$stdcr->id][$etmcs_id];
                                }                                
                            }
                            $subj_fm = $extpmdclsbs->where('subject_id', $clsb->subject_id)->sum('fm');
                            $std_grade[$clsb->subject_id] = getGrade($clsb->subject->extype_id, $subj_total, $subj_fm);

                        @endphp                    
                    
                        <th colspan="{{ $extp_count }}">{{$subj_total}}
                            @if( $extp_count > 1 )
                                (<small>{{ round(( ($subj_total/$subj_fm) * 100), 0) }}%</small>)
                            @endif
                            
                        </th>
                    @endforeach
                </tr>
                <tr>
                    <th>Grade</th>
                    @foreach($clssubs as $clsb)
                        <th colspan="{{ $extp_count }}">{{ $std_grade[$clsb->subject_id]  }}</th>
                    @endforeach

                </tr>
                @endforeach            
            </tbody>
        </table>
        
            {{--  @foreach($stdMarksArray[5] as $key => $smark)
                {{ $key }}:{{ $smark }}
            @endforeach   --}}
            {{--  {{$stdMarksArray[5][20]}}  --}}

    {{--  <a href="javascript:void(0);"
    NAME="My Window Name"  title=" My title here "
    onClick=window.open("https://google.co.in","Ratting","width=800,height=400,0,status=0,");>Click here to open the child window</a>

    <input type=button onClick=window.open("window-child.html","Ratting","width=550,
        height=170,left=150,top=200,toolbar=0,status=0,"); value="Open Window">

    <center><input type=button onClick="self.close();" value="Close this window"></center>  --}}
    </body>
</html>


