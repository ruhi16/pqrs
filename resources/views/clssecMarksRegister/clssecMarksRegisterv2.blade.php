@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Register V-2</h1>

	@foreach($clssecDetails as $clssecDetail)
		@if($loop->first )
			{{ dd($clssecDetail) }}
		@endif

	@endforeach












<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
