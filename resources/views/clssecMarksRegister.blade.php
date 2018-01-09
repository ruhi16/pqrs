@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class-Section wise Marks Register...</h1>

@foreach($clsbs as $clsb)
    {{ $clsb }}<br>
@endforeach

@foreach($stdcrs as $stdcr)
    Student Name: {{ $stdcr->studentdb->name }}<br>
    @foreach($stdcr->marksentries as $record)
        Exam Type Class : {{ $record->exmtypclssub_id }}
        Class   : {{ $record->exmtypclssub->clss->name }}
        Section : {{ $record->clssec->section->name }}
        Exam    : {{ $record->exmtypclssub->exam->name }}
        Type    : {{ $record->exmtypclssub->extype->name }}

        Subject : {{ $record->clssub->subject->name }}
        Marks   : {{ $record->marks }}
        <br>
    @endforeach
@endforeach

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subjects</th>
            @foreach($exms as $ex)
            <th>{{$ex->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        
        @foreach($stdcrs as $stdcr)
        <tr>
            <td>{{ $stdcr->studentdb->name }}</td>
            <td>
                @foreach($clsbs as $clsb)                    
                    <table class="table table-bordered">
                        <tr>
                            <td>{{ $clsb->subject->name }}</td>                           
                        </tr>           
                    </table>
                @endforeach
            </td>
            @foreach($exms as $ex)
                <td>
                @foreach($clsbs as $clsb)
                <table class="table table-bordered">
                    <tr>
                        <td>
                            xx
                        </td>
                    </tr>
                </table>
                @endforeach
                </td>
            @endforeach
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
