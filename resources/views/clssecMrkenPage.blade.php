@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Entry Page</h1>

@foreach($extpcls as $extpcl)
  {{$extpcl}}

@endforeach


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
      <td>Exam Type</td>
      <td>{{ $cl->subject_id }}</td>
      @foreach($exm as $ex)
        <td>{{ $ex->name }}</td>
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
