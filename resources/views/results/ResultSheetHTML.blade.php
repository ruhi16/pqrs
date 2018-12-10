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
        font-size: 14px;
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

    <style> 
    @font-face {
        font-family: "SolaimanLipi";
        font-style: normal;
        font-weight: normal;
        src: url(resources/fonts/SolaimanLipi.ttf) format('truetype');
    }
    * {
        font-family: "SolaimanLipi";
    }

	</style>
    <body>
        <center>
        <h1 class="text-center">{{$sch->name}}</h1>
        <h4 class="text-center">{{$sch->po}} * {{$sch->ps}} * {{$sch->dist}} * {{$sch->pin}}</h4>
        <h2 class="text-center">Progress Report হালো</h2>
        
        <table width="100%">
        <tr>
            <td><b>Name:    </B>{{$stcr->studentdb->name}}</td>
            <td><b>Class:   </B>{{$stcr->clss->name}}</td>
            <td><b>Section: </B>{{$stcr->section->name}}</td>
            <td><b>Roll No: </B>{{$stcr->roll_no}}</td>
        </tr>
        </table>
        
        </center>

    

    
<br>
<center>
<table class="table table-bordered">
    <thead>
        <tr>            
            @foreach($extp as $et)
                <th class="text-center text-danger">{{ $et->name }} Details</th>
            @endforeach            
        </tr>
    </thead>
    <tbody>     
            <tr>                
                @foreach($extp as $et)  {{-- for each exam category summative/formative --}}
                
                <td> 
                  <table class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        
                        <th>Subject</th>
                        @php                             
                            $typeTotal = 0;
                        @endphp
                        @foreach($exms as $ex)
                            @php 
                                $mdInTerm = $extpclsbs->where('exam_id', $ex->id)
                                    ->where('extype_id', $et->id)
                                    ->groupBy('mode_id')
                                    ->count();
                            @endphp
                            <th colspan="{{ $mdInTerm }}" class="text-center">{{$mdInTerm}}={{$ex->name}}</th>
                        @endforeach
                        <th>Total/{{$typeTotal}}</th>
                        <th>Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                            $allSubjTotal = 0;
                            $flag = TRUE;
                        @endphp
                        @foreach($clsbs as $clsb)
                            @php 
                                $subjTotal = 0;
                                $combSubjectCount = 0;
                            @endphp
                            @if($et->id == $clsb->subject->extype_id )
                            <tr>
                                
                                <td>{{ $clsb->subject->name }}</td>
                                @foreach($exms as $ex)
                                    @php 
                                        $mdInTermObj = $extpclsbs->where('exam_id', $ex->id)
                                            ->where('extype_id', $et->id)
                                            ->groupBy('mode_id');
                                    @endphp
                                    @foreach($mdInTermObj as $modObj)                                    
                                        <td class="text-right" align="center"> 
                                        @foreach($stcr->marksentries as $record)
                                            @if( $modObj->first()->mode_id == $record->exmtypmodclssub->mode_id )                                            
                                            
                                                @php
                                                    $etmcs = $extpclsbs->where('exam_id', $ex->id)
                                                        ->where('extype_id', $et->id)
                                                        ->where('subject_id', $clsb->subject_id)
                                                        ->where('mode_id', $record->exmtypmodclssub->mode_id )
                                                        ->first();
                                                @endphp

                                                @if( $etmcs['id'] == $record->exmtypmodclssub_id )                                                    
                                                    {{ $record->marks == -99 ? 'AB' : $record->marks }}
                                                    @php 
                                                        $subjTotal += ( $record->marks == -99 ? 0 : $record->marks );
                                                    @endphp
                                                @endif
                                            
                                            @endif
                                        @endforeach
                                        </td>                                    
                                    @endforeach
                                @endforeach
                                <td class="text-right text-danger" align="center"><b>{{ $subjTotal }}</b></td>

                                @php 
                                    $allSubjTotal += $subjTotal;
                                    $combSubjectCount++;
                                    $etsubjtotal = $extpclsbs->where('extype_id', $et->id)->where('subject_id', $clsb->subject_id)->sum('fm');
                                @endphp
                                @if( $clsb->combination_no == 0)
                                    <td class="text-center text-danger" align="center">
                                        {{ getGrade($et->id, $subjTotal, $etsubjtotal ) }}
                                    </td>
                                @else
                                    @if($flag == true)
                                        @php
                                            $flag = false;
                                            $combSubCount = $clsbs->where('combination_no', $clsb->combination_no)->count();
                                            $subIds = $clsbs->where('combination_no', $clsb->combination_no)->pluck('subject_id');
                                            
                                            $etcsIds = $extpclsbs->whereIn('subject_id', $subIds->toArray())
                                                ->where('extype_id',$et->id)->pluck('id');
                                            $etcsFMs = $extpclsbs->whereIn('subject_id', $subIds->toArray())
                                                ->where('extype_id',$et->id)->sum('fm');

                                            $fullMarks = $mrks->whereIn('exmtypclssub_id', $etcsIds->toArray())->pluck('marks');
                                            $fullObtMarks = 0;
                                            foreach($fullMarks as $mark){
                                                $fullObtMarks += ( $mark == -99 ? 0 : $mark );
                                            }
                                        @endphp
                                        
                                        <td class="text-center" rowspan="{{ $combSubCount }}">                                    
                                            {{ $fullObtMarks }}
                                            <br>{{ getGrade($et->id, $fullObtMarks, $etcsFMs) }}                                    
                                        </td>
                                    @else
                                        @if($combSubjectCount == $combSubCount)
                                            @php $flag = true; @endphp
                                        @endif
                                    @endif

                                @endif
                            </tr>
                            @endif
                            
                        @endforeach
                            <tr>
                                <td class="text-left text-success bg-primary">
                                    <b>Total: {{ $allSubjTotal }}</b>                                    
                                </td>
                            </tr>
                    </tbody>
                  </table>  
                {{--  <b>Total Marks: {{$allSubTotal}}</b>  --}}
                </td>                
                @endforeach
            {{--  <td><a href="{{url('/clssec-ResultSheet',[$clssec->id, $stdcr])}}" class="btn btn-success">Result</a></td>  --}}
            </tr>
    
    </tbody>
