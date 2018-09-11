@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h2>Class:    {{ $clssec->clss->name }} , 
    Section:  {{ $clssec->section->name }}, 
    Class Teacher: , Session: ,    Compact Mark Register</h2>
<h3>Class wise Total Subject Details</h3>


<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>Sl</th>
      <th>Type</th>
      <th class="text-center">Nature</th>
      <th>Name</th>      
      @foreach($exams as $exam)
        <th class="text-center">{{ $exam->name }}</th>
      @endforeach
      <th class="text-center">Full Marks</th>
    </tr>
  </thead>
  <tbody>         
      @foreach($clssubs as $clssub)
        <tr>
          <td>{{ $clssub->id }}</td>
          <td>{{ $clssub->subject->extype->name }}</td>
          <td class="text-center">{{ $clssub->combination_no }}</td>
          <td>{{ $clssub->subject->name }}</td>
          
          @foreach($exams as $exam)
            <td class="text-center">{{ $extpmdclsbs->where('extype_id', $clssub->subject->extype_id)
                    ->where('subject_id', $clssub->subject_id)
                    ->where('exam_id', $exam->id)
                    ->first()->fm }}</td>
          @endforeach
          <td class="text-center"><b>
            {{ $extpmdclsbs->where('extype_id', $clssub->subject->extype_id)
                    ->where('subject_id', $clssub->subject_id)
                    
                    ->sum('fm') }}</b>
          </td>
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
