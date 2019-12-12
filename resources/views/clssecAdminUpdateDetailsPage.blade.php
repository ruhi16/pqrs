@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
	
@endsection

@section('content')
<h1 class="pull-right">Session:<b>{{$ses->name or ''}}</b></h1>
<h1>Class:<b>{{$cls->name or ''}}</b>, Section:<b>{{$sec->name or ''}}</b>, Update Details Page</h1>


<table class="table table-bordered" id="stdDetails">
  <thead>
    <tr>
	  <th>Image & Admission Info</th>
	  <th>Personal Materials</th>
      <th>Family Details</th>
	  <th>Banking Data</th>
	  
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($stcr->sortBy('roll_no') as $stc)	
		<tr id="{{ $stc->studentdb->id }}">
			<td id="id">				
				StudentDB Id: {{ $stc->studentdb->id }}	<br/>	
				<img src="{{ url('/images/'.$stc->studentdb->id.'.png') }}" width="150px" 
					class="img-responsive img-rounded img-thumbnail" alt="Images not found!!!"/>
				<div class="caption">
					<b>{{ $stc->studentdb->name }}</b><br/>
					Class: {{ $stc->clss->name }},
					Section: {{ $stc->section->name }}, <br/>
					<p>Roll No: {{ $stc->roll_no}}</p>
				</div>	
				Adm Sl No and Date:<input  type="text" class="form-control admsl{{$stc->studentdb->id}}" 
					placeholder="Adm Sl No" 
					style='width: 100px;'
                    value="{{$stc->studentdb->admSlNo or ''}}"
					onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')">  

				<input type="text" class="date form-control admDate admdt{{$stc->studentdb->id}}" 
					value="{{$stc->studentdb->admDate or ''}}"
					id="admDate{{$stc->studentdb->id}}" 
					name="admDate" 
					placeholder="dd-mm-yyyy" 
					style='width: 150px;'>
				
				
				<button class="btn btn-primary btn-sm btnAdm"
                    data-sdbid="{{$stc->studentdb->id}}">Update</button>     
			</td>

			<td>				
			<form>
				<div class="form-row">
					<div class="col-1">						
						<select class="form-control" name="stdGender" id="stdGender{{ $stc->studentdb->id }}">
							<option value=""       {{ strtoupper($stc->studentdb->ssex) == '' ? 'selected' : ''}}>Gender</option>
							<option value="Male"   {{ strtoupper($stc->studentdb->ssex) == 'MALE' ?   'selected' : ''}}>Male</option>
							<option value="Female" {{ strtoupper($stc->studentdb->ssex) == 'FEMALE' ? 'selected' : ''}}>Female</option>
							<option value="Other"  {{ strtoupper($stc->studentdb->ssex) == 'OTHER' ? 'selected' : ''}}>Other</option>							
						</select>
					</div>
					<div class="col">
						<input type="text" class="form-control form-control-sm" placeholder="Date of Birth"
						value="{{ strtoupper($stc->studentdb->ssex) == 'MALE' ? 'selected' : ''}}">
					</div>
					<div class="col">
						<input type="text" class="form-control form-control-sm" placeholder="Aadhaar No">
					</div>
					<div class="col-1">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>Religion</option>
							<option>Hindu</option>
							<option>Muslim</option>
							<option>Other</option>							
						</select>
					</div>
					<div class="col">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>Caste</option>
							<option>General</option>
							<option>SC</option>
							<option>ST</option>							
							<option>OBC-A</option>							
							<option>OBC-B</option>							
						</select>
					</div>
					<div class="col">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>Proverty Status</option>
							<option>APL</option>
							<option>BPL</option>
						</select>						
					</div>
					<div class="col">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>Physically Challenged</option>
							<option>Yes</option>
							<option>No</option>
						</select>						
					</div>
					<div class="col-auto">
						<br/>
						<button type="button" class="btn btn-warning mb-2 btnPers" 
							data-sdbid="{{$stc->studentdb->id}}">Submit</button>
					</div>
				</div>
			</form>
			</td>

			<td id="nm">
				<form>
					<div class="form-row">
						<div class="col-1">
							<input type="text" class="form-control form-control-sm" placeholder="Father Name">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Mother Name">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Village">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Post Office">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Police Stn">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Dist">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Mobile">
						</div>
						<div class="col-auto">
							<button type="button" class="btn btn-info mb-2">Submit</button>
						</div>
					</div>
				</form>
			</td>
			<td>
				<form>
					<div class="form-row">
						<div class="col-1">
							<input type="text" class="form-control form-control-sm" placeholder="Account No">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="Branch Name">
						</div>
						<div class="col">
							<input type="text" class="form-control form-control-sm" placeholder="IFSC Code">
						</div>
						<div class="col-auto">
							<button type="button" class="btn btn-danger mb-2">Submit</button>
						</div>
					</div>
				</form>
			</td>
			<td>
				<a href="{{ url('/clssecAdminUpdate-takePicture', [$stc->studentdb_id, $clteacher_id, $stc->clss_id, $stc->section_id]) }}" class="btn btn-primary btn-sm">Take Picture</a>        
				{{--  <button type="button" class="btn btn-success btn-stdId" data-toggle="modal" data-target="#myModal">Show Modal</button>  --}}
			
			</td>
		</tr>
    @endforeach
  </tbody>
