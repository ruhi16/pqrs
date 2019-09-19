@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1><b>Summative</b> Answer Script Finalize Status For  <U>{{ $exam->name }}</U></h1>

<div class="btn-group pull-right" role="group" aria-label="...">
  <button type="button" class="btn btn-default" id="all"    >All</button>
  <button type="button" class="btn btn-primary" id="fin"    >Finalized</button>
  <button type="button" class="btn btn-success" id="notfin" >Not Finalized</button>
</div>


@foreach($clss as $cls)
    <h3>For Class: {{ $cls->name }}</h3>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan='2'>Subjects</th>
                @foreach($cls->clssecs as $csec)
                    @php
                        $clscStd = $stdcrs->where('clss_id',$cls->id)
                            ->where('section_id', $csec->section->id)
                            ->count();
                    @endphp
                    <th colspan='{{ $exams->count() }}' class='text-center'>{{ $csec->section->name }}: {{ $clscStd }}</th>    
                @endforeach
            </tr>        

            <tr>                
                @foreach($cls->clssecs as $csec)
                    @foreach($exams as $exam)
                        <th class='text-center'>{{ substr($exam->name, 0, 3) }}</th>
                    @endforeach
                @endforeach                
            </tr>
        </thead>
        <tbody>            
            @foreach($cls->subjects as $csub)
                @if($csub->extype_id == $extype->first()->id)
                    <tr>
                    <td>{{ $csub->name }}</td>
                    @foreach($cls->clssecs as $csec)
                        @foreach($exams as $exam)
                            @php
                                $allot_teacher = $ansscdists->where('clss_id', $cls->id)
                                    ->where('exam_id', $exam->id)
                                    ->where('section_id', $csec->section->id)
                                    ->where('subject_id', $csub->id)
                                    ->pluck('teacher_id')->first();

                                $teacher_name = $teacher->where('id',$allot_teacher)->pluck('nickName')->first();
                                
                                $status = $ansscdists->where('clss_id', $cls->id)
                                    ->where('exam_id', $exam->id)
                                    ->where('section_id', $csec->section->id)
                                    ->where('subject_id', $csub->id)
                                    ->pluck('finlz_dt')->first();
                                if( $status ){
                                    $finalize_status = "<span class='glyphicon glyphicon-ok' style='color:green'></span>";
                                    
                                }else{
                                    $finalize_status = "<span class='glyphicon glyphicon-remove' style='color:red'></span>";                                
                                }
                            @endphp
                            <td><small>
                                {{ $teacher_name }} 
                                @if($teacher_name != "")
                                    {!! $finalize_status !!}
                                @endif
                                </small>
                            </td> 
                        @endforeach   
                    @endforeach
                    </tr>
                @endif
            @endforeach
             
        </tbody>
    </table>

    
@endforeach
<script type="text/javascript">
    $(document).ready(function(e){        
        //$("#btn-finalized").val('all');
        $("button").click(function(e){
            var idClicked = e.target.id;
            //alert(idClicked);
            <?php $var1="1";?>
            //$("#btn-finalized").val(idClicked);
            $.cookie("test", idClicked);
        });
    });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
