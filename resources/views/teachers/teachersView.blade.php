@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Teachers Details Display Page...</h1>

<div class="row">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
      <h3 class="panel-title pull-left">Exam Details</h3>
      
        <div class="clearfix"></div>
    
    </div>
    {{--  <div class="panel-body">
      <p>...</p>
    </div>  --}}

		<table class="table table-bordered" id="tabclss">
			<thead>
				<tr>
          <th>SL</th>
          <th>Name</th>
          <th>Mobile</th>          
          <th>Designation</th> 
          <th>Qualification</th>         
          <th>Main Subject</th>
          <th>Other Subjects</th>
          <th>Status</th>
          <th>Notes</th>
          <th>Action</th>
				</tr>
			</thead>
			<tbody>
      {{--  @foreach($exams as $exam)
        <tr id="tr{{$exam->id}}">
          <th id="id">  {{ $exam->id}}</th>
          <th id="name">{{ $exam->name }}</th>
          <td>{{ $exam->session_id }}</td>
          <td>{{ $exam->session_id }}</td>
          <td>              
          </td>
        </tr>
      @endforeach  --}}
      @foreach($teachers as $teacher)
        <tr>
          <td>{{ $teacher->id }}</td>
          <td>{{ $teacher->name }}</td>
          <td>{{ $teacher->mobno }}</td>          
          <td>{{ $teacher->desig }}</td> 
          <td>{{ $teacher->hqual }}</td>         
          <td>{{ $teacher->mnsub_id }}</td>
          <td>
              @foreach($teacher->subjects as $tSub)
              {{ $tSub->name }} <br>
              @endforeach
          </td>
          <td>{{ $teacher->status }}</td>
          <td>{{ $teacher->notes }}</td>
          <td><a href="{{url('/teachers-takspan',[$teacher->id])}}">Go to Taskpane</a></td>
				</tr>
      @endforeach
			</tbody>
		</table>
  </div><!--/panel starting div -->
</div><!--/1st row within 2nd column -->





<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
