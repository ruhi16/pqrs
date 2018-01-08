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
      
      @foreach($remRec as $std)
      <tr>
        <td>{{$std->id}}</td>
        <td>{{$std->name}}</td>
        <td>{{$std->stclss_id}}</td>
        <td>{{$std->id}}</td>
        <td></td>
        <td>
          {{--  @if(!$stcr->contains('session_id',$ses->id) && !$stcr->contains('studentdb_id',$std->id))  --}}
            <a href="{{url('/issueRoll',[$std->id])}}" class="btn btn-info">Issue Roll</a>
          {{--  @else
            Not Application
          @endif            --}}
        </td>
      </tr>
      @endforeach

    </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Session</th>
      <th>Name</th>
      <th>Class</th>
      <th>Section</th>
      <th>Roll No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($stcr as $stc)
    <tr>
      <td>{{ $stc->session_id }}</td>
      <td>{{ $stc->studentdb->name }}</td>
      <td>{{ $stc->clss_id }}</td>
      <td>{{ $stc->section_id }}</td>
      <td>{{ $stc->roll_no }}</td>
      <td>{{ $stc->id }}</td>
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
