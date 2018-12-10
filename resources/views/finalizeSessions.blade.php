@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<table class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>Particular / Table</th>
        <th>Session</th>
        <th>Remarks(if any)</th>
    </tr>
</thead>
<tbody>
@foreach($fsesns as $fsesn)
<tr>
    <td>{{ $fsesn->id }}</td>
    <td>{{ $fsesn->finalizeparticular->particular }}</td>    
    <td>{{ $fsesn->session->name }}</td>
    <td>{{ $fsesn->remarks }}</td>
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
