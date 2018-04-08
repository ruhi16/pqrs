@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Type Wise Each Subjects Grade-Description Details...</h1>

@foreach($extps as $etp)
@if($etp->id == $extype_id)
    <h1>Exam Type: <small>{{$etp->name}}</small></h1>
    <table class="table table-bordered" id="table{{$etp->id}}">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Subject</th>
                @foreach($grads as $grd)
                    @if( $etp->id == $grd->extype_id )
                        <th>{{ $grd->gradeparticular->name }}</th>
                    @endif
                @endforeach
                
            </tr>
        </thead>
        <tbody>
    @foreach($subjs as $sub)
        @if( $etp->id == $sub->extype_id )
            <tr id="tr{{$sub->id}}">
                <td>{{ $sub->id}}</td>
                <td>{{ $sub->name }}</td>
                @foreach($grads as $grd)
                    @if( $etp->id == $grd->extype_id )
                        <td id="td{{$grd->id}}">
                          {{ $grddes->where('subject_id', $sub->id)
                                  ->where('grade_id', $grd->id)->first()->desc or 'Not Assigned!!! :)'}}
                        </td>
                    @endif
                @endforeach                
            </tr>
        @endif
    @endforeach
    </tbody>
    </table>
@endif
@endforeach


<script type="text/javascript">


</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
