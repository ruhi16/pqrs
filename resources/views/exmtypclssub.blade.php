@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Exam-Type Class Subject Full Marks Page</h1>


<form method="post" class="form-horizontal" action="{!! url('exmtypclssub-submit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}

<table class="table table-bordered table-striped">
    <thead>
        <tr>  
            <th>Exam Type</th>      
            <th>Class</th>
        @foreach($exams as $exam)
            <th>{{$exam->name}}</th>
        @endforeach
        </tr>    
    </thead>

    <tbody>
    @foreach($clss as $cls)    
        @foreach($extps as $extp)    
        <tr>
            <td>{{$extp->name}}</td>    
            <td>{{$cls->name}}</td>
            @foreach($exams as $exam)
            <td>
                <input type="text" value="" name="ab{{$exam->id}}{{$extp->id}}{{$cls->id}}[]">
            </td>
            @endforeach
        </tr>
        @endforeach    
    @endforeach
    {{--  @foreach($extps as $extp)    
        @foreach($clss as $cls)
        <tr>
            <td>{{$extp->name}}</td>    
            <td>{{$cls->name}}</td>
            @foreach($exams as $exam)
            <td>
                <input type="text" value="" name="abcdef[]">
            </td>
            @endforeach
        </tr>
        @endforeach    
    @endforeach  --}}
    </tbody>
</table>


<button type="submit" class="btn btn-primary">Submit</button>
</form>





<script type="text/javascript">
  $(document).ready(function(e){
    
  });
</script>


@endsection


@section('footer')
	@include('layouts.footer')
@endsection
