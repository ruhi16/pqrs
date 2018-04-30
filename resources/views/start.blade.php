{{--  @extends('layouts.app')  --}}

{{--  @section('content')  --}}
@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<div class="row">


<div class="dropdown">
    

<div class="container">
<div class="panel panel-default">
    <div class="panel-heading text-center"><b>Class-Section wise Total Students Detail</b></div>        
    <div class="panel-body">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Particulars</th>
                @foreach($clssecs->unique('clss_id')  as $clssec )
                    <th class="text-center" colspan="{{ $clssecs->where('clss_id', $clssec->clss->id)->count() }}">
                        {{ $clssec->clss->name }}                        
                        
                    </th>
                @endforeach
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Sections</th>
                @foreach($clssecs->unique('clss_id')  as $clssec )                
                    @foreach($clssecs as $clsc)                    
                        @if($clsc->clss_id == $clssec->clss->id)
                        <th class="text-center">
                            {{ $clsc->section->name }}
                            {{--  :{{ $stdcrs->where('clss_id',$clsc->clss->id)
                                    ->where('section_id', $clsc->section->id)
                                    ->count()
                              }},   --}}
                        </th>
                        @endif                    
                    @endforeach                    
                
                @endforeach
                <td></td>
            </tr>
            <tr>
                <th>Total Students </th>
                @php $total = 0; @endphp
                @foreach($clssecs->unique('clss_id')  as $clssec )                
                    @foreach($clssecs as $clsc)                    
                        @if($clsc->clss_id == $clssec->clss->id)
                        <td class="text-center">                            
                            @php
                            $clscStd = $stdcrs->where('clss_id',$clsc->clss->id)
                                    ->where('section_id', $clsc->section->id)
                                    ->count();

                            $total += $clscStd;
                            @endphp
                            {{ $clscStd }}
                        </td>
                        @endif                    
                    @endforeach                    
                
                @endforeach
                <th class="text-center">{{ $total }}</th>
            </tr>
        </tbody>
        </table>
        
            

        
    </div>
