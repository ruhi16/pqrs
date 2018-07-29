@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Marks Entry Page...</h1>

<table class = "table table-bordered">
    <tr>
        <th>Exam / Type</th>
        <td>{{ $extpcls->exam->name }} / {{ $extpcls->extype->name }}</td>
        <td></td>        
        <th>Subject</th>
        <td>{{ $clsb->subject->name }}</td>
        <td></td>
        <th>Full Marks</th>
        <td>{{ $extpcls->fm }}</td>
        <td></td>
    </tr>
    <tr>
        <th>Class</th>
        <td>{{ $extpcls->clss->name }}</td>
        <td></td>
        <th>Section</th>
        <td>{{ $clsc->section->name }}</td>
        <td></td>
        <th>Teacher</th>
        <th>{{ $teacher->teacher->name or 'N/A' }}</th>
        <td></td>
    </tr>
</table>
{{--  <br>For the Exam: {{ $extpcls->exam->name }}
<br>For the Exam Type: {{ $extpcls->extype->name }}
<br>For the Class: {{ $extpcls->clss->name }}
<br>For the Section: {{ $clsc->section->name }}
<br>For the Section: {{ $clsb->subject->name }}  --}}


<table class="table table-bordered">
<thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Marks Details</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach($stdcrs as $stdcr)
    <tr>
        <td>{{ $stdcr->id }}</td>
        <td>{{ $stdcr->studentdb->name }}</td>
        <td>{{ $stdcr->roll_no }}</td>

        <td>         
        <div class="input-group">
            <div class="input-group-addon">
                <input type="checkbox" aria-label="Checkbox for following text input" class="chkbox" name="{{$stdcr->id}}">                
            </div>
            <input  type="text" class="form-control marks{{$stdcr->id}}"  aria-label="Text input with checkbox"               
                value="{{ ($stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() < 0 ? 'AB' : 
                                            $stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() ) }}">        
        </div>
        </td>

        <td><button class="btn btn-primary" 
                data-sid="{{$stdcr->id}}"
                data-etc="{{$extpcls->id}}"
                data-csc="{{$clsc->id}}"
                data-csb="{{$clsb->id}}">Save</button>

        </td>
    </tr>
    @endforeach

</tbody>
</table>
<script type="text/javascript" src="{{url('bs337/js/jquery.bootstrap-grow.min.js')}}" integrity=""></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('.btn').click(function(){
        var sid = $(this).data('sid');
        var etc = $(this).data('etc');
        var csc = $(this).data('csc');
        var csb = $(this).data('csb');
        
        
        var mrk = $('.marks'+sid).val();
    var u = '{{url("/updateMarks")}}';//'{{url("/updateRoll")}}';
    var t = '{{ csrf_token() }}';
    $.ajax({
        method: 'post',
        url: u,
        data:{etc:etc, csc:csc, csb:csb, sid:sid, mrk:mrk,  _token:t},
        success: function(msg){
          console.log("Successful: sid="+msg['sid']+", etc="+msg['etc']+", cl-sc="+msg['csc']+", cl-sb="+msg['csb']+", mrk="+msg['mrk']);
          $.bootstrapGrowl(msg['sid']+"'s Record Updated Successfully!",{
            type: 'info', // success, error, info, warning
            delay: 1000,
          });
        },
        error: function(data){
          console.log(data);
        }
    });   

    });






    $('.chkbox').click(function() {
        //var ssid = $(this).attr('name');
        //alert(ssid);
        if($(this).is(":checked")){
            //alert("hello");
            var ssid = $(this).attr('name');
            $(".marks"+ssid).val('AB');
            $(".marks"+ssid).attr("disabled", true);
        }else{
            //alert("gello");
            var ssid = $(this).attr('name');
            $(".marks"+ssid).val('');
            $(".marks"+ssid).attr("disabled", false);
        }
         
    });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
