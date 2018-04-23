@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam: , Type: , <b>Teacher</b> wise Answer Script Disbursment </h1>

<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>Name</th>
        <th>Answer Script Details</th>
    </tr>
</thead>
<tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->name }}</td>
            @php
                $teacher_details = $ansscdist->where('teacher_id', $teacher->id);
                $total = 0;
                foreach($teacher_details as $abc){                    
                    $clscStd = $stdcrs->where('clss_id',$abc->clss->id)
                            ->where('section_id', $abc->section->id)
                            ->count();                    
                    $total += $clscStd;                    
                }
            @endphp
            
            <td>
                @foreach($teacher_details as $abc)
                    {{ $abc->clss->name }}-{{ $abc->section->name }}-<b>{{ $abc->subject->code }}</b>
                    -: 
                    {{
                        $clscStd = $stdcrs->where('clss_id',$abc->clss->id)
                                ->where('section_id', $abc->section->id)
                                ->count()
                    }}                    
                    <br>
                @endforeach
                <b>Total = {{ $total }}</b>
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
