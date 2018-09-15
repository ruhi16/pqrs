@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h2>Class:    {{ $clssec->clss->name }} , 
    Section:  {{ $clssec->section->name }}, 
    Class Teacher: , Session: ,    Compact Mark Register</h2>


{{--  <h3>Class wise Total Subject Details</h3>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>Sl</th>
      <th>Type</th>
      <th class="text-center">Nature</th>
      <th>Name</th>      
      @foreach($exams as $exam)
        <th class="text-center">{{ $exam->name }}</th>
      @endforeach
      <th class="text-center">Full Marks</th>
    </tr>
  </thead>
  <tbody>         
      @foreach($clssubs as $clssub)
        <tr>
          <td>{{ $clssub->id }}</td>
          <td>{{ $clssub->subject->extype->name }}</td>
          <td class="text-center">{{ $clssub->combination_no }}</td>
          <td>{{ $clssub->subject->name }}</td>
          
          @foreach($exams as $exam)            
            <td class="text-center">
              @foreach($modes as $mode)
                
                @if( $extpmdclsbs->where('extype_id', $clssub->subject->extype_id)
                      ->where('subject_id', $clssub->subject_id)
                      ->where('exam_id', $exam->id)
                      ->where('mode_id', $mode->id)
                      ->first() != NULL )
                
                    {{ $mode->name }}: <b>{{ $extpmdclsbs->where('extype_id', $clssub->subject->extype_id)
                      ->where('subject_id', $clssub->subject_id)
                      ->where('exam_id', $exam->id)
                      ->where('mode_id', $mode->id)
                      ->pluck('fm')->first() }}</b>
                @endif
              @endforeach
            </td>
          @endforeach
          <td class="text-center"><b>
            {{ $extpmdclsbs->where('extype_id', $clssub->subject->extype_id)
                    ->where('subject_id', $clssub->subject_id)                    
                    ->sum('fm') }}</b>
          </td>
        </tr>
      @endforeach      
</tbody>
</table>  --}}



<h3>Class wise Compact Subject Details</h3>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>Sl</th>
      <th>Class</th>
      @foreach($extps as $extp)
          <th>{{ $extp->name }} - Total Subjects Count</th>          
          <th>Full Marks</th>
      @endforeach
      <th>Total Subjects</th>
    </tr>
  </thead>
  <tbody>                 
          @php
            $clssubexts = $clssubexts->groupBy('clss_id');
          @endphp          
          @foreach($clssubexts as $val)
          @if( $val->unique('clss_id')->first()->clss_id == $clssubs->first()->clss_id )
            <tr>
              <td>1/{{$clssubs->first()->clss_id}}={{$val->unique('clss_id')->first()->clss_id}}</td>
              <td>Class_id: {{ $val->unique('clss_id')->first()->clss_id }}</td>
              @php $count = 0; @endphp
              @foreach($val->groupBy('extype_id') as $v)
                  @php ++$count; @endphp
                  <td>
                    {{  {{-- $v  --}}
                        $v->where('combination_no','=',0)->count('extype_id') +
                        $v->where('combination_no','>',0)->groupBy('combination_no')->count('extype_id') 
                    }}                  
                  </td>
                  <td>
                    fm: {{ 
                          $extpmdclsbs->where('extype_id', $v->unique('extype_id')->first()->extype_id )
                            ->where('clss_id', $val->unique('clss_id')->first()->clss_id )
                            ->whereIn('subject_id', $clssubs->where('combination_no','>=',0)->pluck('subject_id') )
                            ->sum('fm')                             
                        }}
                  </td>
              @endforeach
      
              @if( $count < count($extps) )
                @for( $i = $count; $i < count($extps); $i++ )
                  <td></td>
                  <td></td>
                @endfor
              @endif
              <td></td>
            </tr>
          @endif
          @endforeach
          
    </tr>    
  </tbody>
</table>

        
  

