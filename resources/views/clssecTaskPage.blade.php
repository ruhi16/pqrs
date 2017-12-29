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
        </tr>
    </thead>
    <tbody>
@foreach($clssecs as $clssec)
    <tr>
    <td>{{$clssec->id}}</td>
    <td>{{$clssec->clss_id}}</td>
    <td>{{$clssec->section_id}}</td>
    <td>{{$clssec->status}}</td>
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
