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
	  <th>StudentDB Id</th>
	  <th>Image</th>
      <th>Name</th>
      <th>Class</th>
      <th>Section</th>
      <th>Roll No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 0; @endphp
    @foreach($stcr->sortBy('roll_no') as $stc)
		@php $i++; @endphp
		<tr id="{{ $stc->studentdb->id }}">
			<td id="id">
				
				{{ $stc->studentdb->id }}	<br/>			
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
				<img src="{{ url('/images/'.$stc->studentdb->id.'.png') }}" width="150px" 
					class="img-responsive img-rounded img-thumbnail" alt="Images not found!!!"/>
					<div class="caption">
						<b>{{ $stc->studentdb->name }}</b><br/>
						Class: {{ $stc->clss->name }},
						Section: {{ $stc->section->name }}, <br/>
						<p>Roll No: {{ $stc->roll_no}}</p>
					</div>
			</td>
			<td id="nm">{{ $stc->studentdb->name }}<br>
				[Id: {{$stc->studentdb->admSlNo}}/{{$stc->studentdb->admDate}}]</td>
			<td class="text-center">{{ $stc->clss->name }}</td>
			<td class="text-center">{{ $stc->section->name }}</td>
			<td class="text-center">{{ $stc->roll_no }}</td>
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
