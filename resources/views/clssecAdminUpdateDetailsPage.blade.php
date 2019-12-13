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
				<table class="">
				
				<tr>
					<td colspan="2">
						<img src="{{ url('/images/'.$stc->studentdb->id.'.png') }}" width="150px" 
							class="img-responsive img-rounded img-thumbnail" alt="Images not found!!!"/>
					</td>
					
				</tr>
				<tr>
					<td>StudentDB Id</td>
					<td>{{ $stc->studentdb->id }}</td>
				</tr>
				<tr>
					<td>Name</td>
					<td><b>{{ $stc->studentdb->name }}</b></td>
				</tr>
				<tr>
					<td>Class</td>
					<td>{{ $stc->clss->name }}</td>
				</tr>
				<tr>
					<td>Section</td>
					<td>{{ $stc->section->name }}</td>
				</tr>
				<tr>
					<td>Roll No</td>
					<td>{{ $stc->roll_no}}</td>				
				</tr>
				<tr>
					<td>Adm Sl No</td>
					<td>
					<input  type="text" class="form-control admsl{{$stc->studentdb->id}}" 
						placeholder="Adm Sl No" 
						style='width: 100px;'
						value="{{$stc->studentdb->admSlNo or ''}}"
						onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')">  
					</td>
				</tr>
				<tr>
					<td>Adm Date</td>
					<td>
						<input type="text" class="date form-control admDate admdt{{$stc->studentdb->id}}" 
							value="{{$stc->studentdb->admDate or ''}}"
							id="admDate{{$stc->studentdb->id}}" 
							name="admDate" 
							placeholder="dd-mm-yyyy" 
							style='width: 150px;'>
					</td>
				</tr>
				<tr>
				<td></td>
				<td>
					<br/>
				<button class="btn btn-primary btn-sm btnAdm"
					data-sdbid="{{$stc->studentdb->id}}">Update</button>  
			
				</td>
				</tr>
				</table>   
			</td>

			<td>				
			<form>
				<div class="form-row">
				<table class="">
					<tr>
						<td>Name</td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm stdName" 
									name="stdName" id="stdName{{ $stc->studentdb->id }}" placeholder="Date of Birth"
									value="{{ $stc->studentdb->name or '' }}">
								
							</div>
						</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<div class="col-1">						
								<select class="form-control" name="stdGender" id="stdGender{{ $stc->studentdb->id }}">
									<option value=""       {{ strtoupper($stc->studentdb->ssex) == '' ? 'selected' : ''}}>Gender</option>
									<option value="MALE"   {{ strtoupper($stc->studentdb->ssex) == 'MALE' ?   'selected' : ''}}>Male</option>
									<option value="FEMALE" {{ strtoupper($stc->studentdb->ssex) == 'FEMALE' ? 'selected' : ''}}>Female</option>
									<option value="OTHER"  {{ strtoupper($stc->studentdb->ssex) == 'OTHER' ? 'selected' : ''}}>Other</option>							
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Dt of Birth</td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm stdDob" 
									name="stdDob" id="stdDob{{ $stc->studentdb->id }}" placeholder="Date of Birth"
									value="{{ $stc->studentdb->dob or '' }}">
								
							</div>
						</td>
					</tr>
					<tr>
						<td>Aadhaar</td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm" 
									name="stdAdhaar" id="stdAdhaar{{ $stc->studentdb->id }}"placeholder="Aadhaar No"
									value="{{ $stc->studentdb->adhaar or '' }}">
							</div>
						</td>
					</tr>
					<tr>
						<td>Religion</td>
						<td>
							<div class="col-1">
								<select class="form-control" name="stdReligion" id="stdReligion{{ $stc->studentdb->id }}">
									<option value="" {{ strtoupper($stc->studentdb->relg) == '' ? 'selected' : ''}}>Religion</option>
									<option value="HINDU"  {{ strtoupper($stc->studentdb->relg) == 'HINDU' ? 'selected' : ''}}>Hindu</option>
									<option value="MUSLIM" {{ strtoupper($stc->studentdb->relg) == 'MUSLIM' ? 'selected' : ''}}>Muslim</option>
									<option value="OTHER"  {{ strtoupper($stc->studentdb->relg) == 'OTHER' ? 'selected' : ''}}>Other</option>							
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Caste</td>
						<td>									
							<div class="col">
								<select class="form-control" name="stdCaste" id="stdCaste{{ $stc->studentdb->id }}">
									<option value="" {{ strtoupper($stc->studentdb->cste) == '' ? 'selected' : ''}}>Select Caste</option>
									<option value="GENERAL" {{ strtoupper($stc->studentdb->relg) == 'GENERAL' ? 'selected' : ''}}>General</option>
									<option value="SC" {{ strtoupper($stc->studentdb->relg) == 'SC' ? 'selected' : ''}}>SC</option>
									<option value="ST" {{ strtoupper($stc->studentdb->relg) == 'ST' ? 'selected' : ''}}>ST</option>							
									<option value="OBC-A" {{ strtoupper($stc->studentdb->relg) == 'OBC-A' ? 'selected' : ''}}>OBC-A</option>							
									<option value="OBC-B" {{ strtoupper($stc->studentdb->relg) == 'OBC-B' ? 'selected' : ''}}>OBC-B</option>							
								</select>									
						</td>
					</tr>
					<tr>
						<td>Phy Ch</td>
						<td></div>

					{{-- <div class="col">
						<select class="form-control" name="stdProverty" id="stdProverty{{ $stc->studentdb->id }}">
							<option>Proverty Status</option>
							<option>APL</option>
							<option>BPL</option>
						</select>						
					</div> --}}
							<div class="col">
								<select class="form-control" name="stdPhych" id="stdPhych{{ $stc->studentdb->id }}">
									<option value="" {{ strtoupper($stc->studentdb->phch) == '' ? 'selected' : ''}}>Physically Challenged</option>
									<option value="YES" {{ strtoupper($stc->studentdb->phch) == 'YES' ? 'selected' : ''}}>Yes</option>
									<option value="NO"  {{ strtoupper($stc->studentdb->phch) == 'NO'  ? 'selected' : ''}}>No</option>
								</select>						
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div class="col-auto">
								<br/>
								<button type="button" class="btn btn-warning mb-2 btnPers" 
									data-sdbid="{{$stc->studentdb->id}}">Submit</button>
							</div>
						</td>
					</tr>
				</table>
				</div>
			</form>
			</td>

			<td id="nm">
				<form>
					<div class="form-row">
						<table class="">
							<tr>
								<td>Father</td>
								<td>
									<div class="col-1">
										<input type="text" class="form-control form-control-sm" 
											name="stdFnm" id="stdFnm{{ $stc->studentdb->id }}" placeholder="Father Name"
											value="{{ $stc->studentdb->fname or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Mother</td>
								<td>
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdMnm" id="stdMnm{{ $stc->studentdb->id }}" placeholder="Mother Name"
										value="{{ $stc->studentdb->mname or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Village</td>
								<td>									
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdVil" id="stdVil{{ $stc->studentdb->id }}" placeholder="Village"
										value="{{ $stc->studentdb->vill or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Post Off</td>
								<td>	
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdPOf" id="stdPof{{ $stc->studentdb->id }}" placeholder="Post Office"
										value="{{ $stc->studentdb->post or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Police Stn</td>
								<td>	
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdPSt" id="stdPst{{ $stc->studentdb->id }}" placeholder="Police Stn"
										value="{{ $stc->studentdb->pstn or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>District</td>
								<td>	
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdDts" id="stdDts{{ $stc->studentdb->id }}" placeholder="Dist"
										value="{{ $stc->studentdb->dist or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Pin No</td>
								<td>	
									<div class="col">							
										<input type="text" class="form-control form-control-sm" 
										name="stdPin" id="stdPin{{ $stc->studentdb->id }}" placeholder="Pin No"
										value="{{ $stc->studentdb->pin or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td>	
									<div class="col">
										<input type="text" class="form-control form-control-sm" 
										name="stdMbl" id="stdMbl{{ $stc->studentdb->id }}" placeholder="Mobile"
										value="{{ $stc->studentdb->mobl or '' }}">
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>	
									<div class="col-auto">
										<br/>
										<button type="button" class="btn btn-info mb-2 btnFmly"
											data-sdbid="{{$stc->studentdb->id}}">Submit</button>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</form>
			</td>
			<td>
			<form>
				<div class="form-row">
				<table class="">
					<tr>
						<td>Bank </td>
						<td>
							<div class="col-1">
								<input type="text" class="form-control form-control-sm" 
									name="stdBnnm" id="stdBnnm{{ $stc->studentdb->id }}" placeholder="Bank Name"
									value="{{ $stc->studentdb->bnnm or '' }}">
							</div>
						</td>
					</tr>
					<tr>
						<td>Brance </td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm"
									name="stdBrnm" id="stdBrnm{{ $stc->studentdb->id }}" placeholder="Branch Name"
									value="{{ $stc->studentdb->brnm or '' }}">
							</div>
						</td>
					<tr>
						<td>Accno</td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm" 
									name="stdAccn" id="stdAccn{{ $stc->studentdb->id }}" placeholder="Account No"
									value="{{ $stc->studentdb->accNo or '' }}">
							</div>
						</td>
					</tr>
					<tr>
						<td>IFSC</td>
						<td>
							<div class="col">
								<input type="text" class="form-control form-control-sm" 
									name="stdIfsc" id="stdIfsc{{ $stc->studentdb->id }}" placeholder="IFSC Code"
									value="{{ $stc->studentdb->ifsc or '' }}">
							</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div class="col-auto">
								<br/>
								<button type="button" class="btn btn-danger mb-2 btnBank"
									data-sdbid="{{$stc->studentdb->id}}">Submit</button>
							</div>
						</td>
					</tr>
				</table>
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


	$('.stdDob').click(function(){		
		var id = $(this).attr('id');		
		//alert (id);
		$('#'+$(this).attr('id')).datepicker({
			changeMonth: true,
			changeYear: true,
			
			dateFormat: 'dd-mm-yy'
		});
	});





	$('.btnPers').click(function(){
		var stdid  = $(this).data('sdbid');
		var stdnam = $('#stdName'+stdid).val();
		var stdgnd = $('#stdGender'+stdid).val();
		var stddob = $('#stdDob'+stdid).val();
		var stdadh = $('#stdAdhaar'+stdid).val();
		var stdrel = $('#stdReligion'+stdid).val();
		var stdcst = $('#stdCaste'+stdid).val();
		var stdphc = $('#stdPhych'+stdid).val();


		// alert("Personal"+stdid+"--Gender:"+stdgnd);
		var url = '{{ url("/clssecAdminUpdatePersonal") }}';
		var tok = '{{ csrf_token() }}';

		// alert("Button Adm is Clicked!!!: "+sdbid+"--"+admsl+"--"+admdt);
		//stddob: stddob, stdadh: stdadh, stdrel: stdrel, stdcst: stdcst, stdprv: stdprv, stdphc: stdphc,
		$.ajax({
			method: 'post',
			url: url,
			data: {stdid:stdid, stdnam:stdnam, stdgnd:stdgnd, stddob:stddob, stdadh:stdadh, stdrel:stdrel, stdcst:stdcst, stdphc:stdphc, _token: tok},
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



	$('.btnFmly').click(function(){
		var stdid  = $(this).data('sdbid');
		var stdfnm = $('#stdFnm'+stdid).val();
		var stdmnm = $('#stdMnm'+stdid).val();
		var stdvil = $('#stdVil'+stdid).val();
		var stdpof = $('#stdPof'+stdid).val();
		var stdpst = $('#stdPst'+stdid).val();
		var stddts = $('#stdDts'+stdid).val();
		var stdpin = $('#stdPin'+stdid).val();
		var stdmbl = $('#stdMbl'+stdid).val();

		 //alert("Family: "+stdid+"--Father Name:"+stdfnm);
		var url = '{{ url("/clssecAdminUpdateFamily") }}';
		var tok = '{{ csrf_token() }}';

		// alert("Button Adm is Clicked!!!: "+sdbid+"--"+admsl+"--"+admdt);
		//stddob: stddob, stdadh: stdadh, stdrel: stdrel, stdcst: stdcst, stdprv: stdprv, stdphc: stdphc,
		$.ajax({
			method: 'post',
			url: url,
			data: {stdid:stdid, stdfnm:stdfnm, stdmnm:stdmnm, stdvil:stdvil, stdpof:stdpof, stdpst:stdpst, stddts:stddts, stdpin:stdpin, stdmbl:stdmbl, _token: tok},
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


	$('.btnBank').click(function(){
		var stdid  = $(this).data('sdbid');
		var stdbnnm = $('#stdBnnm'+stdid).val();
		var stdbrnm = $('#stdBrnm'+stdid).val();
		var stdaccn = $('#stdAccn'+stdid).val();
		var stdifsc = $('#stdIfsc'+stdid).val();

		// alert("Banking: "+stdid+"--Bank Name: "+stdbnm);

		var url = '{{ url("/clssecAdminUpdateBankinfo") }}';
		var tok = '{{ csrf_token() }}';

		$.ajax({
			method: 'post',
			url: url,
			data: {stdid:stdid, stdbnnm:stdbnnm, stdbrnm:stdbrnm, stdaccn:stdaccn, stdifsc:stdifsc,  _token: tok},
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
