@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h2>Class:      <b>{{ $clssec->clss->name }}</b> , 
    Section:    <b>{{ $clssec->section->name }}</b>, 
    CT:         <b>{{$clsTeacher->first()->teacher->name }}</b>, 
    Session:    {{ $session->name }},    Promotional Assessment</h2>

    <a href="{{ url('/clssec-PromotionalStdCrStatusRefresh', [$clssec->id])}}" class='btn btn-primary btn-lg pull-right'>Refresh</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name<br>Class-Sec-Roll</th>
            @foreach($extps as $extp)
                <th>{{$extp->name}} <br> OM/FM (? Ds)<br>Status</th>
            @endforeach
            <th>Overall Results</th>
            <th>Description</th>
            <th>Remarks</th>
        </tr>
    
        @foreach($stdcrs as  $stdcr)
            <tr>
                <td>{{ $stdcr->id }}</td>
                <td>
                    {{ $stdcr->studentdb->name }}<br>
                    {{ $stdcr->clss->name }} - 
                    {{ $stdcr->section->name }} - 
                    {{ $stdcr->roll_no }}
                </td>                
                @foreach($extps as $extp)
                <td>
                    @if( $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first() )
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->obtnmarks }}/
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->fullmarks }}
                        ({{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->noofds }}Ds)
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->results }}
                    @endif
                </td>                
                @endforeach                    
                <td>
                    {{ $stdcr->result }}
                </td>
                <td>
                    {{ $stdcr->clss->next_clss_id }}
                    {{--  {{ $clssec }}  --}}
                <td>
                    
                </td>
            </tr>
        @endforeach        
        
    </table>








<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
