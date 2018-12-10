@extends('layouts.baselayout')
@section('title','Home')
@section('header')
	@include('layouts.navbar')
@endsection
@section('content')



        <div class='row'>
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
        </div>



        <div class='row'>
            <div class='col-md-3 sidebar'>
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
            </div>

            <div class='col-md-9 main'>                    
                <h3>Dashboard</h3>

                
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
  