@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Answer Script Distribution Point</h1>
<h2>Exam: {{$exm->name}}, Class: {{$cls->name}}</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sl</th>
      <th>Subject</th>
      @foreach($clsecns as $clsc)
        <th>{{$clsc->section->name}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>    
    @foreach($clsubjs as $clsb)
      <tr>
        <td>{{$clsb->subject->id}}</td>
        <td>{{$clsb->subject->name}}</td>
        @foreach($clsecns as $clsc)
          <td></td>
        @endforeach
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
