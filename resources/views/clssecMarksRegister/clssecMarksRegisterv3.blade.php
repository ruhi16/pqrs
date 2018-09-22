@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Register V-3</h1>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">Name</th>
				@foreach($extypes as $extype)
					<th class="text-center">{{ $extype->name }}</th>
				@endforeach
				<th class="text-center">Action</th>
			</tr>		
		</thead>
		<tbody>
			@foreach($clssecMarks->groupBy('studentcr_id') as $studentcr)
				{{--  <small>{{ $studentcr }}</small>  --}}
				<tr>
					<td>{{ $studentcr->unique('studentcr_id')->first()->studentcr->studentdb->name }},
						{{ $studentcr->unique('studentcr_id')->first()->studentcr->clss->name }},
						{{ $studentcr->unique('studentcr_id')->first()->studentcr->section->name }},
						{{ $studentcr->unique('studentcr_id')->first()->studentcr->roll_no }}
					</td>
					@foreach($extypes as $extype)

							<td class="text-center">
								@php
									$marks = $clssecMarks->where('studentcr_id', $studentcr->unique('studentcr_id')->first()->studentcr->id);
									$mode_count = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('mode_id')->count();
								@endphp
								{{--  {{ dd($marks) }}  --}}
								<table class="table table-bordered">
									<thead>
										<tr>
											<th class="text-center">Subject
												{{ $mode_count }}
											</th>
											@foreach($exams as $exam)
												@if($mode_count > 1)
													<th class="text-center" colspan="2">{{ $exam->name }}</th>
												@else
													<th class="text-center">{{ $exam->name }}</th>
												@endif
											@endforeach
											<th class="text-center">Total</th>
											<th class="text-center">Grade</th>
										</tr>
									</thead>
									<tbody>
										@foreach($clssubs as $clssub)
											@if($clssub->subject->extype_id == $extype->id)
												<tr>											
													<td>{{ $clssub->subject->name }}</td>
													@php
														$extpmdclsb = $extpmdclsbs->where('subject_id', $clssub->subject_id)
																			->where('extype_id', $extype->id);
																			
														
													@endphp
													@foreach($exams as $exam)
														@php
															//$mode_count = $extpmdclsb->where('exam_id', $exam->id)->count('mode_id');
															$etmcs = $extpmdclsb->where('exam_id', $exam->id)->first();

															$obtmark = $marks->where('exmtypmodclssub_id', $etmcs->id);															
														@endphp
														@if( $mode_count > 1 )
															@foreach($modes as $mode)
																@php
																	$obmrk   = $obtmark->pluck('mode_id');
																	//$mark = $obmrk == NULL ? '' : ($obmrk->marks < 0 ? 'AB' : $obmrk->marks);
																@endphp
																<td class="text-center">
																{{ $obmrk }}
																</td>
															@endforeach
														@else
															@php
																$obtmark = $obtmark->first();
																$obtmark = $obtmark == NULL ? '' : ($obtmark->marks < 0 ? 'AB' : $obtmark->marks);

															@endphp
															<td class="text-center">
																{{--  Mode Count: {{ $mode_count }}  --}}
																{{ $obtmark }}
																{{--  /<small>{{ $etmcs->fm }}</small>  --}}
															</td>
														@endif
													@endforeach

													@php
														$totalObtMarks = $marks->whereIn('exmtypmodclssub_id', $extpmdclsb->pluck('id') )
																	->where('marks', '>', 0)->sum('marks');
														$totalFulMarks = $extpmdclsb->where('fm', '>', 0)->sum('fm');				
														
														$percentage = round( ( $totalObtMarks * 100 ) / $totalFulMarks , 0);
														$grade = $grades->where('extype_id', $extype->id)
																	->where('stpercentage', '<=', $percentage)
																	->where('enpercentage', '>', $percentage)
																	->first();
														if( $grade ){
															$grd = $grade->gradeparticular->name; //$gradeparticular->where(id, $grade->first())
														}else{
															$grd = '';
														}

													@endphp
													<td class="text-center">{{ $totalObtMarks }}</td>
													<td class="text-center">{{ $percentage }}({{ $grd }}) </td>
												</tr>
											@endif
										@endforeach
									</tbody>						
								</table>
							</td>					
				@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>





<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
