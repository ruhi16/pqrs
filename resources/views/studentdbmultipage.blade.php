@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Test...</h1>


<form class="form-horizontal">
  

    
      <div class="panel panel-default">
      {{--  <div class="panel-heading">Official Details</div>  --}}
      <div class="panel-body">
      
      
    <div class="page-header">
      <h1>Office Details <small>Must Enter...</small></h1>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Adm. Book No:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <label class="control-label col-sm-2" for="email">Adm. Sl No</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <label class="control-label col-sm-2" for="email">Adm. Date</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div> {{-- end of form-group --}}


      <div class="page-header">
        <h1>Student Details <small>Must Enter...</small></h1>
      </div>      
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Name:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <label class="control-label col-sm-1" for="">DoB:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <label class="control-label col-sm-1" for="">Gender:</label>
        <div class="col-sm-2">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>

      </div> {{-- end of form-group --}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="">Father Name:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <label class="control-label col-sm-2" for="">Mother Name:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
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
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
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