</table>


<!-- Modal Starts -->
{{--  <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      	{!! Form::open(['url'=>'/studentdbmultipage-stdIdSubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Enter Student Id...</h4>
			</div>
			<div class="modal-body">        
				<form method="POST" action="{{ url('clssecAdminUpdate-takePicture-done', [123]) }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col-md-6">
							<div id="my_camera"></div>
							<br/>
							<input type=button value="Take Snapshot" onClick="take_snapshot()">
							<input type="hidden" name="image" class="image-tag">
						</div>
						<div class="col-md-6">
							<div id="results">Your captured image will appear here...</div>
						</div>
						<div class="col-md-12 text-center">
							<br/>
							<button class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
						
			</div>			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>  --}}
<!-- /.modal -->
<!-- Modal Ends -->







<!-- Datepicker Assets -->  
<link rel="stylesheet" href="{{url('datepicker/jquery-ui.css')}}">
<script src="{{url('datepicker/jquery-ui.js')}}"></script>

<script type="text/javascript" src="{{url('bs337/js/jquery.bootstrap-grow.min.js')}}" integrity=""></script>


<script type="text/javascript">
  $(document).ready(function(e){
	$('.btnAdm').click(function(){
		var sdbid = $(this).data('sdbid');
		var admsl = $('.admsl'+sdbid).val();
		var admdt = $('.admdt'+sdbid).val();

		var url = '{{ url("/clssecAdminUpdateAdm") }}';
		var tok = '{{ csrf_token() }}';

		// alert("Button Adm is Clicked!!!: "+sdbid+"--"+admsl+"--"+admdt);

		$.ajax({
			method: 'post',
			url: url,
			data: {sdbid: sdbid, admsl: admsl, admdt: admdt, _token: tok},
			success: function(msg){

				$.bootstrapGrowl(msg['sdbnm']+"'s Record Updated Successfully!",{
                    type: 'success', // success, error, info, warning
                    delay: 1000,
                }); 
			},
			error: function(err){

				$.bootstrapGrowl("Errors Occured!",{
                    type: 'warning', // success, error, info, warning
                    delay: 1000,
                }); 
			}	
		});
	});


	$('.admDate').click(function(){		
		//var id = $(this).attr('id');		
		$('#'+$(this).attr('id')).datepicker({
			changeMonth: true,
			changeYear: true,
			
			dateFormat: 'dd-mm-yy'
		});
	});


	$('#stdDob').click(function(){		
		//var id = $(this).attr('id');		
		$('#'+$(this).attr('id')).datepicker({
			changeMonth: true,
			changeYear: true,
			
			dateFormat: 'dd-mm-yy'
		});
	});





	$('.btnPers').click(function(){
		var stdid  = $(this).data('sdbid');
		var stdgnd = $('#stdGender'+stdid).val();


		// alert("Personal"+stdid+"--Gender:"+stdgnd);
		var url = '{{ url("/clssecAdminUpdatePersonal") }}';
		var tok = '{{ csrf_token() }}';

		// alert("Button Adm is Clicked!!!: "+sdbid+"--"+admsl+"--"+admdt);
		//stddob: stddob, stdadh: stdadh, stdrel: stdrel, stdcst: stdcst, stdprv: stdprv, stdphc: stdphc,
		$.ajax({
			method: 'post',
			url: url,
			data: {stdid:stdid, stdgnd: stdgnd,   _token: tok},
			success: function(msg){

				$.bootstrapGrowl(msg['msg']+"'s Record Updated Successfully!",{
                    type: 'success', // success, error, info, warning
                    delay: 1000,
                }); 
			},
			error: function(err){

				$.bootstrapGrowl("Errors Occured!",{
                    type: 'warning', // success, error, info, warning
                    delay: 1000,
                }); 
			}	
		});

	});







	//$('#admDate').datepicker();
	
	//$('.admDate').each(function(){
	//	$(this).datepicker({
	//		changeMonth: true,
	//		changeYear: true,
	//		dateFormat: 'dd-mm-yy'
	//	});
    //});

    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
