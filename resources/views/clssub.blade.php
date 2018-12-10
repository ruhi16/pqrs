@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Subject Combination...</h1>


<form method="post" class="form-horizontal" action="{!! url('clssub-submit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}
<table class="table table-bordered">
    <thead>
        <tr>
        <th>Exam Type</th>
        @foreach($clss as $cls)
            <th class="text-center">{{$cls->name}}</th>
        @endforeach
        
        </tr>    
    </thead>

    <tbody>
    @foreach($extps as $extp)        
    <tr>    
        <th class="align-bottom">{{ $extp->name }}</th>
    @foreach($clss as $cls)
        <td>
        @foreach($subjs as $subj)
        @if($extp->id == $subj->extype_id)
            @php $flag = FALSE; @endphp            
            @foreach($clssubs as $clssub)
                @if($cls->id == $clssub->clss_id && $subj->id == $clssub->subject_id )
                <div class="checkbox">
                    <label><input type="checkbox" value="{{$cls->id}}-{{$subj->id}}" name="clssub[]" checked>{{$subj->name}}-{{$subj->extype_id}}</label>
                    @php $flag = True; @endphp
                </div>
                @endif
            @endforeach  
            @if($flag == FALSE)
                <div class="checkbox">
                    <label><input type="checkbox" value="{{$cls->id}}-{{$subj->id}}" name="clssub[]">{{$subj->name}}-{{$subj->extype_id}}</label>                    
                </div>
            @endif
        @endif
        @endforeach
        </td>
    @endforeach
    </tr>
    @endforeach
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
