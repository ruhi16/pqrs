{{--  @extends('layouts.app')  --}}

{{--  @section('content')  --}}
@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<div class="row">
    
<button class="btn btn-warning"> Students </button>
<button class="btn btn-warning"> Admission </button>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="bsetingDetails" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
        Basic Setings <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="bsetingDetails">
        <li><a href="#">School/Madrasah Details</a></li>
        <li><a href="#">Current Session Setup</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Class Persueid</a></li>
        <li><a href="#">Section Divisions</a></li>
        <li><a href="#">Subject Initialization</a></li>        
        <li><a href="#">Exam Scheduled</a></li>
        <li><a href="#">Exam Type Occured</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Grade Particular Assignment</a></li>
    </ul>
</div>

<div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="csetingDetails" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
            Compount Setings <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="csetingDetails">
            <li><a href="#">Class & Section Combination</a></li>
            <li><a href="#">Class-Subject Allotment & Subject Type Specification</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Exam Exam-Type Class Subject wish Full Marks Allotment</a></li>
            <li><a href="#">Exam Type Wise Grade Specification</a></li>
            <li><a href="#">Grade Descirption</a></li>        
            
        </ul>
    </div>

<button class="btn btn-success"> Class Management</button>

<button class="btn btn-danger"> Exam Administration</button>

<button class="btn btn-info"> Teachers Section </button>
<button class="btn btn-success"> Reports Hub </button>



<div class="container">
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

                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('xyz')}}'">Test123</button>
                    You are logged in!!!!!!!
                    <br><a href="{{url('/finalizeParticulars')}}">Finalize Particulars</a>                    
                    <br><a href="{{url('/finalizeSessions')}}">Finalize Sessions</a>                    
                    <br><a href="{{url('/session')}}">Session Details</a>
                    <br><a href="{{url('/school')}}">School Details</a>                    
                    <br><a href="{{url('/schoolView')}}">School Details View</a>                    
                    <br><a href="{{url('/clsses')}}">Class Details Entry</a>                    
                    <br><a href="{{url('/clsses-view')}}">Class Details Display</a>
                    <br><a href="{{url('/sections')}}">Section Details Entry</a>                    
                    <br><a href="{{url('/sections-view')}}">Section Details Display</a>
                    <br><a href="{{url('/clssecs')}}">Class-Section Details Entry</a>
                    <br><a href="{{url('/clssecs-view')}}">Class-Section Details Display</a>
                    <br><a href="{{url('/gradedescription/1')}}">Grade Description Details Entry..</a>
                    <br><a href="{{url('/gradedescription-view')}}">Grade Description Details Display</a>
                    <br><a href="{{url('/exams')}}">Exam Details Entry</a>                    
                    <br><a href="{{url('/exams-view')}}">Exam Details Display</a>
                    <br><a href="{{url('/extypes')}}">Exam Type Details Entry</a>                    
                    <br><a href="{{url('/extypes-view')}}">Exam Type Details Display</a>                    
                    <br><a href="{{url('/subjects')}}">Subject Details Entry</a>                    
                    <br><a href="{{url('/subjects-view')}}">Subject Details Display</a>                    
                    <br><a href="{{url('/gradeparticulars')}}">Grade particular Entry</a>                    
                    <br><a href="{{url('/gradeparticulars-view')}}">Grade particular View</a>
                    <br><a href="{{url('/grades')}}">Grade Details Entry</a>                    
                    <br><a href="{{url('/gradesView')}}">Grade Details View</a>
                    <br><a href="{{url('/clssub')}}">Class - Subject Entry</a>                    
                    <br><a href="{{url('/clssub-view')}}">Class - Subject View</a>                    
                    <br><a href="{{url('/exmtypclssub')}}">Exam - Type - Class - Subject Entry (X)</a>
                    <br><a href="{{url('/exmtypclssub-view')}}">Exam - Type - Class - Subject View (X)</a>                    
                    {{--  <br><a href="{{url('/gradedescription')}}">Grade Description Entry</a>                    
                    <br><a href="{{url('/gradedescription-view')}}">Grade Description View</a>  --}}
                    <br><a href="{{url('/studentdb')}}">Students Detail View</a>                    
                    {{--  
                    <br><a href="{{url('/clssec-TaskPage')}}">Students Info Entry View</a>                    
                    <br><a href="{{url('/clssecs')}}">New Admission Students Details Entry</a>
                     --}}
                    <br><a href="{{url('/studentdbmultipage')}}">New Admission Students Details Entry Page</a>                    
                    <br><a href="{{url('/studentdbmultipage-search')}}">New Admission Students Details Search Page</a>
                    <br><a href="{{url('/studentdbmultipage-view')}}">New Admission Students Details View Page</a>
                    <br><a href="{{url('/clssec-TaskPage')}}">Class Section Task Pane View</a>
                    <br><a href="{{url('/exmtypclssubTaskpane')}}">Exam Type Class Subject Task Pane</a>
                    {{--  
                    <br><a href="{{url('/clssubjfm/1')}}">Exam Term and Class Wise Full Marks Specification Entry (V)</a>
                    <br><a href="{{url('/clssubjfm-view/1')}}">Exam Term and Class Wise Full Marks Specification View (V)</a>  
                    --}}
                    <br><a href="{{url('/teachers',[2])}}">Teachers Details Entry Point</a>
                    <br><a href="{{url('/teachers-view')}}">Teachers Details View Point</a>
                    <br><a href="{{url('/answerScript-taskpane')}}">Answer Script Distribution Point</a>

                </div>
            </div>
        </div>
    </div>
</div>



{{--  
@foreach(getTableColumns('studentdbs') as $abc)
    {{$abc}}<br>
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
  