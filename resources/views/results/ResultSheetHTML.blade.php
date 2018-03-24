<!DOCTYPE html>
<html>
    <head>
        <title>Html Result Format</title>
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
    <body>
        <center>
        <h1 class="text-center">{{$sch->name}}</h1>
        <h4 class="text-center">{{$sch->po}} * {{$sch->ps}} * {{$sch->dist}} * {{$sch->pin}}</h4>
        <h2 class="text-center">Progress Report</h2>
        </center>
        <br>

        <table style="width:100%">
        <tr>
            <td><b>Name: </B>{{$stcr->studentdb->name}}</td>
            <td><b>Class: </B>{{$stcr->clss->name}}</td>
            <td><b>Section: </B>{{$stcr->section->name}}</td>
            <td><b>Roll No: </B>{{$stcr->roll_no}}</td>
        </tr>
        </table>
        <br>
        
        <table >
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
            <table  >
                <thead>
                <tr>            
                    <th>Sl</th>
                    <th>Subject</th>
                    @foreach($exms as $exm)
                    <th>{{$exm->name}}</th>
                    @endforeach
                    <th>Total</th>
                    <th>Grade</th>
                </tr>          
                </thead>
                <tbody>
                @foreach($clsb as $cls)
                    @if($cls->subject->extype_id == $ext->id)
                    <tr>
                        <td>{{$cls->id}}</td>
                        <td>{{$cls->subject->name}}</td>                
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
                            
                        {{ $obmrks == -99 ? 'AB' : $obmrks }}

                        </td>
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

        <table width="100%">
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
<br><br>
        <table width="100%">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @foreach($grddes as $gdes)
                <tr>
                <td>{{$gdes->subject->name}}</td>
                <td>{{$gdes->grade->gradeparticular->name}}</td>
                <td>{{$gdes->desc}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
<br>

        
        <table width="100%">
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