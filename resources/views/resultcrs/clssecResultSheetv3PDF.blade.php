<!DOCTYPE html>
<html>
    <head>
        <title>Html Result Format</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        {{--  <meta http-equiv="Content-Type" content="charset=utf-8" />  --}}
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 0px;
        {{--  width: 100%;  --}}
        font-size: 11px;
        {{--  border-collapse: collapse;  --}}
		vertical-align: top;
        
    }
    th, td {
    padding: 2px;
    }
    </style>
    <style>
		.page-break {
    		page-break-after: always;
		}
	</style>

    <style> 
	
    @font-face {
        font-family: "arial";
        font-style: normal;
        font-weight: normal;
        src: url(resources/fonts/SolaimanLipi.ttf) format('truetype');
    }
    * {
        font-family: "SolaimanLipi";
    }

	</style>
	<body>

		<h1 class='text-center' align="center">{{ $school->name }}</h1>
		<h3 class='text-center' align="center">{{ $school->vill }} * {{ $school->po }} * {{ $school->ps }}</h3>
		<h2 class='text-center' align="center">Progress Report for Session {{ $session->name }}</h2>

		<table border="1" class="table table-bordered" width="100%">
			<thead>
				<tr>
					<td>Name: <strong>{{ $studentcrs->first()->studentdb->name }}</strong></td>
					<td>Class: <strong>{{ $studentcrs->first()->clss->name }}</strong></td>
					<td>Section: <strong>{{ $studentcrs->first()->section->name }}</strong></td>
					<td>Roll No:<strong>{{ $studentcrs->first()->roll_no }}</strong></td>
				</tr>
			</thead>
		</table>
		<br>


		<table border="1" class="table table-bordered">
			<thead>
				<tr>				
					@foreach($extypes as $extype)
						@php
							$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
						@endphp
						@if( $isExist > 0 )
							<th class="text-center">{{ $extype->name }}</th>
						@endif
					@endforeach
					{{--  <th class="text-center">Action</th>  --}}
				</tr>		
			</thead>
			<tbody>
				@foreach($clssecMarks->groupBy('studentcr_id') as $studentcr)					
					<tr>						
						@foreach($extypes as $extype)
								@php
									// how many extype exists for current class, i.e. summative, formative or both
									$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
								@endphp
								
								@if( $isExist > 0 ) {{-- if any record exists for the specifix extype !!! --}}
									@php	
										$marks = $clssecMarks->where('studentcr_id', $studentcr->unique('studentcr_id')->first()->studentcr->id);								
										$mode_count = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('mode_id')->count();

									@endphp
									<td>
										{{--  {{ dd($marks) }}  --}}
										<table border="1" class="table table-bordered">
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
													$clssubs = $clssubs->sortBy(function($query){
														return $query->combination_no < 0 ? -$query->combination_no : $query->combination_no;
													});

													$combaddl_subj_state = false;
													$combaddl_subj_count_const = 0;
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
																	<td class="text-center" align="center">																
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
																<td align="center">																
																	{{ $obtmark }}
																</td>
															@endif

														@endforeach

														@php
															$totalObtMarks = $marks->whereIn('exmtypmodclssub_id', $extpmdclsb->pluck('id') )
																		->where('marks', '>', 0)->sum('marks');
															$totalFulMarks = $extpmdclsb->where('fm', '>', 0)->sum('fm');				
															
															$grade = getGrade($extype->id, $totalObtMarks, $totalFulMarks);
															$percentage = round( ( $totalObtMarks * 100 ) / $totalFulMarks , 0); //optional

															
															if( $clssub->combination_no != 0 ){
																//to find subject_ids of all commbined and additonal subjects
																$curr_clssubs_comb      = $clssubs->where('combination_no', $clssub->combination_no);
																$curr_clssubs_addl      = $clssubs->where('combination_no', -$clssub->combination_no);
																$curr_clssubs = $curr_clssubs_comb->merge($curr_clssubs_addl);

																$combaddl_subj_ids = $curr_clssubs->where('combination_no', '!=', 0)->pluck('id'); //fm er janya only combined, om er janya all comb+addl
																$combaddl_subj_count = $curr_clssubs->where('combination_no', '!=', 0)->count('id');
																
																//to find extpmdclsb_ids of all combined & addl subjects to get obtained marks
																$combaddl_etmcs_ids = $extpmdclsbs->where('extype_id', $extype->id)->whereIn('subject_id', $combaddl_subj_ids)->pluck('id');
																if( $combaddl_subj_count > 0 && $combaddl_subj_state == false){
																	$combaddl_subj_state = true;
																	$combaddl_subj_count_const = $combaddl_subj_count;
																}
															}														

														@endphp

														<td class="text-center">{{ $totalObtMarks }}/{{ $totalFulMarks }}</td>
														

														@if ( $combaddl_subj_state == false )													
															<td class="text-center"><small>{{ $percentage }}% </small> ({{ $grade }}) </td>												
														@endif

														@if( $combaddl_subj_state == true && $combaddl_subj_count_const == $combaddl_subj_count )
															@php
																// obtain marks = total marks obtained in comb or addl subjects, if comb = 0, then goto addl
																// fulll marks  = total marks either in comb or addl subjects
																$comb_subj_ids = $clssubs->where('combination_no', $clssub->combination_no)->pluck('subject_id');															
																$comb_subj_fm = $extpmdclsbs->whereIn('subject_id', $comb_subj_ids)->where('fm', '>', 0)->sum('fm');

																$comb_etmcs_ids = $extpmdclsbs->whereIn('subject_id', $comb_subj_ids)->pluck('id');
																$comb_total_ob_marks = $marks->whereIn('exmtypmodclssub_id', $comb_etmcs_ids )
																							->where('marks', '>', 0)->sum('marks');

																$percentage = round( ( $comb_total_ob_marks * 100 ) / $comb_subj_fm  , 0); //optional
																$grade = getGrade($extype->id, $comb_total_ob_marks , $comb_subj_fm );
																
															@endphp
															
															<td class="text-center" rowspan="{{$combaddl_subj_count_const}}">
																<small>{{ $percentage }}% </small>({{ $grade }}) 
															</td>
														@endif

														@php $combaddl_subj_count_const > 0 ? $combaddl_subj_count_const-- : $combaddl_subj_count_const ; @endphp

														@if( $combaddl_subj_state == true && $combaddl_subj_count_const == 0 )
															@php $combaddl_subj_state = false; @endphp
														@endif



														</tr>																							
													@endif												
												@endforeach											
											</tbody>
										</table>										
									</td>
								@endif   {{--  end of isExits --}}
					@endforeach
					</tr>
					<tr>
						@php
							$mode_count = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('mode_id')->count();
						@endphp
						@foreach($extypes as $extype)
							{{--  @foreach($modes as $mode)  --}}
								{{--  @if($extype->mode_id == $mode->id)  --}}
									<td><b>Total Obtained Marks: </b>
									@php
										$etmcs = $extpmdclsbs->where('extype_id', $extype->id)->pluck('id');
										$obtMarks = $marks->whereIn('exmtypmodclssub_id', $etmcs)
														->where('studentcr_id', $studentcrs->first()->id)
														->where('marks', '>', 0)
														->sum('marks');

									@endphp
									{{ $obtMarks }} (In Word: )<br>
									<b>Total No of 'Ds' Obtained: </b>
									
									</td>
								{{--  @endif  --}}
							{{--  @endforeach  --}}
						@endforeach
					
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<br>
		<table border="1" class="table table-bordered" width="100%">
				<thead>
					<tr>
						<th>Particulars</th>
						@foreach($exams as $exm)
							<th>{{$exm->name}}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="25%">Attendance of Students</td>
						@foreach($exams as $exm)
							<td></td>
						@endforeach
					</tr>
					<tr>
						<td>Signature of Class Teacer</td>
						@foreach($exams as $exm)
							<td></td>
						@endforeach
					</tr>
					<tr>
						<td>Signature of HM/TIC</td>
						@foreach($exams as $exm)
							<td></td>
						@endforeach
					</tr>
					<tr>
						<td>Signature of Gurdian</td>
						@foreach($exams as $exm)
							<td></td>
						@endforeach
					</tr>
				</tbody>
			</table>


		<img src="{{ url('rubindicator/rubricindicator2.png') }}" class="img-rounded" width="100%">



	<script type="text/javascript">
		$(document).ready(function(e){
			
		});  
	</script>

	</body>
</html>