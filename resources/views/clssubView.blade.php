@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Subject View...</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Class</th>
            <th>Subject</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clssubs as $clssub)
        <tr>
            <td>{{$clssub->id}}</td>
            <td>{{ $clss->where('id', ($clssub->clss_id))->first()->name }}</td>
            <td>{{ $subjects->where('id', ($clssub->subject_id))->first()->name }}</td>
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
