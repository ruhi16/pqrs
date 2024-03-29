@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<center>
    <h2>{{ $school->name }}</h2>
    <h3>Student List for _________________________________________ Session: {{ $session->name }}</h3>
    <h4>Class: <b>{{ $clss->name }} Section: {{ $section->name }}</b></h4>
</center>

<table class="table table-bordered">
    <thead>
        <th>SL</th>
        <th>Name</th>
        <th>Roll</th>
        {{-- @foreach($exms as $ex)
            <th>{{ $ex->name }}</th>
        @endforeach --}}
        <th>Signature</th>
        <th>Remarks</th>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach($stdList as $std)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $std->studentdb->name }}</td>
            <td>{{ $i++ }}</td>
            {{-- @foreach($exms as $ex)
                <td></td>
            @endforeach --}}
            <td></td>
            <td></td>
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
