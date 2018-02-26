@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>New Student Details Entry Form</h1>


<form class="form-horizontal">
      <div class="panel panel-default">
      {{--  <div class="panel-heading">Official Details</div>  --}}
      <div class="panel-body">
    
    <div class="alert alert-success" role="alert">Admission Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="">Book No:</label>
        <div class="col-sm-1">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="email">Sl No</label>
        <div class="col-sm-1">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="email">Adm. Date</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>      
      </div> {{-- end of form-group --}}
      <div class="form-group">      
        <label class="control-label col-sm-2" for="email">Current Class:</label>
        <div class="col-sm-1">
          <input type="email" class="form-control" id="email" placeholder="">
        </div> 

        <label class="control-label col-sm-1" for="email">Pr. Class:</label>
        <div class="col-sm-1">
          <input type="email" class="form-control" id="email" placeholder="">
        </div> 
        
        <label class="control-label col-sm-2" for="email">Previous School:</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" placeholder="">
        </div> 
      </div> {{-- end of form-group --}}
      
      {{--  Personal Details Section  --}}
      <div class="alert alert-warning" role="alert">Personal Details</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="">Student Name:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
        <label class="control-label col-sm-3" for="">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Father Name:</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Mother Name:</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="">Adhaar No:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Date of Birth:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="">Gender:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
        <label class="control-label col-sm-2" for="">Physical Challenged:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}


      <div class="form-group">
        <label class="control-label col-sm-2" for="">Religion:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="">Cast:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
        <label class="control-label col-sm-2" for="">Nationality:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}

      <div class="alert alert-warning" role="alert">Address Details</div>      
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Vill:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="">PO:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
        <label class="control-label col-sm-1" for="">PS:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}



      <div class="form-group">
        <label class="control-label col-sm-2" for="">District:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-1" for="">PIN:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
        <label class="control-label col-sm-1" for="">Mobile:</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>
      </div> {{-- end of form-group --}}
      

      <div class="alert alert-danger" role="alert">Bank Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-2" for="">Account No:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="email">IFSC CODE</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="email">MICR Code</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>      
      </div> {{-- end of form-group --}}
      
      <div class="form-group">      
        <label class="control-label col-sm-2" for="">Bank Name:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="">
        </div>

        <label class="control-label col-sm-2" for="email">Branch Name/Code:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="">
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
