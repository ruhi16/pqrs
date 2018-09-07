@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

{{--  @foreach($mrks as $mrk)
	{{ $mrk->exmtypmodclssub }}<br>
@endforeach  --}}

{{--  @foreach($stdcrs as $stdcr)

	{{ $stdcr }}<br>

@endforeach  --}}

{{--  @foreach($mrks->sortBy('studentcr_id') as $mrk)  --}}
	{{--  @if( $mrk->exmtypmodclssub->clss_id ==1 )  --}}
		{{--  {{ $mrk->studentcr_id }}  --}}
		{{--  {{ $mrk->exmtypmodclssub }} <br>  --}}
	{{--  @endif  --}}
{{--  @endforeach  --}}

<table class="table table-bordered">
<thead>
<tr>
<th>Roll</th>
<th>Student Name</th>
@foreach($subjs as $subj)	
	@if( $subj->subject->extype_id == 2)		
		<th>{{ $subj->subject->name }}</th>
	@endif
	
@endforeach
	<th>Grand Total</th>
	<th>Total No of D</th>
</tr>
</thead>
<tbody>
@foreach($stdcrs as $stdcr)
	<tr>
		@php $totalNoDs = 0; @endphp
		<td>{{ $stdcr->roll_no }}</td>
		<td>{{ $stdcr->studentdb->name }}</td>

		@php $grandTotal = 0; @endphp
		@foreach($subjs as $subj)
		@if( $subj->subject->extype_id != 1)	
		<td>
			@if ($subj->combination_no != 0)
				
				@php
					$count = $subjs->where('combination_no', $subj->combination_no)->count();

				@endphp
				{{ $count }}
			@endif
			@php $subjTotal = 0; @endphp
			@foreach($mrks as $mrk)
				@if($mrk->studentcr_id == $stdcr->id && $subj->id == $mrk->clssub_id)
					
					{{ $mrk->marks < 0 ? 'AB' : $mrk->marks }}+

					@php 
						$m = $mrk->marks < 0 ? 0 : $mrk->marks;
						$subjTotal += $m; 							
					@endphp
				@endif
			@endforeach
			
			
			={{ $subjTotal }}
			<small>({{ $subj->subject->code }})</small>
			
			@php
				$gr = getGrade(2, $subjTotal, 80 );
				if($gr == 'D'){
					$totalNoDs += 1;
				}
			@endphp
			{{ $gr }}	
			@php $grandTotal += $subjTotal; @endphp
		</td>
		@endif
		@endforeach
		<td>{{ $grandTotal }}</td>
		<td>{{ $totalNoDs }}</td>
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
