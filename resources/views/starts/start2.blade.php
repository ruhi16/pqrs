@extends('layouts.baselayout')
@section('title','Home')
@section('header')
	@include('layouts.navbar')
@endsection
@section('content')



        {{--  <div class='row'>
            <div class='col-md-12'>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNewNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>                        
                            </button>
                            <a class="navbar-brand" href="#">WebSiteName</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNewNavbar">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                            </ul>
                            <p class="navbar-text">Some text</p>



                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>  --}}



        <div class='row'>
            {{--  <div class='col-md-3 sidebar'>
                <!-- menu -->
                <div id="MainMenu">
                    <div class="list-group panel">
                    <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 1</a>
                    <a href="#" class="list-group-item list-group-item-success" data-parent="#MainMenu">Item 2</a>
                    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 3 <span class='glyphicon glyphicon-menu-down'></span></a>
                    <div class="collapse" id="demo3">
                        <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Subitem 1 <span class='glyphicon glyphicon-menu-down'></span></a>
                        <div class="collapse list-group-submenu" id="SubMenu1">
                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
                        <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <span class='glyphicon glyphicon-menu-down'></span></i></a>
                        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
                        </div>
                        <a href="javascript:;" class="list-group-item">Subitem 2</a>
                        <a href="javascript:;" class="list-group-item">Subitem 3</a>
                    </div>
                    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4  <span class='glyphicon glyphicon-menu-down'></span></a>
                    <div class="collapse" id="demo4">
                        <a href="" class="list-group-item">Subitem 1</a>
                        <a href="" class="list-group-item">Subitem 2</a>
                        <a href="" class="list-group-item">Subitem 3</a>
                    </div>
                    </div>
                </div>
            </div>  --}}

            <div class='col-md-12 main'>                    
                <h2><b>Second Dashboard</b></h2>
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
                                                                {{-- :{{ $stdcrs->where('clss_id',$clsc->clss->id)
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
                                    {{-- //for Summative Exam...... --}}
                                    <tr>                        
                                        <td>All Classes</td>
                                        @foreach($exams as $exam)
                                            <td class="text-center">
                                                <a href="{{ url('/answerScript-clss-sectionStatus', [$exam->id, 4, 0]) }}">Summative Exam Status</a> /
                                                <a href="{{ url('/answerScript-clss-sectionStatus', [$exam->id, 2, 1]) }}">in PDF</a>
                                                
                                            </td>
                                        @endforeach
                                    </tr>  

                                    {{-- //for Formative Exam...... --}}
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



                
            </div>                        
        </div>

        

            {{--  <div class='col-md-9'>
                <p>Hello 9</p>

            </div>  --}}
        </div>






























@endsection

@section('footer')
    @include('layouts.footer')
@endsection
  