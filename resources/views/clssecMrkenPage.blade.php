@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class: <b>{{$cls}}</b> Section: <b>{{$sec}}</b>  -- Marks Entry Page</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Exam Type</th>
      <th>Subject Name</th>
      @foreach($exm as $ex)
        @foreach($modes as $mode)
          <th>{{ $ex->name }}-{{ $mode->name }}</th>
        @endforeach  
      @endforeach
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>Formative </td>
    <td>All Formative Subjects </td>
    @foreach($exm as $ex)
        @foreach($modes as $mode)
        <td>
          {{--  @foreach($extpcls->groupBy('subject_id')->first() as $extpcl)  --}}
          @foreach($extpmdcls as $extpcl)
            @if(  $extpcl->exam_id == $ex->id && 
                  $extpcl->extype_id == $exmtyp->where('name', 'Formative')->first()->id &&                  
                  $extpcl->mode_id == $mode->id )
                  {{--  {{ $extpcl->id }}  --}}
                  <a href="{{ url('/clssecstd-MarksEntryForAllSubj', [$extpcl->id, $clsc->id]) }}"><span class="glyphicon glyphicon-floppy-saved"></span></a> Enter Marks
            @endif
          @endforeach
          </td>
        @endforeach
      @endforeach
  </tr>
  </tbody>
</table>



<table class="table table-bordered">
  <thead>
    <tr>
      <th>Exam Type</th>
      <th>Subject Name</th>
      @foreach($exm as $ex)
        @foreach($modes as $mode)
          <th>{{ $ex->name }}-{{ $mode->name }}</th>
        @endforeach  
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($clsb as $cl)
    <tr>
      <td>{{ $cl->subject->extype->name }}</td> 
      <td>{{ $cl->subject->name }}</td>
      @foreach($exm as $ex)
        @foreach($modes as $mode)
        <td>
          @foreach($extpcls as $extpcl)
            @if(  $extpcl->exam_id == $ex->id && 
                  $extpcl->extype_id == $cl->subject->extype->id && 
                  $extpcl->subject_id == $cl->subject_id  &&
                  $extpcl->mode_id == $mode->id )

               <a href="{{url('/clssecstd-MarksEntry',[$extpcl->id,$cl->id,$clsc->id])}}"><span class="glyphicon glyphicon-floppy-saved"></span></a>
                @if($stdmrk
                    ->where('exmtypmodclssub_id', $extpcl->id)
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