<h3>Class wise Compact Subject Details</h3>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>Sl</th>
      <th>Class-Sec-Roll</th>
      <th>Students Name</th>
      @foreach($extps as $extp)
          {{--  <th>{{ $extp->name }} - Subjects</th>      --}}
          <th>{{ $extp->name }} Total Obtain Marks</th>      
          <th>D acured</th>
      @endforeach      
    </tr>
  </thead>
  <tbody> 
    @foreach($stdcrs as $stdcr)
      <tr>
          <td>{{ $stdcr->id }}</td>
          <td>{{ $stdcr->clss->name }}-{{ $stdcr->section->name }}-{{ $stdcr->roll_no }}</td>
          <td>{{ $stdcr->studentdb->name }}</td>
          @foreach($extps as $extp)
              @php
                  $test = $stdmarks->where('studentcr_id', $stdcr->id) 
                    ->whereIn('exmtypmodclssub_id', $etmcss->where('extype_id', $extp->id)->pluck('id') )
                    //->groupBy('clssub_id')
                    ;                  
                  $countD = 0;
              @endphp
              <td>
                  {{--  for Regular Subject (combination_no = 0)  --}}
                  @foreach($test->groupBy('clssub_id') as $t)
                      @if($t->first()->combination_no == 0)
                            @php
                              $per = ($t->where('marks', '>=', 0)->sum('marks')*100)/
                                                  ($etmcss->where('subject_id', $t->first()->clssub->subject_id)->sum('fm') ) ;

                              $grd = $grades->where('extype_id', '=', $extp->id)
                                            ->where('stpercentage', '<=', $per)
                                            ->where('enpercentage', '>=', $per)
                                            ->first()->gradeparticular->name;                              
                              if( strtoupper($grd) == 'D'){
                                  $countD++;
                              }
                            @endphp                      
                              {{ $t->first()->clssub->subject->code }}:{{ $t->where('marks', '>=', 0)->sum('marks')  }}/fm:                               
                                          {{ $etmcss->where('subject_id', $t->first()->clssub->subject_id)->sum('fm') }} 
                                          ({{$per}}%-{{$grd}}) +                       
                      @endif
                  @endforeach  

                  {{--  for Combined Subject (combination_no > 0)  --}}                  
                  @foreach($test->where('combination_no', '>', 0)->groupBy('combination_no') as $t)
                    {{ $clssubs->whereIn('subject_id', $t->unique('clssub_id')->pluck('subject_id') ) }}:
                    {{ $t->where('marks', '>=', 0)->sum('marks') }}/fm:
                    {{ $etmcss->whereIn('subject_id', $t->unique('clssub_id')->pluck('subject_id') )->sum('fm') }}
                    @php
                        $perComb = ($t->where('marks', '>=', 0)->sum('marks') * 100)/
                                        $etmcss->whereIn('subject_id', $t->unique('clssub_id')->pluck('subject_id') )->sum('fm');
                        $grdComb = $grades->where('extype_id', '=', $extp->id)
                                            ->where('stpercentage', '<=', $perComb)
                                            ->where('enpercentage', '>=', $perComb)
                                            ->first()->gradeparticular->name;                              
                        
                        if( strtoupper($grdComb) == 'D'){
                            $countD++;
                        }
                    @endphp
                    ({{ $perComb }}% - {{ $grdComb }})
                  @endforeach

                  {{--  for Additional Subject (combination_no < 0)  --}}

                  @foreach($test->where('combination_no', '<', 0)->groupBy('combination_no') as $t)
                    {{ $t->where('marks', '>=', 0)->sum('marks') }}
                  @endforeach
                  




                   = 
                  {{ $test->where('marks', '>=', 0)->sum('marks') }}/
                        {{ $etmcss->where('extype_id', $extp->id)->sum('fm') -   
                              $etmcss->where('extype_id', $extp->id)
                                    ->whereIn('subject_id', $clssubs->where('combination_no', '<', 0)->pluck('subject_id') )
                                    ->sum('fm')
                              }}
              </td>
              <td>{{ $countD }}</td>
          @endforeach 
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
