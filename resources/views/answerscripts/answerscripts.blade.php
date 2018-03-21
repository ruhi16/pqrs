@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Answer Script Distribution Point...</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>SL</th>
      <th>Class</th>
      @foreach($exms as $ex)
        <th>{{$ex->name}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($clss as $cl)
    <tr>
      <td>{{$cl->id}}</td>
      <td>{{$cl->name}}</td>
      @foreach($exms as $ex)
        <td><a href="{{url('/answerscript-distribution',[$ex->id,$cl->id])}}">Answer Script Distribution</a></td>
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>




@endsection

@section('footer')
	@include('layouts.footer')
@endsection
