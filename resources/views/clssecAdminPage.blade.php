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
            <th>#</th>
            <th>Name</th>
            <th>Class</th>
            <th>Sections</th>
            <th>Roll No</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      
      @foreach($remRec as $std)
      <tr>
        <td>{{$std->id}}</td>
        <td>
          {{ $std->name }}          
        </td>
        <td class="text-center">
          {{--  {{$std->stclss_id}}          --}}
          {{ $cls->name }}
        </td>
        <td class="text-center">
          {{--  {{$std->stsec_id}}  --}}
          {{ $sec->name }}
        </td>
        <td></td>
        <td>          
            <a href="{{url('/issueRoll',[$std->id])}}" class="btn btn-info issue-roll">Issue Roll</a>          
        </td>
      </tr>
      @endforeach

    </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Session/Sl No</th>
      <th>Name</th>
      <th>Class</th>
      <th>Section</th>
      <th>Roll No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp
    @foreach($stcr as $stc)
    @php $i++; @endphp
    <tr>
      <td>{{ $stc->session_id }}/{{ $i }}</td>
      <td>{{ $stc->studentdb->name }}</td>
      <td class="text-center">{{ $stc->clss->name }}</td>
      <td class="text-center">{{ $stc->section->name }}</td>
      <td class="text-center">{{ $stc->roll_no }}</td>
      <td>
        <a href="{{url('/studentdbmultipage-edit',[$stc->studentdb_id])}}" class="btn btn-primary btn-sm">Edit Details</a>        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>



<script type="text/javascript">
  $(document).ready(function(e){
    $(document).on('click', '.issue-roll',function(e) {
        //alert('Button click');        
        e.preventDefault();
        $(this).off(e);
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
