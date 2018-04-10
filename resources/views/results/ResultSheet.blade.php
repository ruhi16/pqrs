@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<a href="{{url('/clssec-ResultSheetHTML',[$clsc->id, $stcr->id])}}">Download</a>
<h1 class="text-center">{{$sch->name}}</h1>
<h4 class="text-center">{{$sch->po}} * {{$sch->ps}} * {{$sch->dist}} * {{$sch->pin}}</h4>
<h2 class="text-center">Progress Report for Session - {{$ses->name}}</h2>

<br>

<table class="table">
  <tr>
    <td><b>Name:    </B>{{$stcr->studentdb->name}}</td>
    <td><b>Class:   </B>{{$stcr->clss->name}}</td>
    <td><b>Section: </B>{{$stcr->section->name}}</td>
    <td><b>Roll No: </B>{{$stcr->roll_no}}</td>
  </tr>
</table>
<br>

<table class="table table-bordered">
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
      <table class="table table-bordered table-striped">
        <thead>
          <tr>            
            <th rowspan="2"  class="text-center">Sl</th>
            <th rowspan="2">Subject</th>
            @foreach($exms as $exm) 
              <th colspan="2"><b>{{$exm->name}},</b></th>
            @endforeach
            <th rowspan="2">Total</th>
            <th rowspan="2">Grade</th>
          </tr> 
          <tr>
            
            
            @foreach($exms as $exm) 
              <th>MO</th>
              <th>FM</th>
            @endforeach
            
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
                    <b>
                    {{ $obmrks == -99 ? 'AB' : $obmrks }}
                  </b>
                  </td>
                  <td><small>
                      {{ $etcs->where('exam_id', $exm->id)
                            ->where('extype_id', $ext->id)                                
                            ->where('subject_id', $cls->subject_id)
                            ->first()->fm or ''          
                      }}
                      </small>
                  </td>
                @endforeach
                <td>{{$subTotal}}</td>
                @php  $total = $total + $subTotal; @endphp
                <td>{{ findGrade($ext->name , $total) }}</td>
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
        <th>Total: {{ $grTotal[$ext->name] }}<br>
                    {{-- Grade: {{ findGrade($ext->name , $total) }} --}}
        </th>
      @endforeach      
    </tr>
    <tr>
        @php
            $str = '';
        @endphp
            @foreach($exts as $ext)
                @if($loop->first)
                    @php $str .=  $ext->name;   @endphp
                @else
                    @php $str .= " + ". $ext->name; @endphp
                @endif
            @endforeach
        @endphp

        <th colspan="2">Total ({{ $str }}): {{array_sum($grTotal)}}</th>
    </tr>
  </tbody>
</table>


  <div class="row">
        <div class="col-sm-8">
        <table class="table table-bordered table-sm">
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
                @if(($loop->iteration % 4) == 1 )
                  <td rowspan="4">{{$gdes->subject->name}}</td>
                @endif
                <td>{{$gdes->grade->gradeparticular->name}}</td>
                <td><small>{{$gdes->desc}}</small></td>
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        
        <div class="col-sm-4">
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
                <td>{{ $grd->enpercentage }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
        </table> 
      
        
        </div>


    </div>
        
        





<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
