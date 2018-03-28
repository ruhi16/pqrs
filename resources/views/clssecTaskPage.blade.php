@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Section Wise Task Page</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL</th>
            <th>Class</th>
            <th>Sections</th>
            <th>Class Teacher</th>
            <th>Admission</th>
            <th>Marks Entry</th>
            {{--  <th>Subject Wise Full Marks</th>  --}}
            <th>Marks Register</th>
            <th>Result Sheet</th>
        </tr>
    </thead>
    <tbody>
@foreach($clssecs as $clssec)
    <tr>
    <td>{{$clssec->id}}</td>
    <td>{{$clssec->clss()->first()->name}}</td>
    <td>{{$clssec->section()->first()->name}}</td>
    <td>
        <button class="btn btn-success btn-sm btnClsTeacherEdit" data-toggle="modal"  data-cls="{{$clssec->clss->id}}" data-sec="{{$clssec->section->id}}" data-target="#myModal">Edit</button> 
        
        @php $teacher_id = $clssteachers->where('clss_id', $clssec->clss->id)
                ->where('section_id', $clssec->section->id)->first()['teacher_id'] 
        @endphp

        {{ $teachers->where('id', $teacher_id)->first()['name']}}

    </td>
    <td><a href="{{url('/clssec-AdminPage',[$clssec->clss_id,$clssec->section_id])}}">Clss-Sec Admission</a></td>
    <td><a href="{{url('/clssec-MrkenPage',[$clssec->id])}}">Clss-Sec Mark Entry Status</a></td>
    {{--  <td><a href="{{url('/exmtypclssubfmEntry',[$clssec->clss_id])}}">Full Mark Entry</a></td>  --}}
    <td><a href="{{url('/clssec-MarksRegister',[$clssec->id])}}">Clss-Sec Mark Register</a></td>
    <td><a href="{{url('/clssec-ResultTaskpane',[$clssec->id])}}">Students Individual Result Sheet</a></td>
    </tr>
@endforeach
        
    </tbody>
</table>



<!-- Modal Starts to Add New Class -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>'/clssecTaskPage-teacherSubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select Class Teacher</h4>
      </div>
      <div class="modal-body">        


		    <div class="form-group">
        	    <label class="control-label col-sm-4" for="clssName">Select Teachers:</label>
                <input type="hidden" name="clssId" >
                <input type="hidden" name="secnId" >
				<div class="col-sm-6">
                    <select class="form-control" name="selectTeacher" id="selectTeacher">
                    <option value="0"></option>
                    @foreach($teachers as $teacher)              
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>              
                    @endforeach
                    </select>  
                </div>         
      	    </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal Ends -->












<script type="text/javascript">
  $(document).ready(function(e){
      $('.btnClsTeacherEdit').on('click', function(){
      var cId = $(this).data('cls');
      var sId = $(this).data('sec');
      
      // alert(cId);


      $('input[name="clssId"]').val(cId);
      $('input[name="secnId"]').val(sId);
      
      //$('#editModal').modal('show');
    });

    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
