@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Marks Entry Page...</h1>
<br>For the Exam: {{ $extpcls->exam->name }}
<br>For the Exam Type: {{ $extpcls->extype->name }}
<br>For the Class: {{ $extpcls->clss->name }}
<br>For the Section: {{ $clsc->section->name }}
<br>For the Section: {{ $clsb->subject->name }}


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

        {{--  <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox">
        </div>  --}}

        <td>        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </div>
            </div>
            <input  type="text" class="form-control marks{{$stdcr->id}}"  aria-label="Text input with checkbox"               
                value="{{ ($stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() < 0 ? 'AB' : $stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() ) }}">
        
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
        //alert(etc+' '+csc+' '+csb);
        //alert($('.marks').val());
        //alert(sid);
        
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
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
