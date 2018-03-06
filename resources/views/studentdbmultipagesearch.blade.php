@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Student DB Details with Search ...</h1>

{{--  {{$stddb->dump()}}  --}}
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>      
      @foreach($stddb as $sdb)
        <tr>
          <td>{{$sdb->name}}</td>
          <td>{{$sdb->fname}}</td>
          <td>{{$sdb->mname}}</td>
        </tr>
      @endforeach      
    </tbody>
  </table>



    <link rel="stylesheet" type="text/css" href="{{url('datatable/jquery.dataTables.min.css')}}" >
    <script src="{{url('datatable/jquery.dataTables.min.js')}}"></script>


<script type="text/javascript">
  $(document).ready(function(e){
    $('#myTable').DataTable();
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
