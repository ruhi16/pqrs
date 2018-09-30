@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Wise Promotional Rules Entry Point ...</h1>

<h3>Class: {{ $clss->name }}</h3>

{!! Form::open(['url'=>'/classPromotionalRulesEntry-Submit','method'=>'post', 'class'=>'form-horizontal']) !!}

@php  $extpTSubjArr = [];   @endphp

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Class</th>
            <th class="text-center">Exam Type - Total Subjects</th>          
            <th class="text-center">Exam Type - Full Marks</th>
            <th class="text-center">Allowed Ds</th>
            <th class="text-center">Exam Type - Allowable Ds to Promote</th>
            <th class="text-center">No(s) of Ds Selection</th>
            <input type='hidden' name='clss_id' value='{{ $clss->id }}'>
        </tr>
    </thead>
    <tbody>        
        @foreach($extps as $extp) 
            <tr>
                <td>{{ $clss->id }}</td>
                <td>{{ $clss->name }}</td>
                           
                <td>
                    {{ $extp->name }}- Total Subjects: 
                    @php
                    $regSubj = $clssubexts->where('extype_id', $extp->id)
                                  ->where('combination_no','=', 0)                                  
                                  ->count();

                    $comSubj = $clssubexts->where('extype_id', $extp->id)
                                  ->where('combination_no','>', 0)
                                  ->groupBy('combination_no')
                                  ->count();

                    $adlSubj = $clssubexts->where('extype_id', $extp->id)
                                  ->where('combination_no','<', 0)
                                  ->groupBy('combination_no')
                                  ->count();
                    $subjTotalNos = $regSubj + $comSubj;
                    @endphp

                    {{ $subjTotalNos }}                    
                </td>

                <td>
                    {{ $extp->name }}- Full Marks: 
                    @php
                        $regSubjTotal = $extpmdclsbs->where('extype_id', $extp->id)->sum('fm');
                        $adlSubjTotal = $extpmdclsbs->where('extype_id', $extp->id)
                                            ->where('combination_no','>', 0)->sum('fm');
                        $subjTotalMarks = $regSubjTotal - $adlSubjTotal;
                    @endphp
                    {{
                        $subjTotalMarks
                    }}
                                    
                </td>
                <td class='text-center'>{{ $clspromdetails->where('extype_id', $extp->id)->first()->allowableds or 'NA' }}</td>
                <td class='text-right'>Allowable Ds for Promotion</td>
                <td>
                    <input type='hidden' name='{{ $extp->name }}sno' value='{{ $subjTotalNos }}'>
                    <input type='hidden' name='{{ $extp->name }}sfm' value='{{ $subjTotalMarks }}'>

                    <select class="form-control" name="{{$extp->name}}Ds">
                        @for($i = 0; $i <= $subjTotalNos; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                </td>            
            </tr>
        @endforeach
        
    </tbody>
</table>

<button type="submit" class="btn btn-primary">Save changes</button>
<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>


{!! Form::close() !!}


{{--  <a href="#" class='btn btn-success btn-lg'>Finalize Details !!!</a>  --}}
<br>








<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection




{{--  @foreach($extps as $extp)    --}}
        {{--  @php
            $clssubexts = $clssubexts->groupBy('clss_id');
        @endphp                
        @foreach($clssubexts as $val)          
            @if( $val->unique('clss_id')->first()->clss_id == $clssubs->first()->clss_id )
                <tr>

                    <td class="text-center">{{ $val->unique('clss_id')->first()->clss->id }}</td>
                    <td class="text-center">{{ $val->unique('clss_id')->first()->clss->name }}</td>
                    @php $count = 0; @endphp
                    @foreach($val->groupBy('extype_id') as $v)
                        @php ++$count; @endphp
                        <td class="text-center">
                            {{--  {{  
                                $v->where('combination_no','=',0)->count('extype_id') +
                                $v->where('combination_no','>',0)->groupBy('combination_no')->count('extype_id') 
                            }}  --}}
                            {{--@php
                                $extp_id = $v->first()->extype_id;
                                $extp_name = $extps->where('id', $extp_id)->first()->name;
                                $extpTSubjArr[$extp_id] = $v->where('combination_no','=',0)->count('extype_id') +
                                            $v->where('combination_no','>',0)->groupBy('combination_no')->count('extype_id') ;
                            @endphp
                            {{ $v->first()->extype_id }}
                            {{ $extpTSubjArr[$extp_id] }}- extype_id: {{$extp_id}}-{{ $extp_name }}
                            
                            <input type='hidden' name='{{ $extp_name }}sno' value='{{ $extpTSubjArr[$extp_id] }}'>
                        </td>
                        <td class="text-center">
                                @php 
                                $extp_fm = $extpmdclsbs->where('extype_id', $v->unique('extype_id')->first()->extype_id )
                                    ->where('clss_id', $val->unique('clss_id')->first()->clss_id )
                                    ->whereIn('subject_id', $clssubs->where('combination_no','>=',0)->pluck('subject_id') )
                                    ->sum('fm');
                                @endphp
                                {{
                                $extp_fm or 'NA'
                                }}
                                <input type='hidden' name='{{ $extp_name }}sfm' value='{{ $extp_fm }}'>
                        </td>
                    @endforeach
            




                        @if( $count < count($extps) )
                            @for( $i = $count; $i < count($extps); $i++ )
                                <td class="text-center">xx</td>
                                <td class="text-center">zz</td>
                            @endfor
                        @endif

                        <td class="text-center">
                            @foreach($extps as $extp)
                                {{ $extp->name }} - {{ $clspromdetails->where('extype_id', $extp->id)->first()->allowableds or 'NA'}}, 
                            @endforeach
                        </td>
                    </tr>
            @endif
        @endforeach  --}}
          {{--  @endforeach  --}}
     
    {{--  </tbody>
    <tfoot>
    <tr>
        <th><input type='hidden' name='clss_id' value='{{ $clss->id }}'></th>
        <th></th>
        @foreach($extps as $extp)
            <th class="text-center">{{ $extp->name }} - No(s) of Ds to Promote</th>          
            <th class="text-center">
                @if( $extpTSubjArr == NULL )
                <select class="form-control" name="{{$extp->name}}Ds">
                    @for($i = 0; $i <= $extpTSubjArr[$extp->id]; $i++)
                        <option>{{ $i }}</option>
                    @endfor
                @endif
            </th>
        @endforeach
        <th class="text-center">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        </th>
    
    </tr>
    
    </tfoot>  --}}
    