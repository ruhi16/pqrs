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
                    <a class="btn btn-primary" href="{{url('/finalizeParticulars')}}">Finalize Particulars</a>                    
                    <a class="btn btn-warning" href="{{url('/finalizeSessions')}}">Finalize Sessions</a>                    
                    <a class="btn btn-success" href="{{url('/session')}}">Session Details</a>
                    <a class="btn btn-info" href="{{url('/schools')}}">School Details</a>                    
                    <a class="btn btn-primary" href="{{url('/schools-view')}}">School Details View</a>                    
                    <a class="btn btn-info" href="{{url('/clsses')}}">Class Details Entry</a>                    
                    <a class="btn btn-success" href="{{url('/clsses-view')}}">Class Details Display</a>
                    <a class="btn btn-primary" href="{{url('/sections')}}">Section Details Entry</a>                    
                    <a class="btn btn-success" href="{{url('/sections-view')}}">Section Details Display</a>
                    <a class="btn btn-primary" href="{{url('/clssecs')}}">Class-Section Details Entry</a>
                    <a class="btn btn-warning" href="{{url('/clssecs-view')}}">Class-Section Details Display</a>
                    <a class="btn btn-danger" href="{{url('/gradedescription/1')}}">Grade Description Details Entry..</a>
                    <a class="btn btn-success" href="{{url('/gradedescription-view')}}">Grade Description Details Display</a>
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
                    <a class="btn btn-info" href="{{url('/clssub')}}">Class - Subject Entry</a>                    
                    <a class="btn btn-danger" href="{{url('/clssub-view')}}">Class - Subject View</a>                    
                    <a class="btn btn-primary" href="{{url('/exmtypclssub')}}">Exam - Type - Class - Subject Entry (X)</a>
                    <a class="btn btn-success" href="{{url('/exmtypclssub-view')}}">Exam - Type - Class - Subject View (X)</a>                    
                    {{--  <a class="btn btn-primary" href="{{url('/gradedescription')}}">Grade Description Entry</a>                    
                    <a class="btn btn-primary" href="{{url('/gradedescription-view')}}">Grade Description View</a>  --}}
                    <a class="btn btn-primary" href="{{url('/studentdb')}}">Students Detail View</a>                    
                    {{--  
                    <a class="btn btn-primary" href="{{url('/clssec-TaskPage')}}">Students Info Entry View</a>                    
                    <a class="btn btn-primary" href="{{url('/clssecs')}}">New Admission Students Details Entry</a>
                     --}}
                    <a class="btn btn-info" href="{{url('/studentdbmultipage')}}">New Admission Students Details Entry Page</a>                    
                    <a class="btn btn-danger" href="{{url('/studentdbmultipage-search')}}">New Admission Students Details Search Page</a>
                    <a class="btn btn-warning" href="{{url('/studentdbmultipage-view')}}">New Admission Students Details View Page</a>
                    <a class="btn btn-info" href="{{url('/clssec-TaskPage')}}">Class Section Task Pane View</a>
                    <a class="btn btn-success" href="{{url('/exmtypclssubTaskpane')}}">Exam Type Class Subject Task Pane</a>
                    {{--  
                    <a class="btn btn-primary" href="{{url('/clssubjfm/1')}}">Exam Term and Class Wise Full Marks Specification Entry (V)</a>
                    <a class="btn btn-primary" href="{{url('/clssubjfm-view/1')}}">Exam Term and Class Wise Full Marks Specification View (V)</a>  
                    --}}
                    <a class="btn btn-info" href="{{url('/teachers')}}">Teachers Details Entry Point</a>
                    <a class="btn btn-primary" href="{{url('/teachers-view')}}">Teachers Details View Point</a>
                    <a class="btn btn-default" href="{{url('/answerScript-taskpane')}}">Answer Script Distribution Point</a>

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
  