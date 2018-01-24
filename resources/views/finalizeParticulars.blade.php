@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<button type="button" class="btn btn-success btn-lg"  onclick="location.href='{{route('finalizeParticulars-Refresh')}}'">Refresh: Finalise Particulars</button>
<h1>Finalize-Particulars...</h1>


<table class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>Particular</th>
        <th>Status</th>
        <th>Session</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($fparts as $fpart)
<tr>
    <td>{{ $fpart->id }}</td>
    <td>{{ $fpart->particular }}</td>
    <td>{{ $fpart->status }}</td>
    <td>{{ $fpart->session_id }}</td>
    <td>
    @if($fsesns->where('finalizeparticular_id',$fpart->id)->count() > 0)
        Finalized!!!
    @else
        <a href="{{url('/btn-finalize',[$fpart->id])}}" class="btn btn-primary">Finalize</a>
    @endif
    
    </td>
    
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
