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

                    You are logged in!
                    <br>
                    <a href="{{url('/clssub')}}">Class - Subject Entry</a>
                    <br>
                    <a href="{{url('/clssub-view')}}">Class - Subject View</a>
                    
                    <br>
                    <a href="{{url('/exmtypclssub')}}">Exam - Type - Class - Subject Entry</a>
                    <br>
                    <a href="{{url('/exmtypclssub-view')}}">Exam - Type - Class - Subject View</a>

                    <br>
                    <a href="{{url('/studentdb')}}">Student's Detail View</a>
                    
                    
                    <br>                    
                    <a href="{{url('/clssec')}}">Class Section Entry</a>
                    <br>
                    <a href="{{url('/clssec-view')}}">Class Section View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
