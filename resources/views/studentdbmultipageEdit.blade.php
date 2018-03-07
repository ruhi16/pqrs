@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>New Student Details Edit Page</h1>


<form class="form-horizontal" method="post" action="{!! url('studentdbmultipageEdit-submit') !!}" id="sform" role="form" data-toggle="validator">
  {{ csrf_field() }}
      <div class="panel panel-default">
      {{--  <div class="panel-heading">Official Details</div>  --}}
      <div class="panel-body">
      
      <input type="hidden" value="{{ $stddbInd->id }}" name="editId">

      <div class="alert alert-info" role="alert">Admission Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="admBookNo">Book No:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="admBookNo" id="admBookNo" value="{{ $stddbInd->admBookNo }}" value="{{ $stddbInd->id }}">
        </div>

        <label class="control-label col-sm-1" for="admSlNo">Sl No:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="admSlNo" id="admSlNo" value="{{ $stddbInd->admSlNo }}">
        </div>

        <label class="control-label col-sm-2" for="admDate">Adm. Date:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="admDate" id="datepicker1" value="{{ $stddbInd->admDate }}">
        </div>      
      </div> {{-- end of form-group --}}
      <div class="form-group">      
        <label class="control-label col-sm-2" for="admCrCls">Current Class:</label>
        <div class="col-sm-2">          
          {{--  {{//$allClss->dump() }}  --}}
          <select class="form-control" name="admCrCls" id="admCrCls">
          <option value=""></option>
          @foreach($allClss as $aClss)            
              <option value="{{ $aClss->name }}" {{ $aClss->id == $stddbInd->stclss_id ? 'selected':'' }}>{{ $aClss->name }}</option>            
          @endforeach
          </select>
          {{--  <input type="text" class="form-control" name="admCrCls" id="admCrCls" value="{{ $stddbInd->id }}">  --}}
        </div> 

        <label class="control-label col-sm-1" for="admPrCls">Pr. Class:</label>
        <div class="col-sm-2">
          <select class="form-control" name="admPrCls" id="admPrCls">
            <option value=""></option>
              <option value="IV" {{$stddbInd->prCls == 'IV'?'selected':''}}>IV</option>
          @foreach($allClss as $aClss)            
              <option value="{{ $aClss->name }}"  {{$stddbInd->prCls == $aClss->name ? 'selected':''}}>{{ $aClss->name }}</option>            
          @endforeach
          </select>
          {{--  <input type="text" class="form-control" name="admPrCls" id="admPrCls" value="{{ $stddbInd->id }}">  --}}
        </div> 
        
        <label class="control-label col-sm-2" for="admPrSch">Previous School:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="admPrSch" id="admPrSch" value="{{ $stddbInd->prSch }}">
        </div> 
      </div> {{-- end of form-group --}}
      
      {{--  Personal Details Section  --}}
      <div class="alert alert-warning" role="alert">Personal Details</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stName">Student Name:</label>
        <div class="col-sm-4">
          <input type="text-uppercase" class="form-control" name="stName" id="stName" value="{{ $stddbInd->name }}">
        </div>
        <label class="control-label col-sm-3" for="stAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stAdhaar" id="stAdhaar" value="{{ $stddbInd->adhaar }}">
        </div>
      </div> {{-- end of form-group --}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="stFName">Father Name:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="stFName" id="stFName" value="{{ $stddbInd->fname }}">
        </div>

        <label class="control-label col-sm-2" for="stFAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stFAdhaar" id="stFAdhaar" value="{{ $stddbInd->fadhaar }}">
        </div>
      </div> {{-- end of form-group --}}
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="stMName">Mother Name:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="stMName" id="stMName" value="{{ $stddbInd->mname }}">
        </div>

        <label class="control-label col-sm-2" for="stMAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stMAdhaar" id="stMAdhaar" value="{{ $stddbInd->madhaar }}">
        </div>
      </div> {{-- end of form-group --}}

      <div class="form-group">
        <label class="control-label col-sm-2" for="stDob">Date of Birth:</label>
        <div class="col-sm-3">          
          <input type="text" class="form-control" name="stDob" id="datepicker2" value="{{ $stddbInd->dob }}">
        </div>

        <label class="control-label col-sm-1" for="stSex">Gender:</label>
        <div class="col-sm-2">
        <select class="form-control" name="stSex" id="stSex">
            <option value=""></option>            
          @foreach($allOptn as $aO)
            @if($aO->tabName == 'studentdbs' && $aO->fieldName == 'ssex')
              <option value="{{ $aO->options }}" {{$stddbInd->ssex == $aO->options?'selected':''}}>{{ $aO->options }}</option>
            @endif
          @endforeach
        </select>
          {{--  <input type="text" class="form-control" name="stSex" id="stSex" value="{{ $stddbInd->id }}">  --}}
        </div>
        <label class="control-label col-sm-2" for="stPhCh">Physical Challenged:</label>
        <div class="col-sm-2">
        <select class="form-control" name="stPhCh" id="stPhCh">
            <option value=""></option>            
          @foreach($allOptn as $aO)
            @if($aO->tabName == 'studentdbs' && $aO->fieldName == 'phch')
              <option value="{{ $aO->options }}" {{$stddbInd->phch == $aO->options?'selected':''}}>{{ $aO->options }}</option>
            @endif
          @endforeach
        </select>
          {{--  <input type="text" class="form-control" name="stPhCh" id="stPhCh" value="{{ $stddbInd->id }}">  --}}
        </div>
      </div> {{-- end of form-group --}}
  

      <div class="form-group">
        <label class="control-label col-sm-2" for="stRelg">Religion:</label>
        <div class="col-sm-3">
        <select class="form-control" name="stRelg" id="stRelg">
            <option value=""></option>            
          @foreach($allOptn as $aO)
            @if($aO->tabName == 'studentdbs' && $aO->fieldName == 'relg')
              <option value="{{ $aO->options }}" {{$stddbInd->relg == $aO->options?'selected':''}}>{{ $aO->options }}</option>
            @endif
          @endforeach
        </select>
          {{--  <input type="text" class="form-control" name="stRelg" id="stRelg" value="{{ $stddbInd->id }}">  --}}
        </div>

        <label class="control-label col-sm-1" for="stCaste">Cast:</label>
        <div class="col-sm-2">
        <select class="form-control" name="stCaste" id="stCaste">
            <option value=""></option>            
          @foreach($allOptn as $aO)
            @if($aO->tabName == 'studentdbs' && $aO->fieldName == 'cste')
              <option value="{{ $aO->options }}" {{$stddbInd->cste == $aO->options?'selected':''}}>{{ $aO->options }}</option>
            @endif
          @endforeach
        </select>
          {{--  <input type="text" class="form-control" name="stCaste" id="stCaste" value="{{ $stddbInd->id }}">  --}}
        </div>
        <label class="control-label col-sm-2" for="stNatn">Nationality:</label>
        <div class="col-sm-2">
        <select class="form-control" name="stNatn" id="stNatn">
            <option value=""></option>            
          @foreach($allOptn as $aO)
            @if($aO->tabName == 'studentdbs' && $aO->fieldName == 'natn')
              <option value="{{ $aO->options }}"{{$stddbInd->natn == $aO->options?'selected':''}}>{{ $aO->options }}</option>
            @endif
          @endforeach
        </select>
          {{--  <input type="text" class="form-control" name="stNatn" id="stNatn" value="{{ $stddbInd->id }}">  --}}
        </div>
      </div> {{-- end of form-group --}}

      <div class="alert alert-warning" role="alert">Address Details</div>      
      <div class="form-group">
        <label class="control-label col-sm-2" for="stVill">Vill:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stVill" id="stVill" value="{{ $stddbInd->vill }}">
        </div>

        <label class="control-label col-sm-1" for="stPO">PO:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stPO" id="stPO" value="{{ $stddbInd->post }}">
        </div>
        <label class="control-label col-sm-1" for="stPS">PS:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stPS" id="stPS" value="{{ $stddbInd->pstn }}">
        </div>
      </div> {{-- end of form-group --}}



      <div class="form-group">
        <label class="control-label col-sm-2" for="stDist">District:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stDist" id="stDist" value="{{ $stddbInd->dist }}">
        </div>

        <label class="control-label col-sm-1" for="stPin">PIN:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stPin" id="stPin" value="{{ $stddbInd->pin }}">
        </div>
        <label class="control-label col-sm-1" for="stMob">Mobile:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stMob" id="stMob" value="{{ $stddbInd->mobl }}">
        </div>
      </div> {{-- end of form-group --}}
      

      <div class="alert alert-danger" role="alert">Bank Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stAccNo">Account No:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stAccNo" id="stAccNo" value="{{ $stddbInd->accNo }}">
        </div>

        <label class="control-label col-sm-2" for="stIFSC">IFSC CODE</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stIFSC" id="stIFSC" value="{{ $stddbInd->ifsc }}">
        </div>

        <label class="control-label col-sm-2" for="stMICR">MICR Code</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stMICR" id="stMICR" value="{{ $stddbInd->micr }}">
        </div>      
      </div> {{-- end of form-group --}}
      
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stBnName">Bank Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="stBnName" id="stBnName" value="{{ $stddbInd->bnnm }}">
        </div>

        <label class="control-label col-sm-2" for="stBrName">Branch Name/Code:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="stBrName" id="stBrName" value="{{ $stddbInd->brnm }}">
        </div>

      </div> {{-- end of form-group --}}




      
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
          </div>
        </div>
      </div> {{-- end of form-group --}}


      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-1">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        {{--  <div class="col-sm-8">
          <button type="reset" class="btn btn-default">Reset</button>
        </div>  --}}
      </div> {{-- end of form-group --}}
  



    </div> {{-- end of form-body --}}
    </div>
    
    </div>
  

</form>

































{{--  
  <h2>Accordion Example</h2>
  <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
  
  
  
  <div class="panel-group" id="accordion">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Collapsible Group 1</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Pannel 01</div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Pannel 02</div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Pannel 03</div>
      </div>
    </div>


    
  </div> 
  --}}
  <!-- Datepicker CDN-->  
  <link rel="stylesheet" href="{{url('datepicker/jquery-ui.css')}}">
  <script src="{{url('datepicker/jquery-ui.js')}}"></script>
 


<script type="text/javascript">
  $(document).ready(function(e){
    $('#datepicker1').each(function(){
      $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
        });
    });

    $('#datepicker2').each(function(){
      $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
        });
    });
  });
</script>
{{--  Validator CDN  --}}
<link rel="stylesheet" href="{{url('validator/bootstrapValidator.min.js')}}"/>
<script type="text/javascript" src="{{url('validator/bootstrapValidator.min.js')}}"> </script>



<script  type="text/javascript" >
$(document).ready(function() {
  //alert("hhh");
  $('#sform').bootstrapValidator({
        message: 'This value is not valid',
        framework: 'bootstrap',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            admBookNo: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    }
                }
            },
            admSlNo: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },
                integer: {
                        message: 'The value is not an integer'
                    }
              }
            },
            admDate: {
              validators: {                
                date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    },
                notEmpty: {
                    message: 'The field cannot be empty'
                }
              }
            },
            admCrCls: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            admPrCls: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            admPrSch: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            stName: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            stAdhaar: {
              validators: {
                notEmpty: {
                    message: 'The field cannot be empty'
                    },
                integer: {
                        message: 'The value is not an integer'
                    },
                stringLength:{
                    min:12,
                    max:12,
                    message: 'The adhaar must contain 12 integer'
                }
              }
            },
            stFName: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            stFAdhaar: {
              validators: {
                notEmpty: {
                    message: 'The field cannot be empty'
                    },
                integer: {
                        message: 'The value is not an integer'
                    },
                stringLength:{
                    min:12,
                    max:12,
                    message: 'The adhaar must contain 12 integer'
                }
              }
            },
            stMName: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    },                            
                regexp: {
                    regexp: /^[a-z\s]+$/i,
                    message: 'The full name can consist of alphabetical characters and spaces only'
                }
              }
            },
            stMAdhaar: {
              validators: {
                notEmpty: {
                    message: 'The field cannot be empty'
                    },
                integer: {
                        message: 'The value is not an integer'
                    },
                stringLength:{
                    min:12,
                    max:12,
                    message: 'The adhaar must contain 12 integer'
                }
              }
            },
            stDob: {
              validators: {                
                date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                },
                notEmpty: {
                        message: 'The field cannot be empty'
                }
              }
            },
            stSex: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stPhCh: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stRelg: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stCaste: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stNatn: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stVill: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stPO: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stPS: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stDist: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stPin: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            },
            stMob: {
              validators: {
                notEmpty: {
                        message: 'The field cannot be empty'
                    }
              }
            }

            
        }
  });

});


</script>



<script type="text/javascript">
    {{--  $(function(){
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
      });
    });  --}}
    {{--  $('#datepicker').datepicker();   --}}

    
</script>


@endsection

@section('footer')
	{{--  @include('layouts.footer')  --}}
@endsection
