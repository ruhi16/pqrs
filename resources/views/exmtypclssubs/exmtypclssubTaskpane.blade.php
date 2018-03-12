@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Exam-Type Class Subject Full Marks Assignment Task Pane</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Class</th>
            <th class="text-center">Assign Full Marks</th>
            <th class="text-center">Remarks</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clss as $cls)
        <tr>
            <td>{{ $cls->id }}</td>
            <td>{{ $cls->name }}</td>
            <td class="text-center"><a href="{{ url('/exmtypclssubfmEntry', [$cls->id])}}">Assign Full Marks for class {{ $cls->name }}</a></td>
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
