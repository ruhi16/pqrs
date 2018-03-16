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
                    <br><a href="{{url('/gradedescription')}}">Grade Description Entry</a>                    
                    <br><a href="{{url('/gradedescription-view')}}">Grade Description View</a>
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
                    <br><a href="{{url('/teachers')}}">Teachers Details Entry Point</a>
                    <br><a href="{{url('/teachers-view')}}">Teachers Details View Point</a>                    
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
@endsection
