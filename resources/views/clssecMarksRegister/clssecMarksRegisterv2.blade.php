@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Marks Register V-2</h1>

	{{--  {{ print_r($clssecDetails) }}  --}}

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
			{{--  {{ print_r($clssecDetail) }}<br><br>  --}}
			@foreach($clssecDetail as $clssec)				
				@if($loop->first)
				<td>
					{{--  @php $stdDetails = $clssec; @endphp  --}}					 
					{{--  @foreach($clssec as $k => $v)
						{{ $k }} => {{ $v }}, 
					@endforeach  --}}
					{{--  {{ $clssec->id }}  --}}
					{{ print_r($clssec) }}
				</td>
				@else 
				<td>
					@foreach($clssec as $subject)

						@foreach($subject as $subjDetail)
							@if($loop->first)
								{{ print_r($subjDetail) }}
							@endif
							{{--  <br>  --}}
							@if($loop->last)
								{{ print_r($subjDetail) }}
								{{--  @foreach($subjDetail as $exam)
									<br>{{ print_r($exam) }}
								@endforeach  --}}
							@endif
							<br>
						@endforeach
						<br><br>
					@endforeach
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
