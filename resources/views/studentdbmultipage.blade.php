@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>New Student Details Entry Form</h1>


<form class="form-horizontal" method="post" action="{!! url('studentdbmultipage-submit') !!}" >
  {{ csrf_field() }}
      <div class="panel panel-default">
      {{--  <div class="panel-heading">Official Details</div>  --}}
      <div class="panel-body">

      <div class="alert alert-info" role="alert">Admission Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="admBookNo">Book No:</label>
        <div class="col-sm-1">
          <input type="text" class="form-control" name="admBookNo" id="admBookNo" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="admSlNo">Sl No</label>
        <div class="col-sm-1">
          <input type="text" class="form-control" name="admSlNo" id="admSlNo" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="admDate">Adm. Date</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="admDate" id="admDate" placeholder="">
        </div>      
      </div> {{-- end of form-group --}}
      <div class="form-group">      
        <label class="control-label col-sm-2" for="admCrCls">Current Class:</label>
        <div class="col-sm-1">
          <input type="text" class="form-control" name="admCrCls" id="admCrCls" placeholder="">
        </div> 

        <label class="control-label col-sm-1" for="admPrCls">Pr. Class:</label>
        <div class="col-sm-1">
          <input type="text" class="form-control" name="admPrCls" id="admPrCls" placeholder="">
        </div> 
        
        <label class="control-label col-sm-2" for="admPrSch">Previous School:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="admPrSch" id="admPrSch" placeholder="">
        </div> 
      </div> {{-- end of form-group --}}
      
      {{--  Personal Details Section  --}}
      <div class="alert alert-warning" role="alert">Personal Details</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stName">Student Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="stName" id="stName" placeholder="">
        </div>
        <label class="control-label col-sm-3" for="stAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stAdhaar" id="stAdhaar" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="stFName">Father Name:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="stFName" id="stFName" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="stFAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stFAdhaar" id="stFAdhaar" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="stMName">Mother Name:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="stMName" id="stMName" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="stMAdhaar">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stMAdhaar" id="stMAdhaar" placeholder="">
        </div>
      </div> {{-- end of form-group --}}

      <div class="form-group">
        <label class="control-label col-sm-2" for="stDob">Date of Birth:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stDob" id="stDob" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="stSex">Gender:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stSex" id="stSex" placeholder="">
        </div>
        <label class="control-label col-sm-2" for="stPhCh">Physical Challenged:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stPhCh" id="stPhCh" placeholder="">
        </div>
      </div> {{-- end of form-group --}}


      <div class="form-group">
        <label class="control-label col-sm-2" for="stRelg">Religion:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stRelg" id="stRelg" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="stCaste">Cast:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stCaste" id="stCaste" placeholder="">
        </div>
        <label class="control-label col-sm-2" for="stNatn">Nationality:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stNatn" id="stNatn" placeholder="">
        </div>
      </div> {{-- end of form-group --}}

      <div class="alert alert-warning" role="alert">Address Details</div>      
      <div class="form-group">
        <label class="control-label col-sm-2" for="stVill">Vill:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stVill" id="stVill" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="stPO">PO:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stPO" id="stPO" placeholder="">
        </div>
        <label class="control-label col-sm-1" for="stPS">PS:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stPS" id="stPS" placeholder="">
        </div>
      </div> {{-- end of form-group --}}



      <div class="form-group">
        <label class="control-label col-sm-2" for="stDist">District:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stDist" id="stDist" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="stPin">PIN:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stPin" id="stPin" placeholder="">
        </div>
        <label class="control-label col-sm-1" for="stMob">Mobile:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="stMob" id="stMob" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      

      <div class="alert alert-danger" role="alert">Bank Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stAccNo">Account No:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stAccNo" id="stAccNo" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="stIFSC">IFSC CODE</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stIFSC" id="stIFSC" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="stMICR">MICR Code</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="stMICR" id="stMICR" placeholder="">
        </div>      
      </div> {{-- end of form-group --}}
      
      <div class="form-group">      
        <label class="control-label col-sm-2" for="stBankName">Bank Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="stBankName" id="stBankName" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="stBrName">Branch Name/Code:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="stBrName" id="stBrName" placeholder="">
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-8">
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
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


<script type="text/javascript">
  $(document).ready(function(e){
 

  });  
</script>

@endsection

@section('footer')
	{{--  @include('layouts.footer')  --}}
@endsection
