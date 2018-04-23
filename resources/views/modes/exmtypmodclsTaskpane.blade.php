@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<h1>Mode Controller...</h1>
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
  {{-- <tr>
    <td>{{ $cls->name }}</td>
    <td>  --}}
    @foreach($exts as $ext)
    <tr>
      <td>{{ $cls->name }}</td>
      <td>{{ $ext->name }}</td>
      @foreach($exms as $exm)
        <td>
        @foreach($mods as $mod)
          {{ $mod->name }}
        @endforeach
        </td>
      @endforeach
    </tr>
    @endforeach
    {{--  </td>
  </tr> --}}
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
