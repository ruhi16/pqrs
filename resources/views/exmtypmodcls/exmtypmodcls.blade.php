@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<h1>Mode Controller...</h1>

<form method="post" class="form-horizontal" action="{!! url('exmtypmodcls-taskpaneSubmit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}


<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>Class</th>
    <th>Exam Type</th>
    @foreach($exms as $exm)
      <th>{{ $exm->name }}</th>
    @endforeach
  </tr>
</thead>
<tbody>
   @foreach($clss as $cls)
  
    @foreach($exts as $ext)
    <tr>
      <td>{{ $cls->name }}</td>
      <td>{{ $ext->name }}</td>
      @foreach($exms as $exm)
        <td>
        <div class="form-check form-check-inline">        
          @foreach($mods as $mod)            
            <input  class="form-check-input" type="checkbox" 
                    name="fm{{$cls->id}}{{$ext->id}}{{$exm->id}}{{$mod->id}}" id="inlineCheckbox1" 
                    value="option1">
            <label class="form-check-label" for="inlineCheckbox1">{{ $mod->name }}</label>
          @endforeach
        </div>
        </td>
      @endforeach
    </tr>
    @endforeach
    
  @endforeach
</tbody>
</table>


<button type="submit" class="btn btn-primary">Submit</button>
<button type="reset" class="btn btn-default">Reset</button>
</form>



<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