</table>
</center>

<br>

{{--  <table>
    <tr>
        <th>Obtained Marks</th>
        <th>Full Marks</th>
        <th>Percentage</th>
        <th>Remarks</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>xx</td>
    </tr>
</table>  --}}

<br>

{{--  <table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <th>Particulars</th>
            @foreach($exms as $exm)
                <th>{{$exm->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Attendance of Students</td>
            @foreach($exms as $exm)
                <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Signature of Class Teacer</td>
            @foreach($exms as $exm)
                <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Signature of HM/TIC</td>
            @foreach($exms as $exm)
                <td></td>
            @endforeach
        </tr>
        <tr>
            <td>Signature of Gurdian</td>
            @foreach($exms as $exm)
                <td></td>
            @endforeach
        </tr>
    </tbody>
</table>  --}}
{{--  <div class="page-break"></div>  --}}
<br>
{{--  <table>
    <tbody>
        <tr><td>
            
                <table>
                @foreach($grddes as $gdes)
                    
                    @if( $loop->iteration % 4 == 1 )    
                        <tr>
                            <td colspan="2"><center><b>{{$gdes->subject->name}}</b></center></td></tr><tr>                        
                            <td>{{$gdes->grade->gradeparticular->name}}</td>
                            <td><small>{{$gdes->desc}}</small></td>    
                        </tr>
                    @else
                        <tr>                        
                            <td><small>{{$gdes->grade->gradeparticular->name}}</small></td>
                            <td><small>{{$gdes->desc}}</small></td>
                        </tr>
                    @endif
                    
                @endforeach
                </table>
                
            
            </td>
            <td>
            
            
            </td>
        </tr>  
    </tbody>
</table>  --}}
 
           
        {{--  <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Exam Type</th>
                    <th>Grade </th>
                    <th>From %</th>
                    <th>To %</th>
                </tr>
            </thead>
            <tbody>
            @foreach($exts as $ext)
                @foreach($ext->grades as $grd)
                <tr>
                <td>{{ $ext->name }}</td>
                <td>{{ $grd->gradeparticular->name }}</td>
                <td>{{ $grd->stpercentage }}</td>
                <td>{{ $grd->stpercentage }}</td>
                </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>   --}}
        <img src="{{ url('rubindicator/rubricindicator2.png') }}">
    </body>
</html>