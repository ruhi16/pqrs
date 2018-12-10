@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Admin Page</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Class</th>
            <th>Sections</th>
            <th>Roll No</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      
      @foreach($remRec as $std)
      <tr>
        <td>{{$std->id}}</td>
        <td>
          {{ $std->name }}          
        </td>
        <td class="text-center">
          {{--  {{$std->stclss_id}}          --}}
          {{ $cls->name }}
        </td>
        <td class="text-center">
          {{--  {{$std->stsec_id}}  --}}
          {{ $sec->name }}
        </td>
        <td></td>
        <td>          
            <a href="{{url('/issueRoll',[$std->id])}}" class="btn btn-info issue-roll" id="btnSubmit">Issue Roll</a>          
        </td>
      </tr>
      @endforeach

    </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Session/Sl No</th>
      <th>Name</th>
      <th>Class</th>
      <th>Section</th>
      <th>Roll No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp
    @foreach($stcr as $stc)
    @php $i++; @endphp
    <tr>
      <td>{{ $stc->session_id }}/{{ $i }}</td>
      <td>{{ $stc->studentdb->name }}</td>
      <td class="text-center">{{ $stc->clss->name }}</td>
      <td class="text-center">{{ $stc->section->name }}</td>
      <td class="text-center">{{ $stc->roll_no }}</td>
      <td>
        <a href="{{url('/studentdbmultipage-edit',     [$stc->studentdb_id])}}" class="btn btn-primary btn-sm">Edit Details</a>        
        {{--  <a href="{{url('/studentdbmultipage-stdIdSubmit',[$stc->studentdb_id])}}" class="btn btn-success">Edit Student Id</a>          --}}
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Edit Student Id</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>








<!-- Modal Starts -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/studentdbmultipage-stdIdSubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enter Student Id...</h4>
      </div>
      <div class="modal-body">        

				<div class="form-group">
        	<label class="control-label col-sm-2" for="currses">Name:</label>
					<div class="col-sm-2">
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>  
          <label class="control-label col-sm-1" for="currses">Class:</label>
					<div class="col-sm-1">
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
          <label class="control-label col-sm-1" for="currses">Section:</label>
					<div class="col-sm-1">
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
          <label class="control-label col-sm-2" for="currses">Roll No:</label>
					<div class="col-sm-1">
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
      	</div>

				<div class="form-group">
        	<label class="control-label col-sm-2" for="fromdt">Adm Book No:</label>
					<div class="col-sm-2">						
						<input type="text" class="date form-control" id="fromdt" name="fromdt" placeholder="">
					</div>

          <label class="control-label col-sm-1" for="fromdt">Sl No:</label>
					<div class="col-sm-2">						
						<input type="text" class="date form-control" id="fromdt" name="fromdt" placeholder="">
					</div>

          <label class="control-label col-sm-1" for="admdt">Date:</label>
					<div class="col-sm-3">						
						<input type="text" class="date form-control" id="admdt" name="admdt" placeholder="dd-mm-yyyy">
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








  <!-- Datepicker CDN-->  
  <link rel="stylesheet" href="{{url('datepicker/jquery-ui.css')}}">
  <script src="{{url('datepicker/jquery-ui.js')}}"></script>
 


<script type="text/javascript">
  $(document).ready(function(e){
    $(document).one('click', '.issue-roll',function(e) {
      // alert('clicked');              
    });

    $('#admdt').each(function(){
      $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
        });
    });
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
