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
        {{--  font-size: 14px;  --}}
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
	h1, p, h2, h3, h4, h5, h6 {
	margin-top: 0;
	margin-bottom: 0;
	/*line-height: *//* adjust to tweak wierd fonts */;
	}
	
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
		<p align='center'>Mobile No: 9933 176671		
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Institution Code: {{ $school->hscode }}
						
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
		Index No: {{ $school->index }}</p>
		<h1 class='text-center' align="center">{{ $school->name }}</h1>
		<p align='center'>DISE CODE: {{ $school->disecode }}</p>
		<h3 class='text-center' align="center">{{ $school->po }} * {{ $school->ps }} * {{ $school->dist }}</h3>
		<h2 class='text-center' align="center">Progress Report for Session {{ $session->name }}</h2>
		<br>

		@php
			$QRstring  = $school->name.'-'.$school->disecode.'-'.$session->name.'-';
			$QRstring .= $studentcrs->first()->studentdb->name .'-'. $studentcrs->first()->clss->name .'-'.$studentcrs->first()->section->name.'-'.$studentcrs->first()->roll_no.';';
			$QRstring .= $studentcrs->first()->studentdb->admSlNo .'/'. $studentcrs->first()->studentdb->admDate. ';';
			foreach($extypes as $et){
				if( $resultcrs->where('extype_id', $et->id)->first() ){
					$QRstring .= $et->name.':';
					$QRstring .= $resultcrs->where('extype_id', $et->id)->first()->obtnmarks;
					$QRstring .= '/'.$resultcrs->where('extype_id', $et->id)->first()->fullmarks;
					$QRstring .= '- Ds: '.$resultcrs->where('extype_id', $et->id)->first()->noofds.'--';
				}
			}
			$QRstring .= 'Result: '.$studentcrs->first()->result;
		@endphp
		<table border="1" class="table table-bordered" width="100%">
			<thead>
				<tr width="20%">
					<td style="vertical-align: middle;" height="40" align="right" width="15%">Name </td>
					<td style="vertical-align: middle; padding-left: 25px;" height="40"><strong>{{ $studentcrs->first()->studentdb->name }}</strong></td>
					<td rowspan='5' width="40%" align='right'><small>{!! QrCode::size(130)->margin(0)->generate($QRstring) !!}</small></td>
				</tr>
				<tr>
					<td style="vertical-align: bottom;" align="right">Student Id </td>
					<td style="vertical-align: middle; padding-left: 25px;" ><b>{{ $studentcrs->first()->studentdb->admSlNo }}/{{ $studentcrs->first()->studentdb->admDate }}</b></td>
				</tr>
				<tr>
					<td style="vertical-align: bottom;"  align="right">Class </td>
					<td style="vertical-align: middle; padding-left: 25px;" ><strong>{{ $studentcrs->first()->clss->name }}</strong></td>
				</tr>
				<tr>
					<td style="vertical-align: bottom;" align="right">Section </td>
					<td style="vertical-align: middle; padding-left: 25px;" ><strong>{{ $studentcrs->first()->section->name }}</strong></td>
				</tr>
				<tr>
					<td style="vertical-align: bottom;" align="right">Roll No</td>
					<td style="vertical-align: middle; padding-left: 25px;" ><strong>{{ $studentcrs->first()->roll_no }}</strong></td>
				</tr>
			</thead>
		</table>
		
		
		<table border="1" class="table table-bordered" width="100%">
			<thead>
				<tr>				
					@foreach($extypes as $extype)
						@php
							$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();
						@endphp
						@if( $isExist > 0 )
							<th class="text-center" width="40%">{{ $extype->name }}</th>
						@endif
					@endforeach
				</tr>		
			</thead>
			<tbody>
				@foreach($clssecMarks->groupBy('studentcr_id') as $studentcr) {{-- for each Student --}}
					@php $extype_total_marks = 0; $extype_total_marks_arr = [];@endphp
					<tr>
						@foreach($extypes as $extype)
							@php
								// how many extype exists for current class, i.e. summative, formative or both
								$isExist = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('extype_id')->count();									
							@endphp
							
							@if( $isExist > 0 ) {{-- if any record exists for the specific extype !!! --}}
								@php	
									$marks = $clssecMarks->where('studentcr_id', $studentcr->unique('studentcr_id')->first()->studentcr->id);								
									$mode_count = $extpmdclsbs->where('extype_id', $extype->id)->groupBy('mode_id')->count();
								@endphp
								<td>										
									<table border="1" class="table table-bordered" width="100%">
										<thead>
											<tr>
												<th class="text-center" rowspan='3' width="25%">Subject <br>Details
													{{--  {{ $mode_count }}-{{ $isExist }}  --}}
												</th>
												@foreach($exams as $exam)
													@if($mode_count > 1)
														<th class="text-center" colspan="3">{{ $exam->name }}</th>
													@else
														<th class="text-center">{{ $exam->name }}</th>
													@endif
												@endforeach
												
												@if($mode_count > 1)			{{-- if it is IX class only --}}
													<th class="text-center" rowspan='3'>Grand Total<br>[200]</th>
													<th class="text-center" rowspan='3'>Average<br>[100]</th>
												@else 
													<th class="text-center" rowspan='3'>Grand Total<br></th>
												@endif
												<th class="text-center" rowspan='3'>Grade</th>
											</tr>
											<tr>
												{{--  <th class="text-center">Subject</th>  --}}
												@foreach($exams as $exam)
													@if($mode_count > 1)
														<th class="text-center"><small>Summ</small></th>
														<th class="text-center"><small>Form</small></th>
														<th class="text-center"><small>Total</small></th>
													@else
														@php
															$extype_fm = $extpmdclsbs->where('extype_id', $extype->id)->where('exam_id', $exam->id)
																			->where('clss_id', $studentcrs->first()->clss->id)->first()->fm;
															//echo $extype_fm;

														@endphp
														<th class="text-center"><small>[FM:{{ $extype_fm }}]</small><br>MO</th>
													@endif
												@endforeach
												
											</tr>
											<tr>													
												</th>
												@foreach($exams as $exam)
													@if($mode_count > 1)
														@php $total = 0; @endphp
														@foreach($modes->sortByDesc('id') as $mode)
															@php																		
																$etmcs_fm =$extpmdclsbs->where('exam_id', $exam->id)
																		->where('mode_id', $mode->id)->first()->fm;
																$total += $etmcs_fm;
															@endphp
															<th class="text-center"><small>{{ $etmcs_fm }}</small></th>
														@endforeach
														
														<th class="text-center"><small>{{ $total }}</small></th>
													@else
														{{--  <th class="text-center">MO</th>  --}}
													@endif
														
												@endforeach
												
											</tr>
										</thead>
										<tbody>
											@php 
												$extype_total_obt_marks = 0; 
												$extype_total_marks = 0;
												$extype_comb_alter_subj_flag = false;											
											@endphp
											@foreach($clssubs->where('extype_id', $extype->id)->sortBy('is_additional')->sortBy('subject_order') as  $clssub)
												<tr>
													<td style="vertical-align: middle; font-size:14px;" width="25%">
														{{ $clssub->name }} {{ $clssub->is_additional == 1 ? '(Addl)' : '' }}
													</td>
													@php
														$extpmdclsb = $extpmdclsbs->where('extype_id', $extype->id)
																			->where('subject_id', $clssub->subject_id);
														//$extype_total_subj_marks = 0;
														//$extype_total_avg_marks = 0;
													@endphp
													@foreach($exams as $exam)															
														@if( $mode_count > 1 )	{{-- for class IX --}}
															@php $subj_total = 0; @endphp
															@foreach($modes->sortByDesc('id') as $mode)
																@php
																	$etmcs = $extpmdclsb->where('exam_id', $exam->id)
																				->where('mode_id', $mode->id)->first();
																	$etmcs_fm =$extpmdclsb->where('exam_id', $exam->id)
																				->where('mode_id', $mode->id)->first()->fm;

																	$obmrk = $marks->where('exmtypmodclssub_id', $etmcs->id)->first();

																	$mark = $obmrk == NULL ? '' : ($obmrk->marks < 0 ? 'AB' : $obmrk->marks);
																	$mark_num = $obmrk == NULL ? 0 : ($obmrk->marks < 0 ? 0 : $obmrk->marks);
																@endphp
																<td align="center" style="vertical-align: middle;">																
																	{{ $mark }}
																</td>
																@php																	
																	$subj_total += $mark_num; 
																@endphp
															@endforeach
															<td align="center" style="vertical-align: middle;">
																<b>{{ $subj_total }}</b>
															</td>
															@php
																//$extype_total_marks += $subj_total;
																//$extype_total_subj_marks += $subj_total; 
															@endphp															
														@else					{{-- for class V to VIII --}}
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
														@php
															// $extype_total_subj_marks += $subj_total;
														@endphp
													@endforeach
													@php
														$extpmdclsb = $extpmdclsbs->where('extype_id', $extype->id)
																			->where('subject_id', $clssub->subject_id);
														$totalObtMarks = $marks->whereIn('exmtypmodclssub_id', $extpmdclsb->pluck('id') )
																			->where('marks', '>', 0)->sum('marks');

														$totalFulMarks = $extpmdclsb->where('fm', '>', 0)->sum('fm');
														$totalObtMarksPercentage = round( (($totalObtMarks / $totalFulMarks) * 100),0);

														$extype_total_marks += $totalObtMarks;
													@endphp
													<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ $totalObtMarks }}</b></td>

													@if( $mode_count > 1 ){{-- only for IX-X, the Average & Grade Column --}}
														{{--  <td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ $totalObtMarksPercentage }}</b></td>  --}}
														
														@if($clssub->is_additional == 0)
															@php $extype_total_obt_marks += $totalObtMarksPercentage; @endphp //round($totalObtMarks/2, 0); 
															<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ $totalObtMarksPercentage }}</b></td>
															<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ getGrade($extype->id, $totalObtMarksPercentage, 100) }}</b></td>
														@else
															<td align="center" style="vertical-align: middle; font-size:16px;"><b></b></td>
															<td></td>
														@endif
													@else
														{{-- for class V to VIII, calculate Grade for Combined/Alternative Subjects --}}
														@if( $clssub->combination_no == 0 )
															<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ getGrade($extype->id, $totalObtMarks, $totalFulMarks)}}</b></td>
														@else 
															{{-- calculate Grade for Combined Subject --}}
															@php
																$comb_altr_clssubs = $clssubs->where('extype_id', $extype->id)->where('combination_no', '!=', 0)
																	->sortBy(function($query){
																	return $query->combination_no < 0 ? -$query->combination_no : $query->combination_no;
																});
																// only combined subjects full marks
																$comb_alter_subj_ids = $comb_altr_clssubs->where('combination_no', '>', 0)->pluck('id');
																$clmb_alter_subj_fms = $extpmdclsbs->whereIn('subject_id', $comb_alter_subj_ids)->where('fm', '>', 0)->sum('fm');
																
																$comb_alter_subj_etmcs_ids = $extpmdclsbs->whereIn('subject_id', $comb_altr_clssubs->pluck('subject_id'))->pluck('id');
																$comb_alter_subj_obt_marks = $marks->whereIn('exmtypmodclssub_id', $comb_alter_subj_etmcs_ids )
																							->where('marks', '>', 0)->sum('marks');

															@endphp

															@if( $extype_comb_alter_subj_flag == false )
																<td align="center" style="vertical-align: middle; font-size:16px;" rowspan="{{$comb_altr_clssubs->count()}}">
																	{{--  {{$clssub->subject_id}}:<b>{{ $comb_altr_clssubs->count() }}</b>{{ $comb_altr_clssubs->pluck('subject_id') }}  --}}
																	<small>[{{ $comb_alter_subj_obt_marks }}/{{ $clmb_alter_subj_fms}}]</small>
																	<br><b>{{ getGrade($extype->id, $comb_alter_subj_obt_marks, $clmb_alter_subj_fms)}}</b>
																</td>
															@endif

															@php $extype_comb_alter_subj_flag = true; @endphp

														@endif {{-- end of combined subject --}}

													@endif {{-- end of V-VIII and IX-X division --}}
												</tr>												
											@endforeach {{-- end of clssubs --}}
										</tbody>
									</table>	
									{{--  {{ $extype_total_obt_marks }}  --}}
								</td>
								
								@php 									
									// $extype_total[$extype->id] = $extype_total_marks;

									if( $mode_count > 1 ){	// for class IX-X										
										$extype_total_marks_arr[$extype->id] = $extype_total_obt_marks; //$extype_total_marks;										
									}else{ // for class V-VIII
										$extype_total_marks_arr[$extype->id] = $extype_total_marks;										
									}
								@endphp		
							@endif   {{--  end of isExits --}}
						@endforeach  {{--  end of extype  --}}
						
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
								@php
									$subj_et_ids = $subjects->where('extype_id', $extype->id)->pluck('id');
									$clssubs_reg = $clssubs->where('combination_no', '>=', 0)->where('is_additional', '=', 0)
														->whereIn('subject_id', $subj_et_ids)->pluck('subject_id');

									$full_marks = $extpmdclsbs->whereIn('subject_id', $clssubs_reg)->sum('fm');
								@endphp
								<td style="vertical-align: middle; font-size:16px;">										
									<b>Total Marks Obt.:</b> {{ $extype_total_marks_arr[$extype->id] }} 
									@if( $mode_count > 1 )	{{-- for class IX-X --}}
										 [ FM: {{ $full_marks/2 }} ], Percentage of Marks: {{ ($extype_total_marks_arr[$extype->id]/($full_marks/2)) * 100}}%
									@else {{-- for class V to VIII --}}
										[ FM: {{ $full_marks }} ], Percentage of Marks: {{ round( ($extype_total_marks_arr[$extype->id]/($full_marks)) * 100, 0) }}%
									@endif
									<br>({{ convert($extype_total_marks_arr[$extype->id]) }})
								</td>
										
							@endif
						@endforeach
					
					</tr>
					<tr>
						<td colspan="2" style="vertical-align: middle; font-size:18px;">
							<b>Result: </b>{{ $studentcrs->first()->result or "Not Finalized "}}
						
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<br>
		<table border="1" class="table table-bordered" width="100%">
				<thead>
					<tr>
						
						<th width="25%">Attendance of Students</th>
						<th>Signature of Guardian</th>
						<th>Signature of Class Teacher</th>
						<th>Signature of HM/TIC</th>
						{{--  @foreach($exams as $exm)
							<th>{{$exm->name}}</th>
						@endforeach  --}}
					</tr>
				</thead>
				<tbody>
					<tr>
						<td height="45"></td>
						<td></td>
						<td></td>
						<td></td>						
					</tr>
					<tr>						
					</tr>
					<tr>						
					</tr>
					<tr>						
					</tr>
				</tbody>
			</table>
			{{--  {{dd($grades)}}  --}}
			

			@if( $clssubs->first()->clss_id > 4 ) {{-- for class IX & X --}}
			<br>
			<table width="100%">
			<tr>
			<td width="40%">
				<table width="100%">
					<tr>
						<th>Scale</th>
						<th>Range</th>
						<th>Description</th>					
					</tr>
					@foreach($grades->where('extype_id', 2) as $grade)
					<tr>
						<td align="center">{{$grade->gradeparticular->name}}</td>
						<td align="center">{{(int)$grade->stpercentage}}% - {{(int)$grade->enpercentage}}%</td>
						<td align="center">{{$grade->descrp}}</td>
					</tr>
					@endforeach
				</table>
			</td>
			<td>
				<b>Condition for promotion:</b>
				<P><b>For Class IX:</b> On the basis of comprehensive continuous evalution, to be promoted when minimum scoring of 
				Letter/Grade "C" obtained in Five/Seven compulsory subject out of Seven/Nine Compulsory Subjects.</p>
				<p><b>N.B.:</b>It is obligation for all students to attend classes and all evaluations(Arrangement to be made for further 
				evalution for the students failing to attend the evalution on reasonable grounds.)</p>
				<p><b>Modalities for formative Examinations:</b><br>1. Survey Report, 2. Nature Study, 3. Case Study, 
				4. Creative Writing, 5. Model Making, 6.Open Book Evalution</p>
				
			</td>
			</tr>
			</table>
			
			<p><small>N.B.: 'Health & Physical Education' and 'Art & Work Education' Combinedly OR 'Computer Application' of 50 marks each or 100 marks examination 
			respectively, held once in an Academic year. Above mentioned subjects along with Arabic also will be treated as Additional Subject</small></p>
			@else
				<img src="{{ url('rubindicator/rubricindicator2.png') }}" class="img-rounded" >
			@endif



	<script type="text/javascript">
		$(document).ready(function(e){
			
		});  
	</script>

	</body>
</html>