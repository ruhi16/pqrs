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
        font-size: 13px;
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
		<h3 class='text-center' align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
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


		<table border="1" class="table table-bordered" width="100%">
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
										<table border="1" class="table table-bordered" width="100%">
											<thead>
												<tr>
													<th class="text-center" rowspan='2' width="25%">Subject <br>Details
														{{--  {{ $mode_count }}-{{ $isExist }}  --}}
													</th>
													@foreach($exams as $exam)
														@if($mode_count > 1)
															<th class="text-center" colspan="3">{{ $exam->name }}</th>
														@else
															<th class="text-center">{{ $exam->name }}</th>
														@endif
													@endforeach
													<th class="text-center" rowspan='2'>Grand Total</th>
													<th class="text-center" rowspan='2'>Grade</th>
												</tr>
												<tr>
													{{--  <th class="text-center">Subject													  --}}
													</th>
													@foreach($exams as $exam)
														@if($mode_count > 1)
															<th class="text-center"><small>Summ</small></th>
															<th class="text-center"><small>Form</small></th>
															<th class="text-center"><small>Total</small></th>
														@else
															<th class="text-center">MO</th>
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
															<td style="vertical-align: middle;"  height="50">{{ $clssub->name }}</td>
														
														@php
															$extpmdclsb = $extpmdclsbs->where('extype_id', $extype->id)
																			->where('subject_id', $clssub->subject_id);																											
														@endphp
														@foreach($exams as $exam)
															
															@if( $mode_count > 1 )
																@php $subj_total = 0; @endphp
																@foreach($modes->sortByDesc('id') as $mode)
																	@php
																		$etmcs = $extpmdclsb->where('exam_id', $exam->id)
																					->where('mode_id', $mode->id)->first();

																		$obmrk = $marks->where('exmtypmodclssub_id', $etmcs->id)->first();
																		$mark = $obmrk == NULL ? '' : ($obmrk->marks < 0 ? 'AB' : $obmrk->marks);
																		$mark_num = $obmrk == NULL ? 0 : ($obmrk->marks < 0 ? 0 : $obmrk->marks);
																	@endphp
																	<td align="center" style="vertical-align: middle;">																
																		{{ $mark }}
																	</td>
																	@php $subj_total += $mark_num; @endphp
																@endforeach
																<td align="center" style="vertical-align: middle;">
																	<b>{{ $subj_total }}</b>
																</td>
															@else
																@php
																	$etmcs = $extpmdclsb->where('exam_id', $exam->id)->first();
																	$obtmark = $marks->where('exmtypmodclssub_id', $etmcs->id);

																	$obtmark = $obtmark->first();
																	$obtmark = $obtmark == NULL ? '' : ($obtmark->marks < 0 ? 'AB' : $obtmark->marks);

																@endphp
																<td  align="center" style="vertical-align: middle; font-size:18px;">
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

														<td  align="center" style="vertical-align: middle; font-size:18px;"><b>{{ $totalObtMarks }}</b>/{{ $totalFulMarks }}</td>
														

														@if ( $combaddl_subj_state == false )													
															<td  align="center" style="vertical-align: middle; font-size:18px;"><small>{{ $percentage }}% </small> ({{ $grade }}) </td>												
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
															
															<td rowspan="{{$combaddl_subj_count_const}}"  align="center" style="vertical-align: middle; font-size:18px;">
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
							@php							
							$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
						@endphp     

						@if( $isExist > 0 ) {{-- if any record exists for the specifix extype !!! --}}
									<td><b>Total Obtained Marks: </b>
									@php
										$etmcs = $extpmdclsbs->where('extype_id', $extype->id)->pluck('id');
										$obtMarks = $marks->whereIn('exmtypmodclssub_id', $etmcs)
														->where('studentcr_id', $studentcrs->first()->id)
														->where('marks', '>', 0)
														->sum('marks');

										$subj_et_ids = $subjects->where('extype_id', $extype->id)->pluck('id');
										$clssubs_reg = $clssubs->where('combination_no', '=', 0)
														->whereIn('subject_id', $subj_et_ids)
														->pluck('subject_id');
										
										$full_marks = $extpmdclsbs->whereIn('subject_id', $clssubs_reg)->sum('fm');
										$obt_perc = round( (($obtMarks / $full_marks) * 100), 2 );
									@endphp
									{{ $obtMarks }} ({{$obt_perc}}%) [FM: {{$full_marks}}] 
									<br>({{ convert($obtMarks) }})<br>
									{{--  <b>Total No of 'Ds' Obtained: </b>  --}}
									
									</td>
						@endif
						@endforeach
					
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<br>
		<table border="1" class="table table-bordered" width="100%">
				<thead>
					<tr>
						
						<th width="25%">Attendance of Students</th>
						<th>Signature of Gurdian</th>
						<th>Signature of Class Teacer</th>
						<th>Signature of HM/TIC</th>
						{{--  @foreach($exams as $exm)
							<th>{{$exm->name}}</th>
						@endforeach  --}}
					</tr>
				</thead>
				<tbody>
					<tr>
						<td height="40"></td>
						<td></td>
						<td></td>
						<td></td>
						
						{{--  @foreach($exams as $exm)
							<td></td>
						@endforeach  --}}
					</tr>
					<tr>
						
						{{--  @foreach($exams as $exm)
							<td></td>
						@endforeach  --}}
					</tr>
					<tr>
						
						{{--  @foreach($exams as $exm)
							<td></td>
						@endforeach  --}}
					</tr>
					<tr>
						
						{{--  @foreach($exams as $exm)
							<td></td>
						@endforeach  --}}
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