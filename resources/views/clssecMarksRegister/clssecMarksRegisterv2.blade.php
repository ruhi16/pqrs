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
			@foreach($extypes as $extp)
				<th class='text-center'>{{ $extp->name }} Details</th>
			@endforeach
			<th>Results</th>
		</tr>	
	</thead>
	<tbody>
	
	@foreach($clssecDetails as $clssecDetail)
		<tr>
			@foreach($clssecDetail as $clssec)				
				@if($loop->first)
					<td>
						<table class='table table-bordered'>						
							@foreach($clssec as $cs)
								@if( $loop->first )
									<tr> <td colspan='3'><b>{{ $cs }}</b></td>	</tr>
									<tr>
								@endif
								@continue( $loop->first )
								<td>{{ $cs }}</td>
							@endforeach
								</tr>
						</table>
					</td>

				@else 

					@foreach($extypes as $extp)
						<td>
							<table class='table table-bordered'>
								<tr>
									<th>Subjects</th>									
									@foreach($exams as $exam)
										<th class='text-center'>{{ $exam->name }}</th>
									@endforeach
									<th>Total</th>
									<th>Grade</th>
								</tr>
								@foreach($clssec as $subject)
								
								
									@foreach($subject as $k => $subjDetail)
										@if($loop->first)
										@foreach($subjDetail as $sDet)
											@if($loop->last)
												@php
													$flag = $sDet;
												@endphp
											@endif
										@endforeach
										@endif
									@endforeach
								
									@if( $extp->name == $flag )
									<tr>

										@php $subjTotal = 0; @endphp
										@foreach($subject as $k => $subjDetail)
										
											@if($loop->first)	{{-- Subject Details --}}
												@foreach($subjDetail as $sDet)
													@continue( $loop->last)
													<td>{{ $sDet }}</td>
												@endforeach
											@endif

											
											@if($loop->last)	{{-- Subject Marks Details --}}
												@foreach($subjDetail as $exam)
													

													@foreach($exam as $ex)
														@continue($loop->first)
														{{--  @if( $loop->index % 2 == 1)  --}}
															<td>{{ $ex == -99 ? 'AB' : $ex }}</td>
															{{--  @php $subjTotal += ($ex == 'NA' || $ex == -99 ? 0 : $ex ); @endphp  --}}
														{{--  @endif  --}}
													@endforeach									
												@endforeach
											@endif
											
										@endforeach
										<td>{{ $subjTotal }}</td>
									</tr>
									@endif
								@endforeach
							</table>
						</td>
					@endforeach

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
