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
        <th>Table Name</th>
        <th>Table Type</th>
        <th>Model Name</th>
        <th>Status</th>
        <th>Session</th>
        <th>Action</th>
        <th>Refactor</th>
    </tr>
</thead>
<tbody>
@foreach($fparts->sortBy('table_type') as $fpart)
<tr>
    <td>{{ $fpart->id }}</td>
    <td>{{ $fpart->particular }}</td>
    <td>{{ $fpart->table_type }}</td>
    <td>{{ $fpart->model_name }}</td>
    <td>{{ $fpart->status }}</td>
    <td>{{ $fpart->session->name }}</td> 
    <td>
    @if($fsesns->where('finalizeparticular_id',$fpart->id)->count() > 0)
        {{--  Finalized!!!  --}}
        <a href="{{url('/btn-unfinalize',[$fpart->id])}}" class="btn btn-danger btn-sm">Un-Finalize</a>
    @else
        <a href="{{url('/btn-finalize',[$fpart->id])}}" class="btn btn-primary btn-sm">Finalize</a>
    @endif
    
    </td>
    <td>
        @if( $fpart->table_type == "Basic" && $fpart->refactor_status == Null)
            <a href="{{url('/basicTable-refator',[$fpart->id])}}" class="btn btn-info btn-sm">Refactor</a>

        @elseif( $fpart->table_type == "Relational" && $fpart->refactor_status == Null)
            <a href="{{url('/relationalTable-refator',[$fpart->id])}}" class="btn btn-success btn-sm pull-right">Refactor</a>

        @elseif( $fpart->refactor_status == 'Done')
            <span class="label label-warning pull-right">Factorised</span>
            {{-- <span class="label label-{{$session->status == 'CURRENT'?'danger':'success'}}">{{$session->status}}</span> --}}
        @else
            <span class="label label-danger pull-right">Not Applicable</span>
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
