@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
    
@endsection

@section('content')
<h1>Class: <b>{{$cls}}</b> Section: <b>{{$sec}}</b> , Marks Register...</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            @foreach($extp as $et)
                <th class="text-center text-danger">{{ $et->name }} Details</th>
            @endforeach
            <th>Result Sheet</th>
        </tr>
    </thead>
    <tbody>        
        @foreach($stdcrs as $stdcr) {{-- for each students --}}
            <tr>
                <td>
                  Name: {{ $stdcr->studentdb->name }}<br>
                  Class: {{ $cls }}<br>
                  Section: {{ $sec }}<br>
                  Roll No: {{ $stdcr->roll_no }}
                  
                </td>
                @foreach($extp as $et)  {{-- for each exam category summative/formative --}}
                
                @php $totalDs = 0; @endphp
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
                            <th colspan="{{ $mdInTerm }}" class="text-center">{{$ex->name}}</th>                         
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
                                        <td class="text-right"> 
                                        @foreach($stdcr->marksentries as $record)
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
                                <td class="text-right text-danger"><b>{{ $subjTotal }}</b></td>

                                @php 
                                    $allSubjTotal += $subjTotal;
                                    $combSubjectCount++;
                                @endphp

                                @if( $clsb->combination_no == 0)
                                    <td class="text-center text-danger">
                                        @php

                                            $grd = getGrade($et->id, $subjTotal, 80 );
                                            if($grd == 'D'){
                                                $totalDs++;
                                            }
                                        @endphp                                    
                                        <br> {{ $grd }}
                                        {{--  {{ getGrade($et->id, $subjTotal, 80 ) }}  --}}
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

                                            $fullMarks = $mrks->where('studentcr_id', $stdcr->id)
                                                ->whereIn('exmtypmodclssub_id', $etcsIds->toArray())->pluck('marks');
                                            $fullObtMarks = 0;
                                            foreach($fullMarks as $mark){
                                                $fullObtMarks += ( $mark == -99 ? 0 : $mark );
                                            }
                                        @endphp
                                        
                                        <td class="text-center" rowspan="{{ $combSubCount }}">                                    
                                            {{ $fullObtMarks }}
                                            
                                            @php 
                                                $grd = getGrade($et->id, $fullObtMarks, $etcsFMs);
                                                if($grd == 'D'){
                                                    $totalDs++;
                                                }
                                            @endphp                                    
                                            <br> ({{ $grd }})
                                        </td>
                                    @else
                                        @if($combSubjectCount == $combSubCount)
                                            @php $flag = true; @endphp
                                        @endif
                                    @endif

                                @endif


                                {{--  <td class="text-center text-danger">{{ getGrade($et->id, $subjTotal, 80 ) }}</td>  --}}
                                
                            </tr>
                            @endif
                            
                        @endforeach
                            <tr>
                                <td class="text-left text-success bg-primary">
                                    <b>Total: {{ $allSubjTotal }}</b>  total Obt Ds{{ $totalDs }}                                  
                                </td>
                            </tr>




                        
                        
                    </tbody>
                  </table>  
                {{--  <b>Total Marks: {{$allSubTotal}}</b>  --}}
                </td>                
                @endforeach
            <td><a href="{{url('/clssec-ResultSheet',[$clssec->id, $stdcr])}}" class="btn btn-success">Result</a></td>
            </tr>
            <tr>
                
                
                <td>xxx</td>
            </tr>
        @endforeach
    </tbody>
</table>




<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection