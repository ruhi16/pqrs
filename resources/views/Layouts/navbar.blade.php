    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{!! url('/home') !!}">Dashboard</a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">          
          @if (Auth::check()) 
              <ul class="nav navbar-nav">
                <li><a href="{!! url('/start') !!}">Home Page</a></li>
                <li><a href="{!! url('/start') !!}">Students</a></li>
                <li><a href="{!! url('/start') !!}">Admission</a></li>
                <li><a href="{!! url('/start') !!}">Exam</a></li>
                <li><a href="{!! url('/start') !!}">Class</a></li>
                <li><a href="{!! url('/start') !!}">Teacher</a></li>
                <li><a href="{!! url('/start') !!}">Miscellenous</a></li>
                <li><a href="{!! url('/start') !!}">Reports</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Settings <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">School</a></li>
                    <li><a href="#">Session</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Section</a></li>
                    <li><a href="#">Subject</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Exam</a></li>
                    <li><a href="#">Exam Type</a></li>
                    <li><a href="#">Grade</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
              </li>

              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-brand"><small>{{ Auth::user()->name }}</small></p></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
              </ul>
          @else
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{!! url('/register') !!}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="{!! url('/login') !!}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
          @endif
      </div>
      </div>
    </nav>