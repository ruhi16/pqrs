@extends('layouts.app')

@section('content')
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

                    
                    <br>
                    <a href="{{url('/finalizeParticulars')}}">Finalize Particulars</a>
                    
                    <br>
                    <a href="{{url('/finalizeSessions')}}">Finalize Sessions</a>

                    
                    <br>
                    <a href="{{url('/clsses')}}">Class Details Entry</a>
                    
                    <br>
                    <a href="{{url('/clsses-view')}}">Class Details Display</a>

                    <br>
                    <a href="{{url('/exams')}}">Exam Details Entry</a>
                    
                    <br>
                    <a href="{{url('/exams-view')}}">Exam Details Display</a>

                    <br>
                    <a href="{{url('/extypes')}}">Exam Type Details Entry</a>
                    
                    <br>
                    <a href="{{url('/extypes-view')}}">Exam Type Details Display</a>

                    <br>
                    <a href="{{url('/sections')}}">Section Details Entry</a>
                    
                    <br>
                    <a href="{{url('/sections-view')}}">Section Details Display</a>

                    <br>
                    <a href="{{url('/subjects')}}">Subject Details Entry</a>
                    
                    <br>
                    <a href="{{url('/subjects-view')}}">Subject Details Display</a>
                    

                    <br>
                    <a href="{{url('/grades')}}">Grade Details Entry</a>
                    
                    <br>
                    <a href="{{url('/gradesView')}}">Grade Details View</a>



                    <br>
                    <a href="{{url('/school')}}">School Details</a>
                    
                    <br>
                    <a href="{{url('/schoolView')}}">School Details View</a>

                    <br>
                    <a href="{{url('/session')}}">Session Details</a>

                    <br>
                    <a href="{{url('/clssub')}}">Class - Subject Entry</a>
                    
                    <br>
                    <a href="{{url('/clssub-view')}}">Class - Subject View</a>
                    
                    <br>
                    <a href="{{url('/exmtypclssub')}}">Exam - Type - Class - Subject Entry</a>
                    
                    <br>
                    <a href="{{url('/exmtypclssub-view')}}">Exam - Type - Class - Subject View</a>
                    
                    <br>
                    <a href="{{url('/gradeparticulars')}}">Grade particular Entry</a>
                    
                    <br>
                    <a href="{{url('/gradeparticulars-view')}}">Grade particular View</a>
                    
                    <br>
                    <a href="{{url('/gradedescription')}}">Grade Description Entry</a>
                    
                    <br>
                    <a href="{{url('/gradedescription-view')}}">Grade Description View</a>



                    <br>
                    <a href="{{url('/studentdb')}}">Student's Detail View</a>                    
                    
                    <br>                    
                    <a href="{{url('/clssecs')}}">Class Section Entry</a>
                    
                    <br>
                    <a href="{{url('/clssecs-view')}}">Class Section View</a>

                    <br>
                    <a href="{{url('/clssec-TaskPage')}}">Class Section Task Pane View</a>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
