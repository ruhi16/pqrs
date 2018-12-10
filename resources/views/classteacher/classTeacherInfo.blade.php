@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<h1>Class Teacher Information for the <U>Session: {{ $session->name }}</u></h1>

<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Sl</th>
			<th>Class</th>
			<th>Section</th>
			<th>Teacher Name</th>
		</tr>	
	</thead>
	<tbody>
		@foreach($clssteachers as $clssteacher)
			<tr>
				<td>{{ $clssteacher->id }}</td>			
				<td>{{ $clssteacher->clss->name }}</td>
				<td>{{ $clssteacher->section->name }}</td>
				<td>{{ $clssteacher->teacher->name }}</td>
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
