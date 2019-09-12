    <nav class="navbar navbar-default">
      <div class="container">
        @if (Auth::check()) 
        <div class="navbar-header">
          @if( Auth::user()->role->name == 'Admin')
          <a class="navbar-brand" href="{!! url('/start') !!}">Dashboard</a>
          @endif
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">          
          
              <ul class="nav navbar-nav">
                @if( Auth::user()->role->name == 'Admin')
                <li><a href="{{url('/studentdbmultipage-search')}}">Home Page</a></li>
                @endif
                {{--  <li class="dropdown">
                  <a href="{!! url('/start') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Students <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Student Search</a></li>                    
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Exam</a></li>                    
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>  --}}

                @if( Auth::user()->role->name == 'Admin')
                <li class="dropdown">
                  <a href="{!! url('/start') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Admission <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/studentdb')}}">New Admission</a></li>
                    <li><a href="{{url('/studentdbmultipage-view')}}">Newly Admited Student</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{url('/start2')}}">Other Details</a></li>
                    {{--  <li><a href="{{url('/studentdbmultipage-listToUpdateSection')}}">Section Allotment</a></li>  --}}
                  </ul>
                </li>
                @endif

                {{--  <li class="dropdown">
                  <a href="{!! url('/start') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Exam <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Schedule</a></li>
                    <li><a href="{{url('/answerScript-taskpane')}}">Answer Script Distribution</a></li>
                    <li><a href="{{url('/home')}}">Answer Script Distribution Summary</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{url('/exmtypclssubTaskpane')}}">Class & Subject wish FM PM Entry</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Class Wise Promotional Rules</a></li>
                  </ul>
                </li>  --}}

                {{--  <li class="dropdown">
                  <a href="{!! url('/start') !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Class-Section <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/clssec-TaskPage')}}">Class Teacher</a></li>
                    <li><a href="#">Issue Roll</a></li>
                    <li><a href="#">Daily Attendance</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Marks Entry Status</a></li>
                    <li><a href="#">Formative Marks Entry & Finalize</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Final Marks Register</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Class-Section wise Merit List</a></li>
                    <li><a href="#">Class wise Merit List</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Mark Register with Ds List & Promotional Status</a></li>
                    <li><a href="#">Compact Mark Register Finalize & Generate Result</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Transfer to New Session & Finalize</a></li>
                    <li><a href="#">Transfered Students List</a></li>
                  </ul>                
                </li>  --}}
                
                {{--  <li class="dropdown"></a>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Teachers <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/teachers-view')}}">Teacher List</a></li>                    
                    <li><a href="#">Class Teachers Dashboard</a></li>
                    <li><a href="{{url('/teachers')}}">New Teachers Entry</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Marks Entry & Finalize</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Teachers Message Center</a></li>                    
                  </ul>
                </li>  --}}
                {{--  <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Miscellenious <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/finalizeSessions')}}">Finalize Status View</a></li>
                    <li><a href="{{url('/finalizeParticulars')}}">Finalize Status Update</a></li>  
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Class-Teacher Assignment</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">User Password Change</a></li>                                        
                  </ul>
                </li>  --}}
                {{--  <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Reports <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>  
                    <li role="separator" class="divider"></li>
                    <li><a href="#"></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"></a></li>                                        
                  </ul>
                </li>  --}}
                
                
                
                {{--  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Settings <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/school')}}">School Profile Entry</a></li>
                    <li><a href="{{url('/session')}}">Session Setup</a></li>
                    <li><a href="">Class Initialization</a></li>
                    <li><a href="#">Section Allotment</a></li>
                    <li><a href="#">Subject Assignment</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Exam</a></li>
                    <li><a href="#">Exam Type</a></li>
                    <li><a href="#">Grade</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
              </li>  --}}

              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-brand"><small><b>{{ Auth::user()->name }}</b>({{ Auth::user()->role->name }})</small></p></li>
                <li><a href="{{ url('/get-logout') }}">Log Out</a></li>
              </ul>
          @else
              <ul class="nav navbar-nav navbar-right">
                {{--  <li><a href="{!! url('/register') !!}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>  --}}
                <li><a href="{!! url('/loginCredencial') !!}"><span class="glyphicon glyphicon-log-in"></span> Login Credencial</a></li>
                <li><a href="{!! url('/login') !!}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
          @endif
      </div>
      </div>
    </nav>