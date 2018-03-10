@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Teachers Entry Page...</h1>
<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">
        Teachers Details
            </h3>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
          Add New Teacher
        </button>
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>SL</th>
          <th>Name</th>
          <th>Mobile</th>          
          <th>Designation</th> 
          <th>Qualification</th>         
          <th>Main Subject</th>
          <th>Other Subjects</th>
          <th>Status</th>
          <th>Notes</th>				
          <th>Action</th>         
				</tr>
			</thead>
			<tbody>
      @foreach($teachers as $teacher)
        <tr id="tr{{$teacher->id}}">
          <th id="id">{{$teacher->id}}</th>
          <th id="name">{{ $teacher->name }}</th>
          <td>{{ $teacher->mobno }}</td>
          <td>{{ $teacher->desig }}</td>
          <td>{{ $teacher->hqual }}</td>
          <td>{{ $teacher->mnsub_id }}</td>
          <td>
              @foreach($teacher->subjects as $tSub)
                {{ $tSub->name }} <br>
              @endforeach
          </td>
          <td>{{ $teacher->status }}</td>
          <td>{{ $teacher->notes }}</td>
          <td>
              <button class="btn btn-success btn-sm btnEdit" data-id="{{$teacher->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
              <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$teacher->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
              {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
          </td>
        </tr>
      @endforeach
			</tbody>
		</table>
  </div><!--/panel starting div -->
</div><!--/1st row within 2nd column -->





<!-- Modal Starts to Add New Teacher -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/teachers-submit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enter New Teachers Info...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-1" for="teacherName">Name:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="teacherName" name="teacherName" placeholder="">
					</div>         
        
        	<label class="control-label col-sm-1" for="teacherMob">Mobile:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="teacherMob" name="teacherMob" placeholder="">
					</div>         
        </div>


      <div class="form-group">
        	<label class="control-label col-sm-1" for="teacherDesig">Desig.:</label>
					<div class="col-sm-3">
          <select class="form-control" name="teacherDesig" id="teacherDesig">
            <option value=""></option>            
          @foreach($teachDesigs as $tDesig)
            <option value="{{ $tDesig->options }}">{{ $tDesig->options }}</option>
          @endforeach
          </select>
						{{--  <input type="text" class="form-control" id="teacherDesig" name="teacherDesig" placeholder="">  --}}
					</div> 

          <label class="control-label col-sm-1" for="teacherHQual">Qual.:</label>
					<div class="col-sm-3">
          <select class="form-control" name="teacherHQual" id="teacherHQual">
            <option value=""></option>            
          @foreach($teachHQuals as $tHQual)
            <option value="{{ $tHQual->options }}">{{ $tHQual->options }}</option>
          @endforeach
          </select>
						{{--  <input type="text" class="form-control" id="teacherDesig" name="teacherDesig" placeholder="">  --}}
					</div> 


          <label class="control-label col-sm-1" for="teacherMSubj">Subject.:</label>
					<div class="col-sm-3">
          <select class="form-control" name="teacherMSubj" id="teacherMSubj">
            <option value=""></option>            
          @foreach($teachSubjs as $tSubj)
            <option value="{{ $tSubj->id }}">{{ $tSubj->name }}</option>
          @endforeach
          </select>
						
					</div> 
      </div>


        <div class="col-sm-offset-1 panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Prefered Subjects</h3>
          </div>
          <div class="panel-body">    
            @foreach($teachSubjs as $tSubj)
              
              <div class="checkbox">
                    <label><input type="checkbox" value="{{ $tSubj->id }}" name="teacherSubj[]">{{ $tSubj->name }}</label>
                    @php $flag = True; @endphp
                </div>
            @endforeach

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


<!-- Modal Starts to Edit for Teachers Entry -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/teachers-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit or Update Class...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-4" for="editclssName">Enter New Class Name:</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="editclssId" name="editclssName" placeholder="enter new exam term name">
					</div>         
          <div class="col-sm-6">
						<input type="hidden" class="form-control" id="editclssId" name="editclssId" placeholder="enter new exam term name">
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


<!-- Modal Starts to Delete for Teachers Entry -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/teachers-deltsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Do You Want to Delete Class...</h4>
      </div>
      <div class="modal-body">        


				<div class="form-group">
        	<label class="control-label col-sm-4" for="deltclssName">Class Name:</label>
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
      //alert(name);


      $('input[name="editclssName"]').val(name);
      $('input[name="editclssId"]').val(v);
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
