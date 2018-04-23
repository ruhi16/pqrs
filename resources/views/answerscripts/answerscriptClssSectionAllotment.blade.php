@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam: , Type: , <b>Class Section</b> wise Answer Script Disbursment </h1>
@foreach($clss as $cls)
    <h3>For Class: {{ $cls->name }}</h3>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subjects</th>
                @foreach($cls->clssecs as $csec)
                    @php
                        $clscStd = $stdcrs->where('clss_id',$cls->id)
                            ->where('section_id', $csec->section->id)
                            ->count();
                    @endphp
                    <th>{{ $csec->section->name }}: {{ $clscStd }}</th>
    
                @endforeach
            </tr>        
        </thead>
        <tbody>            
                @foreach($cls->subjects as $csub)
                @if($csub->extype_id == 2)
                    <tr>
                    <td>{{ $csub->name }}</td>
                    @foreach($cls->clssecs as $csec)
                        @php
                            $allot_teacher = $ansscdists->where('clss_id', $cls->id)
                                ->where('section_id', $csec->section->id)
                                ->where('subject_id', $csub->id)
                                ->pluck('teacher_id')->first();
                        @endphp
                        <td>
                        {{ $teacher->where('id',$allot_teacher)->pluck('name')->first() }}
                        </td>    
                    @endforeach
                    </tr>
                @endif
                @endforeach
             
        </tbody>
    </table>

    
@endforeach
<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
