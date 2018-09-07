@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<table class="table table-bordered table-striped">

	<tr>
		<th class="text-center">Sl</th>
		<th class="text-center">Name</th>
		<th class="text-center">Designation</th>
		<th class="text-center">User Id / Email</th>
		<th class="text-center">Password</th>
		<th class="text-center">Remarks</th>
	</tr>

@foreach($teachers as $teacher)
	<tr>
		<td class="text-center">{{ $teacher->id }} </td>
		<td>{{ $teacher->name }} </td>
		<td class="text-center">{{ $teacher->desig }} </td>
		<td class="text-center">{{ $users->where('id', $teacher->id)->first()->email }} </td>
		<td class="text-center">asdfgh </td>
		<td></td>
	</tr>
@endforeach
</table>








<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
