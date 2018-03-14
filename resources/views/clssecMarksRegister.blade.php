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
                        <th>SL</th>
                        <th>Subject</th>
                        @php                             
                            $typeTotal = 0;
                        @endphp
                        @foreach($exms as $ex)
                          {{--  @php 
                            $ee = $extpclsbs->where('exam_id', $ex->id)->where('extype_id', $et->id)->first();                            
                          @endphp
                          <th>{{$ee->fm}}</th>  --}}
                          {{--  @foreach($extpclsbs as $extpclsb)
                            @if($extpclsb->exam_id == $ex->id && $extpclsb->extype_id == $et->id)
                                <th>{{$ex->name}}</th>
                                @php $typeTotal += $extpclsb->fm; @endphp
                            @endif
                          @endforeach  --}}
                          <th>{{ $ex->name }}</th>
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
                            {{--  @foreach($stdcr->marksentries as $record)
                                @if($stdcr->id == $record->studentcr_id 
                                    && $clsb->subject->id == $record->clssub->subject->id
                                    && $ex->id == $record->exmtypclssub->exam->id )
                                    @if($record->marks >= 0)
                                        {{ $record->marks }}
                                        @php $total = $total + $record->marks; @endphp
                                    @else
                                        AB
                                    @endif
                                @endif                            
                            @endforeach  --}}
                            ExEtSb<br>
                            {{$ex->id}}-{{$et->id}}-{{$clsb->subject_id}}
                            
                        </td>
                        @endforeach
                        <th class="text-right">{{ $total }}</th>
                        @php 
                            $allSubTotal += $total;
                        
                        @endphp
                        <td>
                        @php $grd = ($total)*100; @endphp {{--$typeTotal --}}
                        {{ Message($et->name,$grd) }}
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
