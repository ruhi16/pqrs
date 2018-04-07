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
    {{--  {{ dd($stddb) }}  --}}
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

{{--  https://code.jquery.com/jquery-1.12.4.js
https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js

https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js
https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js
https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js
https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js 
<script src="{{url('')}}"></script>
 --}}

<script src="{{url('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js')}}"></script>


<link rel="stylesheet" type="text/css" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')}}" >

{{--  https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css  --}}


<script type="text/javascript">
  $(document).ready(function(e){
    $('#myTable').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
