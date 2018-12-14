@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')







<a href="{{ url('/clssec-resultCrStatusRefresh', [$clssec_id])}}" class='btn btn-success btn-lg pull-right'>Refresh :)</a>
<h1>Individual Result...</h1> 

<table class="table table-bordered">
<thead>
  <tr>
    <th>Sl</th>
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Roll</th>
    {{--  @foreach($extp as $ex)
      <th>Total Marks Obt<br><small>{{ $ex->name }}</small></th>
      <th>Full Marks<br><small>{{ $ex->name }}</small></th>
      <th>Nos of Ds<br><small>{{ $ex->name }}</small></th>
    @endforeach  --}}
    <th>Result Status</th>
    {{--  <th>Action</th>  --}}
    <th>Action</th>
  </tr>
</thead>
<tbody>
@foreach($stdcrs as $stdcr)
  <tr>
    <td>{{$stdcr->id}}</td>
    <td>{{$stdcr->studentdb->name}}</td>
    <td>{{$stdcr->clss->name}}</td>
    <td>{{$stdcr->section->name}}</td>
    <td>{{$stdcr->roll_no}}</td>
    @foreach($extp as $ex)
      {{--  <td></td>
      <td></td>
      <td></td>  --}}
    @endforeach
    <td>
    @foreach($extp as $et)
      {{$et->name}}:  {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $et->id)->first()->obtnmarks or 'NA' }}/
                      {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $et->id)->first()->fullmarks or 'NA'}}:Ds
                      {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $et->id)->first()->noofds    or 'NA'}}>>                       
                      <b class="text-success">{{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $et->id)->first()->results    or 'NA'}}</b>
                      <br>
    @endforeach
    </td>
    {{--  <td>
      <a href="{{url('/clssec-ResultSheet',[$clssec_id, $stdcr->id])}}">Result Sheet</a><br>
      <a href="{{url('/clssec-ResultSheetv3',[$clssec_id, $stdcr->id])}}">Result Sheet V-3</a>
    </td>  --}}
    <td>
    {{--  <a href="{{url('/clssec-ResultSheetPDF',[$clssec_id, $stdcr->id])}}">Result Sheet PDF</a><br>
    <a href="{{url('/clssec-ResultSheetv3PDF',[$clssec_id, $stdcr->id])}}">Result Sheet V-3 PDF</a><br>  --}}
    <a href="{{url('/clssec-ResultSheetv4PDF',[$clssec_id, $stdcr->id])}}">Result Sheet V-4 PDF</a>
    </td>
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
