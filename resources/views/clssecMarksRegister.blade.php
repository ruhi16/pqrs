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
                            
                            @if($extpclsbs->where('exam_id', $ex->id)
                                          ->where('extype_id', $et->id)
                                          ->where('subject_id', $clsb->subject_id)
                                          ->first()->id == $record->exmtypclssub_id)
                            
                                {{ $record->marks!= -99 ?: 'AB' }}
                                @php 
                                    $total = $total +  ($record->marks!= -99 ?: 0 );
                                @endphp
                            @endif
                            
                        @endforeach
                        
                      </td>
                      @endforeach
                      <th class="text-right">{{ $total }}</th>
                      @php 
                        $allSubTotal += $total;
                        
                      @endphp
                      <td>
                        @php $grd = ($total)*100; @endphp {{-- /$typeTotal --}}
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