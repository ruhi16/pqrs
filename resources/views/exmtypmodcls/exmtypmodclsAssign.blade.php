@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Mode Assignment</h1>
<form method="post" class="form-horizontal" action="{!! url('exmtypmodcls-AssignSubmit') !!}" value="{{ csrf_token() }}">  
{{ csrf_field() }}

<input type="hidden" name="clsId" value="{{ $clss->first()->id }}">
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
    @foreach($exts as $ext)
    <tr>
      <td class="text-center">{{ $clss->first()->name }}</td>
      <td>{{ $ext->name }}</td>
      @foreach($exms as $exm)
        <td>
        <div class="form-check form-check-inline">        
          @foreach($mods as $mod)    

            
            <input  class="form-check-input" 
                    type="checkbox" 
                    name="etmcss[]"  
                    value="{{ $ext->id}}-{{$exm->id}}-{{$mod->id}}">
            <label class="form-check-label" for="inlineCheckbox1">{{ $mod->name }}</label>
          @endforeach
        </div>
        </td>
      @endforeach
    </tr>
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
