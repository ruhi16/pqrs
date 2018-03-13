@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Entry Page</h1>

{{--  @foreach($extpcls as $extpcl)
  {{$extpcl}}
@endforeach  --}}


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Exam Type</th>
      <th>Subject Name</th>
      @foreach($exm as $ex)
        <th>{{ $ex->name }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($clsb as $cl)
    <tr>
      <td>{{ $cl->subject->extype->name }}</td> 
      <td>{{ $cl->subject->name }}</td>
      @foreach($exm as $ex)
        <td>
          @foreach($extpcls as $extpcl)
            @if( $extpcl->exam_id == $ex->id && $extpcl->extype_id == $cl->subject->extype->id && $extpcl->subject_id == $cl->subject_id)
               {{--  extpcl:{{$extpcl->id}}-clsb:{{$cl->id}}-clsc:{{$clsc->id}}  --}}
               <a href="{{url('/Clssecstd-MarksEntry',[$extpcl->id,$cl->id,$clsc->id])}}">Marks Entry</a>
               @if($stdmrk
                  ->where('exmtypclssub_id', $extpcl->id)
                  ->where('clssec_id', $clsc->id)
                  ->where('clssub_id',$cl->id)->sum('marks')  != 0)
                  <b>Done</b>
                @else
                <b>Pending</b>
                @endif
            @endif
          @endforeach
        </td>
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>


{{--  <table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
@foreach($stdcrs as $stdcr)
    <tr>
      <td>{{ $stdcr->studentdb_id }}</td>
      <td>{{ $stdcr->studentdb->name }}</td>
      <td>{{ $stdcr->roll_no }}</td>
    </tr>
@endforeach
  </tbody>
</table>  --}}




<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
