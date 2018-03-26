@extends('layouts.baselayout')

@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Students Detail Edit Records...</h1>

<form class="form-horizontal" method="post" action="{!! url('/studentdbEditpage-submit') !!}" id="sform" role="form" data-toggle="validator">
  {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-heading">Official Details</div>
      <div class="panel-body">      
      <input type="hidden" value="{{ $stddb->id }}" name="editStddbId">

      <div class="alert alert-info" role="alert">Admission Details (Office )</div>
      <div class="form-group">      
        <label class="control-label col-sm-1" for="admName">Name:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="admName" id="admName" value="{{ $stddb->name }}" value="{{ $stddb->name }}">
        </div>

        <label class="control-label col-sm-1" for="admClss">Class:</label>
        <div class="col-sm-2">
          <select class="form-control" name="admClss" id="admClss">
            <option value=""></option>
            @foreach($clss as $cls)            
              <option value="{{ $cls->id }}" {{ $cls->id == $stddb->stclss_id ? 'selected' : ''}}>{{ $cls->name }}</option>            
            @endforeach
          </select>
        </div>

        <label class="control-label col-sm-1" for="admSecn">Section:</label>
        <div class="col-sm-2">
          <select class="form-control" name="admSecn" id="admSecn">
            <option value=""> </option>
            @foreach($secn as $sec)
              <option value="{{ $sec->name }}" {{ $sec->id == $stddb->stsec_id ? 'selected' : ''}}>{{ $sec->name }}</option>            
            @endforeach
          </select>
        </div>
      </div>


        <div class="form-group">
          <label class="control-label col-sm-1" for="admGndr">Gender:</label>
          <div class="col-sm-2">
              <select class="form-control" name="admGndr" id="admGndr">
                <option value=""> </option>
                @foreach($ssex as $sx)
                  <option value="{{ $sx->options }}" {{ $sx->options == $stddb->ssex ? 'selected' : '' }}>{{ $sx->options }}</option>            
                @endforeach
              </select>
            </div>

            <label class="control-label col-sm-2" for="admRelg">Religion:</label>
            <div class="col-sm-2">
              <select class="form-control" name="admRelg" id="admRelg">
                <option value=""> </option>
                @foreach($relg as $rel)
                  <option value="{{ $rel->options }}" {{ $rel->options == $stddb->relg ? 'selected' : '' }}>{{ $rel->options }}</option>            
                @endforeach
              </select>
            </div>

            <label class="control-label col-sm-1" for="admCste">Caste:</label>
            <div class="col-sm-2">
              <select class="form-control" name="admCste" id="admCste">
                <option value=""> </option>
                @foreach($cste as $cst)
                  <option value="{{ $cst->options }}" {{ $cst->options == $stddb->cste ? 'selected' : '' }}>{{ $cst->options }}</option>            
                @endforeach
              </select>
            </div>
        </div> {{-- end of form-group --}}



      
        
      <br>

      <div class="form-group"> 
        <div class="col-sm-offset-1 col-sm-1">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

        <div class="col-sm-8">
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
      </div>
    
    </div> {{-- end of panel body --}}
  </div>  {{-- end of panel default --}}
</form>










<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
