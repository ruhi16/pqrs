@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class-Section wise Marks Register...</h1>

{{--  @foreach($clsbs as $clsb)
    {{ $clsb }}<br>
@endforeach  --}}

{{--  @foreach($stdcrs as $stdcr)
    Student Name: {{ $stdcr->studentdb->name }}<br>
    @foreach($stdcr->marksentries as $record)
        Exam Type Class : {{ $record->exmtypclssub_id }}
        Class   : {{ $record->exmtypclssub->clss->name }}
        Section : {{ $record->clssec->section->name }}
        Exam    : {{ $record->exmtypclssub->exam->name }}
        Type    : {{ $record->exmtypclssub->extype->name }}

        Subject : {{ $record->clssub->subject->name }}
        Marks   : {{ $record->marks }}
        <br>
    @endforeach
@endforeach  --}}

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
                        @foreach($exms as $ex)
                          <th>{{$ex->name}}</th>
                        @endforeach
                        <th>Total</th>
                        <th>Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($clsbs as $clsb)   {{-- for each subject --}}
                    @if($et->id == $clsb->subject->extype->id)
                      <tr>
                      <td>{{$clsb->subject->id}}</td>
                      <td>{{$clsb->subject->name}}</td>
                      @foreach($exms as $ex)
                      <td class="text-right">
                        @foreach($stdcr->marksentries as $record)
                          @if($stdcr->id == $record->studentcr_id 
                                  && $clsb->subject->id == $record->clssub->subject->id
                                  && $ex->id == $record->exmtypclssub->exam->id )
                            {{$record->marks}}
                          @endif
                        @endforeach
                      </td>
                      @endforeach
                      <td></td>
                      <td></td>
                      </tr>
                      @endif
                      @endforeach
                      
                    </tbody>
                  </table>                    
                </td>
                @endforeach                
            </tr>
        @endforeach
    </tbody>
</table>



{{--  @foreach($stdcrs as $stdcr)
        <tr>
            <td>{{ $stdcr->studentdb->name }}</td>
            <td>
                @foreach($clsbs as $clsb)                    
                    <table class="table table-bordered">
                        <tr>
                            <td>{{ $clsb->subject->name }}</td>                           
                        </tr>           
                    </table>
                @endforeach
            </td>
            @foreach($exms as $ex)
                <td>
                @foreach($clsbs as $clsb)
                <table class="table table-bordered">
                    <tr>
                        <td>
                            xx
                        </td>
                    </tr>
                </table>
                @endforeach
                </td>
            @endforeach
        </tr>
        @endforeach  --}}



<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
