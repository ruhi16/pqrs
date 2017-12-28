@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Extype Class Subject Combination...</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>  
            <th>#</th>
            <th>Exam</th>
            <th>Exam Type</th>      
            <th>Class</th>            
            <th>Full Marks</th>
            <th>Session</th>
            
        {{--  @foreach($exams as $exam)
            <th>{{$exam->name}}</th>
        @endforeach  --}}
        </tr>    
    </thead>

    <tbody>
    
    @foreach($etcss as $etcs)    
    <tr>
        <td>{{$etcs->id}}</td>    
        <td>{{$etcs->exam_id}}</td>
        <td>{{$etcs->extype_id}}</td>
        <td>{{$etcs->clss_id}}</td>
        <td>{{$etcs->fm}}</td>
        <td>{{$etcs->session_id}}</td>
        {{--  @foreach($exams as $exam)
        <td>
            <input type="text" value="" name="ab{{$exam->id}}{{$extp->id}}{{$cls->id}}[]">
        </td>
        @endforeach  --}}
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
