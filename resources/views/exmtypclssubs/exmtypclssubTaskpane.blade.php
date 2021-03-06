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
            <th class="text-center">Exam Mode Selection</th>
            <th class="text-center">Assign Full Marks</th>
            <th class="text-center">View Full Marks</th>
            <th class="text-center">Promotional Rules</th>
            <th class="text-center">Clas Sec Grade Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clss as $cls)
        <tr>
            <td>{{ $cls->id }}</td>
            <td>{{ $cls->name }}</td>
            <td class="text-center"><a href="{{ url('/exmtypmodcls-Assign', [$cls->id])}}">Assign Exam Mode {{ $cls->name }}</a></td>
            <td class="text-center">
                {{-- <a href="{{ url('/exmtypclssubfmEntry', [$cls->id])}}">Assign Full Marks for class {{ $cls->name }}</a> --}}
                <a href="{{ url('/exmtypmodclssubfmEntry', [$cls->id]) }}">{{$cls->name}} Class FM Entry</a>
            </td>
            <td class="text-center">
                    <a href="{{ url('/exmtypmodclssubfmEntry-View', [$cls->id]) }}">{{$cls->name}} Class FM View</a>
                {{--  <a href="{{ url('/exmtypclssubfmView', [$cls->id])}}">Assign Full Marks for class {{ $cls->name }}</a>  --}}
            </td>
            <td class='text-center'>
                <a href="{{ url('/classPromotionalRulesEntry', [$cls->id]) }}">{{$cls->name}} Class Promotional Rules Update</a>
            </td>
            <td class='text-center'>{{$cls->name}} Grade Status Count
                <a href="{{ url('/clssec-gradeStatus', [$cls->id]) }}">Normal</a> /
                <a href="{{ url('/clssec-gradeStatusPDF', [$cls->id]) }}">PDF</a>
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
