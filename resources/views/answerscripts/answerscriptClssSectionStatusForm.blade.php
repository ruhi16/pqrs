@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Formative Marks Entry Finalize Status for Session <U>{{ $session->name }}</U></h1>

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
                    <th colspan='{{ $exams->count() }}' class='text-center'>
                        {{ $csec->section->name }}: {{ $clscStd }}<br>
                        <small>CT: {{ $classteachers->where('clss_id', $cls->id)->where('section_id', $csec->section_id)->first()->teacher->name }}</small>
                    </th>    
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
                @if($csub->extype_id == 1)              {{-- for Formative Exam!!! --}}
                    <tr>
                    <td>{{ $csub->name }}</td>
                    @foreach($cls->clssecs as $csec)
                        @foreach($exams as $exam)
                            
                            <td>
                                {{--  {{ $formarkdetails[$csec->id] }}  --}}
                                {{--  {{ $formarkdetails[$csec->id]['marks_total'] }}  --}}
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
