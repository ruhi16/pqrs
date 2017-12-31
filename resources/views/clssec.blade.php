@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Entry Page</h1>

<table class="table table-bordered">
<thead>
    <tr>
        <th>id</th>
        <th>Class</th>
        <th>Sections</th>        
        <th>Roll</th>
    </tr>
</thead>
<tbody>
@foreach($clssecs as $clssec)
<tr>
  <td>{{$clssec->id}}</td>
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
