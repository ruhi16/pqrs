@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Wise Promotional Rules Entry Point ...</h1>

<h3>Class: {{ $clss->name }}</h3>
<h3>Class wise Compact Subject Details</h3>

{!! Form::open(['url'=>'/classPromotionalRulesEntry-Submit','method'=>'post', 'class'=>'form-horizontal']) !!}
@php
  $extpTSubjArr = [];
@endphp
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Class</th>
      @foreach($extps as $extp)
          <th class="text-center">{{ $extp->name }} - Total Subjects</th>          
          <th class="text-center">Full Marks</th>
      @endforeach
      <th class="text-center">Total Subjects</th>
    </tr>
  </thead>
  <tbody>                 
          @php
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
                    @php
                        $extp_id = $v->first()->extype_id;
                        $extp_name = $extps->where('id', $extp_id)->first()->name;
                        $extpTSubjArr[$extp_id] = $v->where('combination_no','=',0)->count('extype_id') +
                                      $v->where('combination_no','>',0)->groupBy('combination_no')->count('extype_id') ;
                    @endphp
                    {{
                      $extpTSubjArr[$extp_id]
                    }}
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
                          $extp_fm
                        }}
                        <input type='hidden' name='{{ $extp_name }}sfm' value='{{ $extp_fm }}'>
                  </td>
              @endforeach
      
              @if( $count < count($extps) )
                @for( $i = $count; $i < count($extps); $i++ )
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                @endfor
              @endif
              <td class="text-center"></td>
            </tr>
          @endif
          @endforeach
          
    </tr>    
  </tbody>
  <thead>
    <tr>
      <th><input type='hidden' name='clss_id' value='{{ $clss->id }}'></th>
      <th></th>
      @foreach($extps as $extp)
          <th class="text-center">{{ $extp->name }} - No(s) of Ds to Promote</th>          
          <th class="text-center">
            <select class="form-control" name="{{$extp->name}}Ds">
                @for($i = 0; $i <= $extpTSubjArr[$extp->id]; $i++)
                    <option>{{ $i }}</option>
                @endfor
          </th>
      @endforeach
      <th class="text-center">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
      </th>
    
    </tr>
    
  </thead>
</table>

{!! Form::close() !!}

<a href="#" class='btn btn-success btn-lg'>Finalize Details !!!</a>


<br>

<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
