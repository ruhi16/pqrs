@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
    
@endsection

@section('content')
<h1>Class-Section wise Marks Register...</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            @foreach($extp as $et)
                <th>{{ $et->name }} DETAILS</th>
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
                  Section: {{ $sec }}
                  
                </td>
                @foreach($extp as $et)  {{-- for each exam category summative/formative --}}
                
                <td> 
                  <table class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Subject</th>
                        @php                             
                            $typeTotal = 0;
                        @endphp
                        @foreach($exms as $ex)                          
                            <th>{{$ex->name}}</th>                         
                        @endforeach
                        <th>Total/{{$typeTotal}}</th>
                        <th>Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php $allSubTotal = 0; @endphp
                    @foreach($clsbs as $clsb)   {{-- for each subject --}}
                    @if($et->id == $clsb->subject->extype->id)
                      <tr>
                      <td>{{$clsb->subject->id}}</td>
                      <td>{{$clsb->subject->name}}</td>
                        @php $total = 0; @endphp
                        @foreach($exms as $ex)
                        
                        <td class="text-right">
                            @foreach($stdcr->marksentries as $record)                            
                                @foreach($mode as $mod)
                                @php
                                    $etmcs = $extpclsbs->where('exam_id', $ex->id)
                                            ->where('extype_id', $et->id)
                                            ->where('subject_id', $clsb->subject_id)
                                            ->where('mode_id', $mod->id)
                                            ->first();

                                @endphp
                                
                                
                                
                                @if( $etmcs['id'] == $record->exmtypmodclssub_id)
                                    {{ $record->marks == -99 ? 'AB' : $record->marks }}
                                    
                                    @php 
                                        $total = $total +  ($record->marks == -99 ? 0 : $record->marks);
                                    @endphp
                                @endif

                                @endforeach    
                            @endforeach
                            </td>
                            
                      @endforeach
                      <th class="text-right">{{ $total }}</th>
                      @php 
                        $allSubTotal += $total;
                        
                      @endphp
                      <td>
                        @php $grd = ($total)*100; 
                             $subject_fm = $etclsbfm->where('clss_id', $clsb->clss_id)
                                ->where('extype_id', $et->id)
                                ->where('subject_id', $clsb->subject_id)->first()->subject_fm;
                            
                        @endphp
                        {{ getGrade($et->id, $total, $subject_fm ) }}
                        
                      </td>
                      </tr>
                      @endif
                      {{--  @php $grtotal = $grdTotal = 0; @endphp  --}}
                      @endforeach
                      
                    </tbody>
                  </table>  
                <b>Total Marks: {{$allSubTotal}}</b>
                </td>                
                @endforeach
            <td><a href="{{url('/clssec-ResultSheet',[$clssec->id,$stdcr])}}" class="btn btn-success">Result</a></td>
            </tr>
            {{--  <tr>
                
                <td>{{$grtotal}}</td>
                <td>xxx</td>
            </tr>  --}}
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