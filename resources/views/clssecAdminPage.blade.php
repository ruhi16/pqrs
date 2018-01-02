@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Admin Page</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Class</td>
            <td>Sections</td>
            <td>Roll No</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
      
      @foreach($stdb as $std)
      <tr>
        <td>{{$std->id}}</td>
        <td>{{$std->name}}</td>
        <td>{{$std->stclss_id}}</td>
        <td>{{$std->id}}</td>
        <td></td>
        <td><a href="{{url('/issueRoll')}}" class="btn btn-info">Issue Roll</a></td>
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
