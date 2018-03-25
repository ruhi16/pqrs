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
        <h1 class="text-center">{{$sch->name}}</h1>
        <h4 class="text-center">{{$sch->po}} * {{$sch->ps}} * {{$sch->dist}} * {{$sch->pin}}</h4>
        <h2 class="text-center">Progress Report</h2>
        </center>
    

    <table style="width:100%">
    <tr>
        <td><b>Name: </B>{{$stcr->studentdb->name}}</td>
        <td><b>Class: </B>{{$stcr->clss->name}}</td>
        <td><b>Section: </B>{{$stcr->section->name}}</td>
        <td><b>Roll No: </B>{{$stcr->roll_no}}</td>
    </tr>
    </table>
    <br>
        
    <table>
        <thead>
            <tr>
            @foreach($exts as $ext)
                <th>{{$ext->name}}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
        
            @php 
            $forGTotal = 0;
            $sumGTotal = 0;
            $grTotal = [];
            @endphp
            <tr>
            @foreach($exts as $ext)
            @php  $total = 0; @endphp
            <td>
            <table>
                <thead>
                <tr>            
                    <th><small>Sl</small></th>
                    <th><small>Subject</small></th>
                    @foreach($exms as $exm)
                        <th><small>{{$exm->name}}</small></th>
                    @endforeach
                    <th><small>Total</small></th>
                    <th><small>Grade</small></th>
                </tr>          
                </thead>
                <tbody>
                @foreach($clsb as $cls)
                    @if($cls->subject->extype_id == $ext->id)
                    <tr>
                        <td>{{$cls->id}}</td>
                        <td><small>{{$cls->subject->name}}</small></td>                
                        @php $subTotal = 0; @endphp
                        @foreach($exms as $exm)
                        <td>                  
                            @php                    
                            $etcs_id = $etcs->where('exam_id',$exm->id)
                                    ->where('subject_id',$cls->subject_id)
                                    ->where('clss_id',$cls->clss_id)->first()->id;
                            $obmrks  = $mrks->where('exmtypclssub_id', $etcs_id)->pluck('marks')->first();
                            $subTotal = $subTotal + ($obmrks == -99 ? 0 : $obmrks);
                            @endphp
                            
                        <small>{{ $obmrks == -99 ? 'AB' : $obmrks }}</small>

                        </td>
                        {{--  <td>xxx</td>  --}}
                        @endforeach
                        <td>{{$subTotal}}</td>
                        @php  $total = $total + $subTotal; @endphp
                        <td></td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>   
                    
            @php  $grTotal[$ext->name] = $total; @endphp
            
            </td>
            @endforeach
            </tr>
            <tr>
            @foreach($exts as $ext)
                <th>Total: {{ $grTotal[$ext->name] }}</th>
            @endforeach      
            </tr>
        </tbody>
    </table>
<br>

<table>
    <tr>
        <th>Obtained Marks</th>
        <th>Full Marks</th>
        <th>Percentage</th>
        <th>Remarks</th>
    </tr>
    <tr>
        <td>800</td>
        <td>357</td>
        <td>125</td>
        <td>Not Very Good</td>
    </tr>
</table>

<br>

<table class="table table-bordered">
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
</table>
<div class="page-break"></div>
<br>
<table>
    <tbody>
        <tr><td>
            {{--  <table class="table table-bordered table-sm">                
                <tbody>  --}}
                <table>
                @foreach($grddes as $gdes)
                    
                    @if( $loop->iteration % 4 == 1 )    //no of grade in formative is 4
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
                {{--  </tbody>
            </table>  --}}
            
            </td>
            <td>
            
            
            </td>
        </tr>  
    </tbody>
</table>
 

        
    <br>            
            <table class="table table-bordered">
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
            </table> 

    </body>
</html>