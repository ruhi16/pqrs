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
                @foreach($etcss as $etcs)
                    @if($cls->id == $etcs->clss_id
                        && $extp->id == $etcs->extype_id
                        && $exam->id == $etcs->exam_id )
                        {{ $etcs->fm }}
                    @endif
                {{--  <input type="text" value="" name="ab{{$exam->id}}{{$extp->id}}{{$cls->id}}[]">  --}}
                @endforeach
            </td>
            @endforeach
        </tr>
        @endforeach    
    @endforeach    
    </tbody>
</table>

    
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
