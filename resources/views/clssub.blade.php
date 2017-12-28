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
        
        @foreach($clss as $cls)
            <th>{{$cls->name}}</th>
        @endforeach
        </tr>    
    </thead>

    <tbody>
    <tr>    
    @foreach($clss as $cls)
    <td>
    @foreach($subjs as $subj)            
        <div class="checkbox">
            <label><input type="checkbox" value="{{$cls->id}}-{{$subj->id}}" name="clssub[]">{{$subj->name}}-{{$subj->extype_id}}</label>                    
        </div>                        
    @endforeach
    </td>
    @endforeach
    </tr>
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
