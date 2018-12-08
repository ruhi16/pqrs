{{--  @extends('layouts.app')  --}}

{{--  @section('content')  --}}
@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')


<div class="container">
  
  <div class="row">
    <div class="col-md-2">
      
      
    </div>
  </div>
    
</div>




<div class="row">
<div class="dropdown">
<div class="container">




<div class="panel-group" id="accordion">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">V - X Students Details </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse"> {{-- class="in": it will open panel by default--}}
        <div class="panel-body">
        
        
        

                    {{--  start of Class-Section Students Details  --}}
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><b>Class-Section wise Total Students Detail</b></div>        
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
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
                                                }}  --}}
                                            </th>
                                            @endif                    
                                        @endforeach                    
                                    
                                    @endforeach
                                    <td></td>
                                </tr>
                                {{--  //============================  --}}
                                
                                <tr>
                                    <th>Boys </th>
                                    @php $total = 0;  @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            @php $boys = 0; @endphp
                                            <td class="text-center">                            
                                                @php    
                                                    
                                                    foreach($stdcrsClsSecMF as $key => $abc){
                                                        $arr = explode('-', $key);                                   

                                                        if( $arr[0] == $clsc->clss_id && 
                                                            $arr[1] == $clsc->section_id && 
                                                            $arr[2] == 'MALE'){
                                                                $boys = $abc;
                                                                
                                                        }
                                                    }
                                                    $total += $boys;
                                                @endphp
                                                {{ $boys }}
                                            </td>
                                            @endif                    
                                        @endforeach                    
                                    
                                    @endforeach
                                    <th class="text-center">{{ $total }}</th>
                                </tr>
                                <tr>
                                    <th>Girls </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            @php $girls = 0; @endphp
                                            <td class="text-center">                            
                                                @php    
                                                    
                                                    foreach($stdcrsClsSecMF as $key => $abc){
                                                        $arr = explode('-', $key);                                   

                                                        if( $arr[0] == $clsc->clss_id && 
                                                            $arr[1] == $clsc->section_id && 
                                                            $arr[2] == 'FEMALE'){
                                                                $girls = $abc;
                                                                
                                                        }
                                                    }
                                                    $total += $girls;
                                                @endphp
                                                {{ $girls }}
                                            </td>
                                            @endif                    
                                        @endforeach                    
                                    
                                    @endforeach
                                    <th class="text-center">{{ $total }}</th>
                                </tr>
                                {{--  //============================  --}}
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
                                                <b>{{ $clscStd }}</b>
                                            </td>
                                            @endif                    
                                        @endforeach                    
                                    
                                    @endforeach
                                    <th class="text-center">{{ $total }}</th>
                                </tr>
                                {{--  //============================  --}}
                                <tr>
                                    <th>General </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-primary">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>SC</th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-info">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>ST </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-warning">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>PH (Phy Ch)</th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-warning">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>OBC-A(Muslim) </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-primary">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>OBC-B(Hindu)</th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-info">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>Hindu </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-danger">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>Muslim </th>
                                    @php $total = 0; @endphp
                                    @foreach($clssecs->unique('clss_id')  as $clssec )                
                                        @foreach($clssecs as $clsc)                    
                                            @if($clsc->clss_id == $clssec->clss->id)
                                            <td class="text-center text-warning">                            
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
                                {{--  //============================  --}}
                                <tr>
                                    <th>Other </th>
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
                    {{--  end of Class-Section Students Details  --}}


                    {{--  show the name of methods with corresponding methods name  --}}
                    {{--  @foreach($controllers as $c)
                        {{ $c }}<br>
                    @endforeach  --}}


        </div>
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Answer Script Finalize Status</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>                        
                        <th class="text-center">Particulars</th>
                        @foreach($exams as $exam)
                            <th class="text-center">{{ $exam->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    //for Summative Exam......
                    <tr>                        
                        <td>All Classes</td>
                        @foreach($exams as $exam)
                            <td class="text-center">
                                <a href="{{ url('/answerScript-clss-sectionStatus', [$exam->id, 2, 0]) }}">Summative Exam Status</a> /
                                <a href="{{ url('/answerScript-clss-sectionStatus', [$exam->id, 2, 1]) }}">in PDF</a>
                                
                            </td>
                        @endforeach
                    </tr>  

                    //for Formative Exam......
                    <tr>                        
                        <td>All Classes</td>
                        @foreach($exams as $exam)
                            <td class="text-center">
                                <a href="{{ url('/answerScript-clss-sectionStatusForm', [$exam->id, 2, 0]) }}">Formative Exam Status</a> /
                                <a href="{{ url('/answerScript-clss-sectionStatusForm', [$exam->id, 2, 1]) }}">in PDF</a>
                                
                            </td>
                        @endforeach
                    </tr>  

                    <tr>                        
                        <td>All Teachers</td>
                        @foreach($exams as $exam)
                            <td class="text-center"><a href="{{ url('/answerScript-teacherAllotment', [$exam->id, 2]) }}">All Teachers Allotment</a></td>
                        @endforeach
                    </tr>    
                </tbody>

            </table>
        </div>
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Admin Task Pane</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"></div>
      </div>
    </div>
  </div> 

</div>






    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--  <button type="button" class="btn btn-primary" onclick="location.class="btn btn-primary" href='{{route('xyz')}}'">Test123</button>  --}}
                    {{--  You are logged in!!!!!!!
                    <br>  --}}
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
                    {{--**  <a class="btn btn-primary" href="{{url('/studentdb')}}">Students Detail View</a>                      --}}
                    {{--**  <a class="btn btn-primary" href="{{url('/studentdbmultipage-listToUpdateSection')}}">New Adm Student List for Section</a>  --}}
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
                    <a class="btn btn-warning" href="{{url('/answerScript-taskpane')}}">Answer Script Distribution Point</a>
                    <a class="btn btn-success" href="{{ url('/ExStudentDb') }}" >Excel HTML</a>
                    <a class="btn btn-primary" href="{{ url('/classTeacherInfo') }}" >Class Teacher Info</a>
                    


                    {{--  <br>  --}}
                    

                    {{--  //first: exam_id, second: extype_id (summative=2)  --}}
                    {{--  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Ans Sc Disburshment Class-Section Wise
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/1/2') }}">First Terminal</a></li>
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/2/2') }}">Second Terminal</a></li>
                        <li><a href="{{ url('/answerScript-clss-sectionAllotment/3/2') }}">Third Terminal</a></li>
                        
                    </ul>
                    </div>  --}}


                    
                    {{--  //first: exam_id, second: extype_id (summative=2)  --}}                    
                    {{--  <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Ans Sc Disburshment Teacher Wise
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('/answerScript-teacherAllotment/1/2') }}">First Terminal</a></li>
                        <li><a href="{{ url('/answerScript-teacherAllotment/2/2') }}">Second Terminal</a></li>
                        <li><a href="{{ url('/answerScript-teacherAllotment/3/2') }}">Third Terminal</a></li>
                        
                    </ul>
                    </div>  --}}

                    <!-- <a class="btn btn-warning" href="{{ url('/exmtypmodcls-Taskpane') }}" >Exam Mode Selection</a> -->
                    
                    {{--  <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Class wise Full Marks Assignment
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($clss as $cls)
                        <li><a href="{{ url('/exmtypmodclssubfmEntry', [$cls->id]) }}"> {{ $cls->name }} Class</a></li>
                        

                    @endforeach
                    </div>  --}}
                    
                    {{--  <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Class wise Full Marks View
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($clss as $cls)
                        <li><a href="{{ url('/exmtypmodclssubfmEntry-View', [$cls->id]) }}"> {{ $cls->name}} Class</a></li>
                        

                    @endforeach
                    </div>  --}}
                    

                    {{--  <a href="{{url('/mpdfBengaliTestpage') }}">Test Page using mPDF </a>
                    <a class="btn btn-primary" href="{{url('/clssec-gradeStatus') }}">Class Sec Subject Grade </a>  --}}

                    {{--  <a class="btn btn-primary" href="{{url('/clssec-gradeDstatus/1/1') }}">Class Sec Grade D Status </a>  --}}

                    {{--  <button type="button" class="btn btn-primary btnModal" data-toggle="modal" data-target="#exampleModalLong">
                            Launch demo modal
                    </button>  --}}
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#1a" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#2a" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#3a" data-toggle="tab">Messages</a></li>
                </ul>
                
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1a">
                            <h3>Contents background color is the same for the tab</h3>
                        </div>
                        <div class="tab-pane" id="2a">
                            <h3>We uses the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
                        </div>
                        <div class="tab-pane" id="3a">
                            <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                        </div>
                        <div class="tab-pane" id="4a">
                            <h3>We uses css to change the background color of the content to be equal to the tab</h3>
                        </div>
                    </div>


            </div>
        </div>
    </div>
</div>





















{{--  <div id="Modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>  --}}



{{--  
@foreach(getTableColumns('studentdbs') as $abc)
    {{$abc}}
@endforeach  
--}}
{{--  @endsection  --}}


<script type="text/javascript">
$(document).ready(function(e){

    $('.btnModal').on('click', function(){
        $('#Modal').modal('show');  
    });
});  
</script>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
  



  {{--  Simple Ideas
Print View
One of the main items that we use this package for is to have QrCodes in all of our print views. This allows our customers to return to the original page after it is printed by simply scanning the code. We achieved this by adding the following into our footer.blade.php file.

<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
</div>
Embed A QrCode
You may embed a qrcode inside of an e-mail to allow your users to quickly scan. The following is an example of how to do this with Laravel.

//Inside of a blade template.
<img src="{!!$message->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}">

Usage
Basic Usage
Using the QrCode Generator is very easy. The most basic syntax is:

QrCode::generate('Make me into a QrCode!');
This will make a QrCode that says "Make me into a QrCode!"

Generate
Generate is used to make the QrCode.

QrCode::generate('Make me into a QrCode!');
Heads up! This method must be called last if using within a chain.

Generate by default will return a SVG image string. You can print this directly into a modern browser within Laravel's Blade system with the following:

{!! QrCode::generate('Make me into a QrCode!'); !!}
The generate method has a second parameter that will accept a filename and path to save the QrCode.

QrCode::generate('Make me into a QrCode!', '../public/qrcodes/qrcode.svg');
Format Change
QrCode Generator is setup to return a SVG image by default.

Watch out! The format method must be called before any other formatting options such as size, color, backgroundColor, and margin.

Three formats are currently supported; PNG, EPS, and SVG. To change the format use the following code:

QrCode::format('png');  //Will return a PNG image
QrCode::format('eps');  //Will return a EPS image
QrCode::format('svg');  //Will return a SVG image
Size Change
QrCode Generator will by default return the smallest size possible in pixels to create the QrCode.

You can change the size of a QrCode by using the size method. Simply specify the size desired in pixels using the following syntax:

QrCode::size(100);
Color Change
Be careful when changing the color of a QrCode. Some readers have a very difficult time reading QrCodes in color.

All colors must be expressed in RGB (Red Green Blue). You can change the color of a QrCode by using the following:

QrCode::color(255,0,255);
Background color changes are also supported and be expressed in the same manner.

QrCode::backgroundColor(255,255,0);
Margin Change
The ability to change the margin around a QrCode is also supported. Simply specify the desired margin using the following syntax:

QrCode::margin(100);
Error Correction
Changing the level of error correction is easy. Just use the following syntax:

QrCode::errorCorrection('H');
The following are supported options for the errorCorrection method.

Error Correction	Assurance Provided
L	7% of codewords can be restored.
M	15% of codewords can be restored.
Q	25% of codewords can be restored.
H	30% of codewords can be restored.
The more error correction used; the bigger the QrCode becomes and the less data it can store. Read more about error correction.

Encoding
Change the character encoding that is used to build a QrCode. By default ISO-8859-1 is selected as the encoder. Read more about character encoding You can change this to any of the following:

QrCode::encoding('UTF-8')->generate('Make me a QrCode with special symbols ♠♥!!');
Character Encoder
ISO-8859-1
ISO-8859-2
ISO-8859-3
ISO-8859-4
ISO-8859-5
ISO-8859-6
ISO-8859-7
ISO-8859-8
ISO-8859-9
ISO-8859-10
ISO-8859-11
ISO-8859-12
ISO-8859-13
ISO-8859-14
ISO-8859-15
ISO-8859-16
SHIFT-JIS
WINDOWS-1250
WINDOWS-1251
WINDOWS-1252
WINDOWS-1256
UTF-16BE
UTF-8
ASCII
GBK
EUC-KR
An error of Could not encode content to ISO-8859-1 means that the wrong character encoding type is being used. We recommend UTF-8 if you are unsure.

Merge
The merge method merges an image over a QrCode. This is commonly used to placed logos within a QrCode.

QrCode::merge($filename, $percentage, $absolute);

//Generates a QrCode with an image centered in the middle.
QrCode::format('png')->merge('path-to-image.png')->generate();

//Generates a QrCode with an image centered in the middle.  The inserted image takes up 30% of the QrCode.
QrCode::format('png')->merge('path-to-image.png', .3)->generate();

//Generates a QrCode with an image centered in the middle.  The inserted image takes up 30% of the QrCode.
QrCode::format('png')->merge('http://www.google.com/someimage.png', .3, true)->generate();
The merge method only supports PNG at this time. The filepath is relative to app base path if $absolute is set to false. Change this variable to true to use absolute paths.

You should use a high level of error correction when using the merge method to ensure that the QrCode is still readable. We recommend using errorCorrection('H').

Merged Logo

Merge Binary String
The mergeString method can be used to achieve the same as the merge call, except it allows you to provide a string representation of the file instead of the filepath. This is usefull when working with the Storage facade. It's interface is quite similar to the merge call.

QrCode::mergeString(Storage::get('path/to/image.png'), $percentage);

//Generates a QrCode with an image centered in the middle.
QrCode::format('png')->mergeString(Storage::get('path/to/image.png'))->generate();

//Generates a QrCode with an image centered in the middle.  The inserted image takes up 30% of the QrCode.
QrCode::format('png')->mergeString(Storage::get('path/to/image.png'), .3)->generate();
As with the normal merge call, only PNG is supported at this time. The same applies for error correction, high levels are recommened.

Advance Usage
All methods support chaining. The generate method must be called last and any format change must be called first. For example you could run any of the following:

QrCode::size(250)->color(150,90,10)->backgroundColor(10,14,244)->generate('Make me a QrCode!');
QrCode::format('png')->size(399)->color(40,40,40)->generate('Make me a QrCode!');
You can display a PNG image without saving the file by providing a raw string and encoding with base64_encode.

<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">

Helpers
What are helpers?
Helpers are an easy way to create QrCodes that cause a reader to perform a certain action when scanned.

BitCoin
This helpers generates a scannable bitcoin to send payments. More information

QrCode::BTC($address, $amount);

//Sends a 0.334BTC payment to the address
QrCode::BTC('bitcoin address', 0.334);

//Sends a 0.334BTC payment to the address with some optional arguments
QrCode::size(500)->BTC('address', 0.0034, [
    'label' => 'my label',
    'message' => 'my message',
    'returnAddress' => 'https://www.returnaddress.com'
]);
E-Mail
This helper generates an e-mail qrcode that is able to fill in the e-mail address, subject, and body.

QrCode::email($to, $subject, $body);

//Fills in the to address
QrCode::email('foo@bar.com');

//Fills in the to address, subject, and body of an e-mail.
QrCode::email('foo@bar.com', 'This is the subject.', 'This is the message body.');

//Fills in just the subject and body of an e-mail.
QrCode::email(null, 'This is the subject.', 'This is the message body.');
Geo
This helper generates a latitude and longitude that a phone can read and open the location up in Google Maps or similar app.

QrCode::geo($latitude, $longitude);

QrCode::geo(37.822214, -122.481769);
Phone Number
This helper generates a QrCode that can be scanned and then dials a number.

QrCode::phoneNumber($phoneNumber);

QrCode::phoneNumber('555-555-5555');
QrCode::phoneNumber('1-800-Laravel');
SMS (Text Messages)
This helper makes SMS messages that can be prefilled with the send to address and body of the message.

QrCode::SMS($phoneNumber, $message);

//Creates a text message with the number filled in.
QrCode::SMS('555-555-5555');

//Creates a text message with the number and message filled in.
QrCode::SMS('555-555-5555', 'Body of the message');
WiFi
This helpers makes scannable QrCodes that can connect a phone to a WiFI network.

QrCode::wiFi([
    'encryption' => 'WPA/WEP',
    'ssid' => 'SSID of the network',
    'password' => 'Password of the network',
    'hidden' => 'Whether the network is a hidden SSID or not.'
]);

//Connects to an open WiFi network.
QrCode::wiFi([
    'ssid' => 'Network Name',
]);

//Connects to an open, hidden WiFi network.
QrCode::wiFi([
    'ssid' => 'Network Name',
    'hidden' => 'true'
]);

//Connects to an secured, WiFi network.
QrCode::wiFi([
    'ssid' => 'Network Name',
    'encryption' => 'WPA',
    'password' => 'myPassword'
]);
WiFi scanning is not currently supported on Apple Products.


Common QrCode Usage
You can use a prefix found in the table below inside the generate section to create a QrCode to store more advanced information:

QrCode::generate('http://www.simplesoftware.io');
Usage	Prefix	Example
Website URL	http://	http://www.simplesoftware.io
Secured URL	https://	https://www.simplesoftware.io
E-mail Address	mailto:	mailto:support@simplesoftware.io
Phone Number	tel:	tel:555-555-5555
Text (SMS)	sms:	sms:555-555-5555
Text (SMS) With Pretyped Message	sms:	sms::I am a pretyped message
Text (SMS) With Pretyped Message and Number	sms:	sms:555-555-5555:I am a pretyped message
Geo Address	geo:	geo:-78.400364,-85.916993
MeCard	mecard:	MECARD:Simple, Software;Some Address, Somewhere, 20430;TEL:555-555-5555;EMAIL:support@simplesoftware.io;
VCard	BEGIN:VCARD	See Examples
Wifi	wifi:	wifi:WEP/WPA;SSID;PSK;Hidden(True/False)

Usage Outside of Laravel
You may use this package outside of Laravel by instantiating a new BaconQrCodeGenerator class.

use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

$qrcode = new BaconQrCodeGenerator;
$qrcode->size(500)->generate('Make a qrcode without Laravel!');  --}}