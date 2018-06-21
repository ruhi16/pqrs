@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Individual Result...</h1>

<table class="table table-bordered">
<thead>
  <tr>
    <th>Sl</th>
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Roll</th>
    @foreach($extp as $ex)
      <th>Total Marks Obt<br><small>{{ $ex->name }}</small></th>
      <th>Full Marks<br><small>{{ $ex->name }}</small></th>
      <th>Nos of Ds<br><small>{{ $ex->name }}</small></th>
    @endforeach
    <th>Result Status</th>
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
      <td></td>
      <td></td>
      <td></td>
    @endforeach
    <td></td>
    <td><a href="{{url('/clssec-ResultSheet',[$clssec_id, $stdcr->id])}}">Result Sheet</a></td>
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
