@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Wise Task Page</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL</th>
            <th>Class</th>
            <th>Sections</th>
            <th>Status</th>
            <th>Admission</th>
            <th>Marks Entry</th>
            {{--  <th>Subject Wise Full Marks</th>  --}}
            <th>Marks Register</th>
            <th>Result Sheet</th>
        </tr>
    </thead>
    <tbody>
@foreach($clssecs as $clssec)
    <tr>
    <td>{{$clssec->id}}</td>
    <td>{{$clssec->clss()->first()->name}}</td>
    <td>{{$clssec->section()->first()->name}}</td>
    <td>{{$clssec->status}}</td>
    <td><a href="{{url('/clssec-AdminPage',[$clssec->clss_id,$clssec->section_id])}}">Clss-Sec Admission</a></td>
    <td><a href="{{url('/clssec-MrkenPage',[$clssec->id])}}">Clss-Sec Mark Entry Status</a></td>
    {{--  <td><a href="{{url('/exmtypclssubfmEntry',[$clssec->clss_id])}}">Full Mark Entry</a></td>  --}}
    <td><a href="{{url('/clssec-MarksRegister',[$clssec->id])}}">Clss-Sec Mark Register</a></td>
    <td><a href="{{url('/clssec-ResultTaskpane',[$clssec->id])}}">Students Individual Result Sheet</a></td>
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
