@extends('layouts.baselayout')
@section('title','LogIn Page')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<table class="table table-bordered table-striped">

	<tr>
		<th class="text-center">Sl</th>
		<th class="text-center">Name</th>
		<th class="text-center">Designation</th>
		<th class="text-center">Role</th>
		<th class="text-center">Ans Sc Details</th>
		<th class="text-center">User Id / Email</th>
		<th class="text-center">Password</th>
		<th class="text-center">Remarks</th>
	</tr>

@foreach($teachers as $teacher)
	<tr>
		<td class="text-center">{{ $teacher->id }} </td>
		<td>{{ $teacher->name }} </td>
		<td class="text-center">{{ $teacher->desig }} </td>
		<td class="text-center">{{ $users->where('teacher_id', $teacher->id)->first()->role->name }}</td>
		<td>			
			@foreach($ansscdists->where('teacher_id', $teacher->id)->groupBy('exam_id') as $subjs )
				{{ $subjs->first()->exam->name }}: Total : {{ $subjs->count() }}	 
				@php $count = 0; @endphp
				@foreach($subjs as $subj)
						{{--  {{ $subj->clss->name }}-{{ $subj->section->name }}-{{ $subj->subject->code }},({{ $subj->finlz_dt == NULL ? '???' : 'Done' }})  --}}
						{{--  Total: {{ $subj->clss->name }}  --}}
						@php $subj->finlz_dt == NULL ?: $count++  @endphp
				@endforeach
				Finalize: {{ $count }}
				<br>
			@endforeach
			{{--  {{ $ansscdists->where('teacher_id', $teacher->id) }}  --}}
		</td>
		<td class="text-center">{{ $users->where('teacher_id', $teacher->id)->first()->email or ''}} </td>
		<td class="text-center">asdfgh </td>
		<td></td>
	</tr>
@endforeach
</table>








<script type="text/javascript">
	$(document).ready(function(e){
		
	});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
