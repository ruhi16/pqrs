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
        <td><input type="text" class="form-control marks" value=""></td>
        <td><button class="btn btn-primary" data-sid="{{$stdcr->id}}"
                                            data-etc="{{$extpcls->id}}"
                                            data-csc="{{$clsc->id}}"
                                            data-csb="{{$clsb->id}}">Save</button></td>
    </tr>
    @endforeach

</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(e){
    $('.btn').click(function(){
        var sid  = $(this).data('sid');
        var etc = $(this).data('etc');
        var csc = $(this).data('csc');
        var csb = $(this).data('csb');
        //alert(etc+' '+csc+' '+csb);
        //alert($('.marks').val());
        //alert(sid);
        var mrk = $('.marks').val();
    var u = '{{url("/updateMarks")}}';//'{{url("/updateRoll")}}';
    var t = '{{ csrf_token() }}';
    $.ajax({
        method: 'post',
        url: u,
        data:{etc:etc, csc:csc, csb:csb, sid:sid, mrk:mrk,  _token:t},
        success: function(msg){
          console.log("Successful: sid="+msg['sid']+", etc="+msg['etc']+", cl-sc="+msg['csc']+", cl-sb="+msg['csb']+", mrk="+msg['mrk']);
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
