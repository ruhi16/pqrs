@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Sections Entry Page...</h1>
<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">
        Section Details
            </h3>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
          Add New Section
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
          <th class="text-center">Subject Name</th>   
          <th>Subject Code</th>   
          <th>Subject Type</th>
          <th>Session</th> 
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($subjects as $subject)
        <tr id="tr{{$subject->id}}">
          <th id="id">{{$subject->id}}</th>
          <th id="name">{{ $subject->name }}</th>
          <th id="code">{{ $subject->code }}</th>
          <td id="type">{{ $subject->extype->name }}</td>
          <td>{{ $subject->session_id }}</td>
          <td>
              <button class="btn btn-success btn-sm btnEdit" data-id="{{$subject->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
              <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$subject->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
              {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
          </td>
        </tr>
      @endforeach
			</tbody>
		</table>
  </div><!--/panel starting div -->
</div><!--/1st row within 2nd column -->





<!-- Modal Starts to Add New Subject -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/subjects-submit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enter New Subject...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-2" for="subjectName">Subject:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="subject name">
					</div> 
        
        	<label class="control-label col-sm-2" for="subjectCode">Code:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="subjectCode" name="subjectCode" placeholder="4 Letter Subj Code">
					</div> 
        
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="subjectType">Type:</label>
          <div class="col-sm-4">
            <select class="form-control" name="subjectType" id="subjectType">
              <option value="0">                          </option>
              @foreach($extypes as $extype)              
                <option value="{{$extype->id}}">{{ $extype->name }}-{{ $extype->mode }}</option>              
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
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/subjects-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit or Update Section...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-2" for="subjectEditName">Subject:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="subjectEditName" name="subjectEditName" placeholder="subject name">
					</div> 
        
        	<label class="control-label col-sm-2" for="subjectEditCode">Code:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="subjectEditCode" name="subjectEditCode" placeholder="4 Letter Subj Code">
					</div>         
          <div class="col-sm-6">
						<input type="hidden" class="form-control" id="subjectEditId" name="subjectEditId" placeholder="existing exam term name">
					</div> 
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="subjectEditType">Type:</label>
          <div class="col-sm-4">
            <select class="form-control" name="subjectEditType" id="subjectEditType">
              <option value="0">                          </option>
              @foreach($extypes as $extype)              
                <option value="{{$extype->id}}">{{$extype->name}}</option>              
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
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/subjects-deltsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Do You Want to Delete Section...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-4" for="deltclssName">Section Name:</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="deltclssId" name="deltclssName" placeholder="existing exam term name" disabled>
					</div>         
          <div class="col-sm-6">
						<input type="hidden" class="form-control" id="deltclssId" name="deltclssId" placeholder="existing exam term name">
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
      var code = $("#tabclss #tr"+v+" #code").text();
      var type = $("#tabclss #tr"+v+" #type").text();
      //alert(code);


      $('input[name="subjectEditName"]').val(name);
      $('input[name="subjectEditId"]').val(v);
      $('input[name="subjectEditCode"]').val(code);
      $('select[name="subjectEditType"]').find('option:contains('+type+')').prop("selected",true)
      //$('#editModal').modal('show');
    });

    $('.btnDelt').on('click', function(){
      var v = $(this).data('id');
      var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
      var name = $("#tabclss #tr"+v+" #name").text();
      //alert(name);

      $('input[name="deltclssName"]').val(name);
      $('input[name="deltclssId"]').val(v);  
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
