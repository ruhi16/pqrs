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

<table class="table table-bordered" id="stdDetails">
  <thead>
    <tr>
      <th>StudentDB Id</th>
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
    <tr id="{{ $stc->studentdb->id }}">
      <td id="id">{{ $stc->studentdb->id }}</td>
      <td id="nm">{{ $stc->studentdb->name }}<br>
        [Id: {{$stc->studentdb->admSlNo}}/{{$stc->studentdb->admDate}}]</td>
      <td class="text-center">{{ $stc->clss->name }}</td>
      <td class="text-center">{{ $stc->section->name }}</td>
      <td class="text-center">{{ $stc->roll_no }}</td>
      <td>
        {{--  <a href="{{url('/studentdbmultipage-edit',     [$stc->studentdb_id])}}" class="btn btn-primary btn-sm">Edit Details</a>          --}}
        
        <button type="button" class="btn btn-success btn-stdId" data-toggle="modal" data-target="#myModal" 
                value="{{ $stc->studentdb->id }}"
                data-std_nm="{{ $stc->studentdb->name }}"
                data-std_cl="{{ $stc->clss->name }}"
                data-std_sc="{{ $stc->section->name }}"
                data-std_rl="{{ $stc->roll_no }}"
                                      >Edit Student Id</button>
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
          <input type="hidden" class="form-control" id="std_id" name="std_id" value="{{ $stc->studentdb->id }}">

        	<label class="control-label col-sm-2" for="std_name">Name:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="std_name" name="std_name" readonly>
            
					</div>  

          <label class="control-label col-sm-1" for="std_clss">Class:</label>
					<div class="col-sm-1">
            <input type="text" class="form-control" id="std_clss" name="std_clss" readonly>
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
          <label class="control-label col-sm-1" for="std_secn">Section:</label>
					<div class="col-sm-1">
            <input type="text" class="form-control" id="std_secn" name="std_secn" readonly>
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
          <label class="control-label col-sm-1" for="std_roll">Roll:</label>
					<div class="col-sm-2">
            <input type="text" class="form-control" id="std_roll" name="std_roll" readonly>
						{{--  <input type="text" class="form-control" id="currses" name="currses" placeholder="Enter Curr. Session">  --}}

					</div>          
      	</div>

				<div class="form-group">
        	<label class="control-label col-sm-2" for="admBookNo">Adm Book No:</label>
					<div class="col-sm-2">						
						<input type="text" class="date form-control" id="admBookNo" name="admBookNo" placeholder="" value="1">
					</div>

          <label class="control-label col-sm-1" for="admSlNo">Sl No:</label>
					<div class="col-sm-2">						
						<input type="text" class="date form-control" id="admSlNo" name="admSlNo" placeholder="">
					</div>

          <label class="control-label col-sm-1" for="admDate">Date:</label>
					<div class="col-sm-3">						
						<input type="text" class="date form-control" id="admDate" name="admDate" placeholder="dd-mm-yyyy">
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

    $('#admDate').each(function(){
      $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
        });
    });

    var v;
    $('.btn-stdId').click(function(){
      // alert('hhh');
      v = $(this).val();

      std_nm = $(this).data("std_nm");
      std_cl = $(this).data("std_cl");
      std_sc = $(this).data("std_sc");
      std_rl = $(this).data("std_rl");
      
      //alert(std_nm+std_cl+std_sc+std_rl);
      $('input[name="std_id"]').val(v); 
      $('input[name="std_name"]').val(std_nm); 
      $('input[name="std_clss"]').val(std_cl);
      $('input[name="std_secn"]').val(std_sc);
      $('input[name="std_roll"]').val(std_rl);   
      

    });
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
