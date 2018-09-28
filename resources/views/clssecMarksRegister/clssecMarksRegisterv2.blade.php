@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Register V-2</h1>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Name & Class Details</th>
			<th>Formative Details</th>
			<th>Summative Details</th>
			<th>Go to Results</th>
		</tr>	
	</thead>
	<tbody>
	
	@foreach($clssecDetails as $clssecDetail)
		<tr>
			@foreach($clssecDetail as $clssec)				
				@if($loop->first)
				<td>
					<table class='table table-bordered'>						
						<tr>
							@foreach($clssec as $cs)
								<td>{{ $cs }}</td>
							@endforeach
						</tr>
					</table>
				</td>
				@else 
				<td>
					<table class='table table-bordered'>
					@foreach($clssec as $subject)
					<tr>
						@foreach($subject as $subjDetail)
							@if($loop->first)
								@foreach($subjDetail as $sDet)
									<td>{{ $sDet }}</td>
								@endforeach
							@endif
							@if($loop->last)
								@foreach($subjDetail as $exam)							
										@foreach($exam as $ex)
											<td>{{ $ex }}</td>
										@endforeach									
								@endforeach
							@endif
						@endforeach
						</tr>
					@endforeach
					</table>
				</td>
				@endif				
			@endforeach			
			</tr>
	@endforeach
	</tbody
</table>








<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
