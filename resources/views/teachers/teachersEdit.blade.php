@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Teachers Details Edit Page...</h1>

<div class="panel panel-default">
  <div class="panel-body">

    {!! Form::open(['url'=>'/teachers-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
        <input type="hidden" value="{{$teacher->id}}" name="teacherId">
		<div class="form-group">
        	<label class="control-label col-sm-1" for="teacherName">Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="teacherName" name="teacherName" value="{{$teacher->name}}" placeholder="">
                </div>         
        
        	<label class="control-label col-sm-1" for="teacherMob">Mobile:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="teacherMob" name="teacherMob"  value="{{$teacher->mobno}}" placeholder="">
                </div>         
        </div>


      <div class="form-group">
        	<label class="control-label col-sm-1" for="teacherDesig">Desig.:</label>
			<div class="col-sm-3">
            <select class="form-control" name="teacherDesig" id="teacherDesig">
                <option value=""></option>            
                @foreach($teachDesigs as $tDesig)
                    <option value="{{ $tDesig->options }}" {{$tDesig->options == $teacher->desig ? 'selected':''}}>{{ $tDesig->options }}</option>
                @endforeach
            </select>				
			</div> 

            <label class="control-label col-sm-1" for="teacherHQual">Qual.:</label>
			<div class="col-sm-3">
            <select class="form-control" name="teacherHQual" id="teacherHQual">
                <option value=""></option>            
            @foreach($teachHQuals as $tHQual)
                <option value="{{ $tHQual->options }}" {{$tHQual->options == $teacher->hqual ? 'selected':''}}>{{ $tHQual->options }}</option>
            @endforeach
            </select>			
			</div> 


            <label class="control-label col-sm-1" for="teacherMSubj">Subject.:</label>
			<div class="col-sm-3">
            <select class="form-control" name="teacherMSubj" id="teacherMSubj">
                <option value=""></option>            
                @foreach($teachSubjs as $tSubj)
                    <option value="{{ $tSubj->id }}" {{$tSubj->id == $teacher->mnsub_id ? 'selected':''}}>{{ $tSubj->name }}</option>
                @endforeach
            </select>
			</div> 
        </div>


        <div class="col-sm-offset-1 panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Prefered Subjects</h3>
            </div>
            <div class="panel-body">
            {{--  {{dd($teacher->subjects)}}  --}}
            @foreach($teachSubjs as $tSubj)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="{{ $tSubj->id }}" name="teacherSubj[]"
                            {{$teacher->subjects->contains($tSubj->id)?'checked':''}}>{{ $tSubj->name }}</label>
                    @php $flag = True; @endphp
                </div>
            @endforeach
          </div>
        </div>

    {{--  <button type="button" class="btn btn-default">Close</button>  --}}
    <button type="submit" class="btn btn-primary">Save changes</button>

	{!! Form::close() !!}
    </div>{{--  end of panel body  --}}
</div>{{--  end of panel  --}}


<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
