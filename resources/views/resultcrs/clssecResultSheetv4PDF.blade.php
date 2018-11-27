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
					<td style="vertical-align: bottom;" height="30">Name: <strong>{{ $studentcrs->first()->studentdb->name }}</strong></td>
					<td style="vertical-align: bottom;">Student Id: _____________________</td>
					<td style="vertical-align: bottom;">Class: <strong>{{ $studentcrs->first()->clss->name }}</strong></td>
					<td style="vertical-align: bottom;">Section: <strong>{{ $studentcrs->first()->section->name }}</strong></td>
					<td style="vertical-align: bottom;">Roll No:<strong>{{ $studentcrs->first()->roll_no }}</strong></td>
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
												<th class="text-center" rowspan='3'>Grand Total<br></th>
												@if($mode_count > 1)			{{-- if it is IX class only --}}
													<th class="text-center" rowspan='3'>Average<br>100</th>
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
														<th class="text-center">MO</th>
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
											@endphp
											@foreach($clssubs->where('extype_id', $extype->id)->sortBy('is_additional')->sortBy('subject_order') as  $clssub)
												<tr>
													<td>{{ $clssub->name }} {{ $clssub->is_additional == 1 ? '(Addl)' : '' }}</td>
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


														$extype_total_marks += round($totalObtMarks, 0); 
													@endphp
													<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ $totalObtMarks }}</b></td>
													@if( $mode_count > 1 )
														<td align="center" style="vertical-align: middle; font-size:16px;"><b>{{ round($totalObtMarks/2, 0) }}</b></td>
														@php 
															if($clssub->is_additional == 0){
																$extype_total_obt_marks += round($totalObtMarks/2, 0); 
															}
														@endphp
													@endif
												</tr>												
											@endforeach
										</tbody>
									</table>	
									{{--  {{ $extype_total_obt_marks }}  --}}
								</td>
								
								@php 
									
									$extype_total[$extype->id] = $extype_total_marks;

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
								<td style="vertical-align: middle; font-size:16px;">										
									<b>Total Obtained Marks:</b>	{{ $extype_total_marks_arr[$extype->id] }}<br>
									({{ convert($extype_total_marks_arr[$extype->id]) }})
								</td>
										
							@endif
						@endforeach
					
					</tr>
					<tr>
						<td colspan="2">
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
						<td height="35"></td>
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
			<br>
			<table width="100%">
			<tr>
			<td>
				<table width="100%">
					<tr>
						<th>Scale</th>
						<th>Range</th>
						<th>Description</th>					
					</tr>
					@foreach($grades->where('extype_id', 2) as $grade)
					<tr>
						<td>{{$grade->gradeparticular->name}}</td>
						<td>{{$grade->stpercentage}}-{{$grade->enpercentage}}</td>
						<td>{{$grade->descrp}}</td>
					</tr>
					@endforeach
				</table>
			</td>
			<td>
				<b>Condition for promotion:</b>
				<P><b>For Class IX:</b> On the basis of comprehensive continuous evalution, to be promoted when minimum scoring of 
				Letter/Grade "C" obtained in Five/Seven compulsory subject out of Seven/Nine Compulsory Subjects.</p>
				<p><b>N.B.:</b>It is obligation for all student to attend classes and all evaluations(Arrangement to be made for further 
				evalution for the students failing to attend the evalution on resonable grounds.)</p>
				<p><b>Modalities for formative Examinations:</b><br>1. Survey Report, 2. Nature Study, 3. Case Study, 
				4. Creative Writing, 5. Model Making, 6.Open Book Evalution</p>
				
			</td>
			</tr>
			</table>

		{{--  <img src="{{ url('rubindicator/rubricindicator2.png') }}" class="img-rounded" width="100%">  --}}



	<script type="text/javascript">
		$(document).ready(function(e){
			
		});  
	</script>

	</body>
</html>