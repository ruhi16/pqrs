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
        <th>Class</th>
        <th>Section</th>
      </tr>
    </thead>
    <tbody>      
    {{--  {{ dd($stddb) }}  --}}
      @foreach($stddb as $sdb)
        <tr>
          <th>{{$sdb->name}}</th>
          <th>{{$sdb->clss->name}}</th>
          <th>{{$sdb->section->name}}</th>
        </tr>
      @endforeach      
    </tbody>
    
    <tfoot>
      <tr>
      <th>Firstname</th>
        <th>Class</th>
        <th>Section</th>
      </tr>
    </tfoot>    
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

<script src="{{url('datatable/jquery-1.12.4.js')}}"></script>
<script src="{{url('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{url('datatable/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{url('datatable/buttons.flash.min.js')}}"></script>
<script src="{{url('datatable/jszip.min.js')}}"></script>
<script src="{{url('datatable/pdfmake.min.js')}}"></script>
<script src="{{url('datatable/buttons.html5.min.js')}}"></script>
<script src="{{url('datatable/buttons.print.min.js')}}"></script>
<script src="{{ url('datatable/vfs_fonts.js') }}"></script>


<link rel="stylesheet" type="text/css" href="{{url('datatable/bootstrap.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{url('datatable/dataTables.bootstrap.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{url('datatable/jquery.dataTables.min.css')}}" >
{{--  <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')}}" >  --}}

{{--  https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css  --}}


<script type="text/javascript">
  $(document).ready(function(e){
        // Place the Search input box at the bottom
        $('#myTable tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        });
        
        // DataTable with Main Search with Download Buttons
        var table = $('#myTable').DataTable({
          dom: 'Bfrtip',
          //"paging":   false,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          //"pageLength": 50
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });

        // Apply the Column Search Method
        table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
      });
  

  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
