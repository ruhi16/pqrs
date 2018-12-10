@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<h1>User Home Page...</h1>


Name: {{ Auth::user()->name }}<br>
Role: {{ Auth::user()->role->name }}
User ID:   {{ Auth::user()->id }}<br>



<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
