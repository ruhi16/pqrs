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
  



  