</div>



















    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--  <button type="button" class="btn btn-primary" onclick="location.class="btn btn-primary" href='{{route('xyz')}}'">Test123</button>  --}}
                    You are logged in!!!!!!!
                    <br>
                    <a class="btn btn-primary" href="{{url('/finalizeParticulars')}}">Finalize Particulars</a>                    
                    <a class="btn btn-warning" href="{{url('/finalizeSessions')}}">Finalize Sessions</a>   
                    <a class="btn btn-info"    href="{{url('/schools')}}">School Details</a> 
                    <a class="btn btn-primary" href="{{url('/schools-view')}}">School Details View</a>
                    <a class="btn btn-success" href="{{url('/session')}}">Session Details</a>                    
                    <a class="btn btn-info" href="{{url('/clsses')}}">Class Details Entry</a>                    
                    <a class="btn btn-success" href="{{url('/clsses-view')}}">Class Details Display</a>
                    <a class="btn btn-primary" href="{{url('/sections')}}">Section Details Entry</a>                    
                    <a class="btn btn-success" href="{{url('/sections-view')}}">Section Details Display</a>                    
                    <a class="btn btn-primary" href="{{url('/clssecs')}}">Class-Section Details Entry</a>
                    <a class="btn btn-warning" href="{{url('/clssecs-view')}}">Class-Section Details Display</a>                    
                    <a class="btn btn-danger" href="{{url('/gradedescriptions/1')}}">Grade Description Details Entry..</a>
                    <a class="btn btn-success" href="{{url('/gradedescriptions-view/1')}}">Grade Description Details Display</a>
                    <a class="btn btn-info" href="{{url('/exams')}}">Exam Details Entry</a>                    
                    <a class="btn btn-primary" href="{{url('/exams-view')}}">Exam Details Display</a>
                    <a class="btn btn-success" href="{{url('/extypes')}}">Exam Type Details Entry</a>                    
                    <a class="btn btn-info" href="{{url('/extypes-view')}}">Exam Type Details Display</a>                    
                    <a class="btn btn-primary" href="{{url('/subjects')}}">Subject Details Entry</a>                    
                    <a class="btn btn-success" href="{{url('/subjects-view')}}">Subject Details Display</a>                    
                    <a class="btn btn-primary" href="{{url('/gradeparticulars')}}">Grade particular Entry</a>                    
                    <a class="btn btn-warning" href="{{url('/gradeparticulars-view')}}">Grade particular View</a>
                    <a class="btn btn-danger" href="{{url('/grades')}}">Grade Details Entry</a>                    
                    <a class="btn btn-primary" href="{{url('/gradesView')}}">Grade Details View</a>
                    <a class="btn btn-info" href="{{url('/clssubs')}}">Class - Subject Entry</a>                    
                    <a class="btn btn-danger" href="{{url('/clssubs-view')}}">Class - Subject View</a>                    
                    {{--  <a class="btn btn-primary" href="{{url('/exmtypclssub')}}">Exam - Type - Class - Subject Entry (X)</a>
                    <a class="btn btn-success" href="{{url('/exmtypclssub-view')}}">Exam - Type - Class - Subject View (X)</a>                      --}}
                    {{--  <a class="btn btn-primary" href="{{url('/gradedescription')}}">Grade Description Entry</a>                    
                    <a class="btn btn-primary" href="{{url('/gradedescription-view')}}">Grade Description View</a>  --}}
                    <a class="btn btn-primary" href="{{url('/studentdb')}}">Students Detail View</a>                    
                    <a class="btn btn-primary" href="{{url('/studentdbmultipage-listToUpdateSection')}}">New Adm Student List for Section</a>
                    {{--  
                    <a class="btn btn-primary" href="{{url('/clssec-TaskPage')}}">Students Info Entry View</a>                    
                    <a class="btn btn-primary" href="{{url('/clssecs')}}">New Admission Students Details Entry</a>
                     --}}
                    <a class="btn btn-info" href="{{url('/studentdbmultipage')}}">New Admission Students Details Entry Page</a>                    
                    <a class="btn btn-danger" href="{{url('/studentdbmultipage-search')}}">New Admission Students Details Search Page</a>
                    <a class="btn btn-warning" href="{{url('/studentdbmultipage-view')}}">New Admission Students Details View Page</a>
                    
                    
                    {{--  
                    <a class="btn btn-primary" href="{{url('/clssubjfm/1')}}">Exam Term and Class Wise Full Marks Specification Entry (V)</a>
                    <a class="btn btn-primary" href="{{url('/clssubjfm-view/1')}}">Exam Term and Class Wise Full Marks Specification View (V)</a>  
                    --}}
                    <a class="btn btn-success" href="{{url('/exmtypclssubTaskpane')}}">Class Task-Pane</a>
                    <a class="btn btn-info" href="{{url('/teachers')}}">Teachers Details Entry Point</a>
                    <a class="btn btn-primary" href="{{url('/teachers-view')}}">Teachers Details View Point</a>
                    
                    <a class="btn btn-info" href="{{url('/clssec-TaskPage')}}">Class-Section Task-Pane</a>
                    <a class="btn btn-success" href="{{ url('/ExStudentDb') }}" >Excel HTML</a>
                    


                    <br>
                    <a class="btn btn-default" href="{{url('/answerScript-taskpane')}}">Answer Script Distribution Point</a>

                    {{--  //first: exam_id, second: extype_id (summative=2)  --}}
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Ans Sc Disburshment Class-Section Wise
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/1/2') }}">First Terminal</a></li>
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/2/2') }}">Second Terminal</a></li>
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/3/2') }}">Third Terminal</a></li>
                        
                    </ul>
                    </div>


                    
                    {{--  //first: exam_id, second: extype_id (summative=2)  --}}                    
                    <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Ans Sc Disburshment Teacher Wise
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('/answerScript-teacherAllotment/1/2') }}">First Terminal</a></li>
                        <li><a href="{{ url('/answerScript-teacherAllotment/2/2') }}">Second Terminal</a></li>
                        <li><a href="{{ url('/answerScript-teacherAllotment/3/2') }}">Third Terminal</a></li>
                        
                    </ul>
                    </div>

                    <a class="btn btn-warning" href="{{ url('/exmtypmodcls-Taskpane') }}" >Exam Mode Selection</a>
                    
                    <br>
                    <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Class wise Full Marks Assignment
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($clss as $cls)
                        <li><a href="{{ url('/exmtypmodclssubfmEntry', [$cls->id]) }}">{{$cls->name}} Class</a></li>
                        

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



{{--  
@foreach(getTableColumns('studentdbs') as $abc)
    {{$abc}}
@endforeach  
--}}
{{--  @endsection  --}}


<script type="text/javascript">
$(document).ready(function(e){
    
});  
</script>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
  