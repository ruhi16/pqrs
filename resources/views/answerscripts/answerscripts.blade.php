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
      <th>Sections</th>
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
      <td>
        @foreach($clssec as $cs)          
            {{ $cs->clss_id == $cl->id ? $cs->section->name : ''}}          
        @endforeach
      </td>
      @foreach($exms as $ex)
        <td><a href="{{url('/answerscript-distribution',[$ex->id,$cl->id])}}">Answer Script Distribution</a></td>
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Particulars</th>
            @foreach($exms as $exam)
                <th class="text-center">{{ $exam->name }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Classes @All</td>
            @foreach($exms as $exam)
                <td class="text-center"><a href="{{ url('/answerScript-clss-sectionAllotment', [$exam->id, 2]) }}">All Class Allotment</a></td>
            @endforeach
        </tr>  
        <tr>
            <td>2</td>
            <td>Teachers @All</td>
            @foreach($exms as $exam)
                <td class="text-center"><a href="{{ url('/answerScript-teacherAllotment', [$exam->id, 2]) }}">All Teachers Allotment</a></td>
            @endforeach
        </tr>    
    </tbody>

</table>


@endsection

@section('footer')
	@include('layouts.footer')
@endsection
