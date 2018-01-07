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
            <td>#</td>
            <td>Class</td>
            <td>Sections</td>
            <td>Status</td>
            <td>Admission</td>
            <td>Marks Entry</td>
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
