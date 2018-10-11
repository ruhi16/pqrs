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
					@php
						$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
					@endphp
					@if( $isExist > 0 )
						<th class="text-center">{{ $extype->name }}</th>
					@endif
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
							@php
								$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
							@endphp
							
							@if( $isExist > 0 ) {{-- if any record exists for the specifix extype !!! --}}
								@php	
									$marks = $clssecMarks->where('studentcr_id', $studentcr->unique('studentcr_id')->first()->studentcr->id);								
									$mode_count = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('mode_id')->count();

								@endphp
								<td>
									{{--  {{ dd($marks) }}  --}}
									<table class="table table-bordered">
										<thead>


											<tr>
												<th class="text-center" rowspan='2'>Subject
													{{--  {{ $mode_count }}-{{ $isExist }}  --}}
												</th>
												@foreach($exams as $exam)
													@if($mode_count > 1)
														<th class="text-center" colspan="2">{{ $exam->name }}</th>
													@else
														<th class="text-center">{{ $exam->name }}</th>
													@endif
												@endforeach
												<th class="text-center" rowspan='2'>Total</th>
												<th class="text-center" rowspan='2'>Grade</th>
											</tr>
											<tr>
												{{--  <th class="text-center">Subject													  --}}
												</th>
												@foreach($exams as $exam)
													@if($mode_count > 1)
														<th class="text-center"><small>Form</small></th>
														<th class="text-center"><small>Summ</small></th>
													@else
														<th class="text-center">Obm</th>
													@endif
												@endforeach
												{{--  <th class="text-center">Total</th>  --}}
												{{--  <th class="text-center">Grade</th>  --}}
											</tr>
										</thead>
										<tbody>
											@php
												$clssubs = $clssubs->sortBy('combination_no');
												//$abc = $clssubs->test(function($e){
												//	return $e;
												//});
												//dd($abc);
												//$flights = $flights->reject(function ($flight) {
    											//	return $flight->cancelled;
												//});
											@endphp

											@foreach($clssubs as $clssub)
												@if( $clssub->extype_id == $extype->id )
													<tr>
														<td>{{ $clssub->name }}</td>
													
													@php
														$extpmdclsb = $extpmdclsbs->where('extype_id', $extype->id)
																		->where('subject_id', $clssub->subject_id);																											
													@endphp
													@foreach($exams as $exam)
														
														@if( $mode_count > 1 )
															@foreach($modes as $mode)
																@php
																	$etmcs = $extpmdclsb->where('exam_id', $exam->id)
																				->where('mode_id', $mode->id)->first();

																	$obmrk = $marks->where('exmtypmodclssub_id', $etmcs->id)->first();
																	$mark = $obmrk == NULL ? '' : ($obmrk->marks < 0 ? 'AB' : $obmrk->marks);
																@endphp
																<td class="text-center">																
																	{{ $mark }}
																</td>
															@endforeach
														@else
															@php
																$etmcs = $extpmdclsb->where('exam_id', $exam->id)->first();
																$obtmark = $marks->where('exmtypmodclssub_id', $etmcs->id);

																$obtmark = $obtmark->first();
																$obtmark = $obtmark == NULL ? '' : ($obtmark->marks < 0 ? 'AB' : $obtmark->marks);

															@endphp
															<td class="text-center">																
																{{ $obtmark }}																
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
																	->where('enpercentage', '>=', $percentage)
																	->first();
														if( $grade ){
															$grd = $grade->gradeparticular->name; 
														}else{
															$grd = 'MISTAKEN';
														}

													@endphp
													<td class="text-center">{{ $totalObtMarks }}/{{ $totalFulMarks }}</td>
													<td class="text-center">{{ $percentage }}({{ $grd }}) </td>

													</tr>
																								
												@endif
											@endforeach
										</tbody>
									</table>
								</td>
							@endif   {{--  end of isExits --}}
				@endforeach
				<td></td>
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



											
											<!-- @php
													$ex_clssubs = $clssubs->where('extype_id', $extype->id)->where('combination_no', '!=', 0)->groupBy('combination_no');												
													
													$subName ='';
													//foreach($ex_clssubs as $ex_clssub){
													//	$subName .= $ex_clssub ."==="; 
													//}
												@endphp
												@foreach( $ex_clssubs as $ex_clssub )
														<tr>
														@php		
															$subName ='';		
															$combSubIds = [];									
															foreach($ex_clssub as $ex_cs){
																$subName .= $ex_cs->name ; 
																array_push($combSubIds,$ex_cs->id);
																if( !$loop->last ){
																	$subName .= ' + '; 
																}
															}
															//$subName .= ' or ';
															//dd($combSubIds);

														@endphp
														<td>{{ $subName }}</td>

														@foreach($exams as $exam)
														@php
															$extpmdclsb = $extpmdclsbs->where('extype_id', $extype->id)
																				->where('exam_id', $exam->id)
																				->whereIn('subject_id', $combSubIds)
																				;	
															//dd($extpmdclsb->pluck('id'));
															
															$combSubObtMarks = $totalObtMarks = $marks
																		->whereIn('exmtypmodclssub_id', $extpmdclsb->pluck('id'))
																		->where('marks','>',0)->sum('marks');
															//if(!$loop->first){
															//dd($combSubObtMarks);
															//}
															$combSubFulMarks = $extpmdclsb->where('exam_id', $exam->id)->sum('fm');
															
														@endphp
														
														<td>om{{ $combSubObtMarks  }}:fm{{ $combSubFulMarks }}</td>

														@endforeach
													</tr>
											@endforeach 
										</tbody>  -->