@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Type Specification Entry Page...</h1>
<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">
        Exam Type Specifications Details
            </h3>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
          Add New Exam Type Specification
        </button>
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>#</th>
          <th>Exam Tyype</th>
          <th>Mode</th>
          <th>Session</th>          
          <th>Status</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($extypes as $extype)
        <tr id="tr{{$extype->id}}">
          <th id="id">{{$extype->id}}</th>
          <th id="name">{{ $extype->name }}</th>
          <th id="mode">{{ $extype->mode }}</th>
          <td>{{ $extype->session_id }}</td>
          <td>{{ $extype->session_id }}</td>
          <td>
              <button class="btn btn-success btn-sm btnEdit" data-id="{{$extype->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
              <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$extype->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
              {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
          </td>
        </tr>
      @endforeach
			</tbody>
		</table>
  </div><!--/panel starting div -->
</div><!--/1st row within 2nd column -->





<!-- Modal Starts to Add New Exams -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/extypes-submit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enter New Exam Type Specification...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-2" for="extypeName">Exam Type:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="extypeName" name="extypeName" placeholder="Exam Type">
					</div>

          <label class="control-label col-sm-2" for="extypeMode">Exam Mode:</label>					
          <div class="col-sm-3">
            <select class="form-control" name="extypeMode" id="exmd">
                <option value="0"></option>
                @foreach($exmodes as $mode)              
                  <option value="{{$mode->options}}">{{$mode->options}}</option>              
                @endforeach
            </select>            
          </div>

      	</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal Ends -->


<!-- Modal Starts to Edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/extypes-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit or Update Exam Types...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-2" for="editclssName">Exam Type:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="editclssId" name="editclssName" placeholder="enter new exam term name">
					</div>         
          <div class="col-sm-6">
						<input type="hidden" class="form-control" id="editclssId" name="editclssId" placeholder="enter new exam term name">
					</div>

          <label class="control-label col-sm-2" for="editextypeMode">Exam Mode:</label>					
          <div class="col-sm-3 editSelect">
            <select class="form-control" name="editextypeMode" id="editexmd">
                <option value="0"></option>
                @foreach($exmodes as $mode)              
                  <option value="{{$mode->options}}">{{$mode->options}}</option>              
                @endforeach
            </select>            
          </div>       
      	</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal Ends -->


<!-- Modal Starts to Delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/extypes-deltsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Do You Want to Delete Exam Type Specification...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-2" for="deltclssName">Exam Type:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="deltclssId" name="deltclssName" placeholder="Exam Type" readOnly>
					</div>         
          <div class="col-sm-6">
						<input type="hidden" class="form-control" id="deltclssId" name="deltclssId">
					</div>  

          <label class="control-label col-sm-2" for="deltextypeMode">Exam Mode:</label>					
          <div class="col-sm-3 deltSelect">
            <select class="form-control" name="deltextypeMode" id="deltexmd" disabled>
                <option value="0"></option>
                @foreach($exmodes as $mode)              
                  <option value="{{$mode->options}}">{{$mode->options}}</option>              
                @endforeach
            </select>            
          </div>        
      	</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal Ends -->



<script type="text/javascript">
  $(document).ready(function(e){    
    $('.btnEdit').on('click', function(){
      var v = $(this).data('id');
      var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
      var name = $("#tabclss #tr"+v+" #name").text();
      var mode = $("#tabclss #tr"+v+" #mode").text();
       //alert(mode);


      $('input[name="editclssName"]').val(name);
      $('input[name="editclssId"]').val(v);
      $("div.editSelect select").val(mode);
      //$('select[name="editextypeMode"]').find('option:contains('+mode+')').attr("selected",true);

      //$('#editModal').modal('show');
    });

    $('.btnDelt').on('click', function(){
      var v = $(this).data('id');
      var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
      var name = $("#tabclss #tr"+v+" #name").text();
      var mode = $("#tabclss #tr"+v+" #mode").text();
      //alert(name);

      $('input[name="deltclssName"]').val(name);
      $('input[name="deltclssId"]').val(v);
      $("div.deltSelect select").val(mode);  
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
