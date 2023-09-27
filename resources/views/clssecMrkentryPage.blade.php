@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<ul class="nav nav-pills pull-right">{{-- tabs or pills --}}
  <li role="presentation"><a href="{{ url('/teachers-takspan', [$loginteacher->id])}}">Home</a></li>
  @if($clteacher != NULL)
    <li role="presentation" class="active"><a href="{{ url('/teachers-CStakspan', [$loginteacher->id])}}">T-CS Task Pane</a></li>
  @endif
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>  

</ul> 
<div class="clearfix"></div>
<hr>


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
        <th>{{ $ansdistteacher->teacher->name or 'N/A' }}</th>
        <td></td>
    </tr>
</table>

<table class="table table-bordered" id="dataTable"> 
<thead>
    <tr>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Roll No</th>
        <th class="text-center">Marks Details</th>
        <th class="text-center">Action</th>
        <th class="text-center">Remarks</th>
    </tr>
</thead>
<tbody>
    @foreach($stdcrs->sortBY('roll_no') as $stdcr)
    <tr id="dataRow">
        <td>{{ $stdcr->id }}</td>
        <td>{{ $stdcr->studentdb->name }}</td>
        <td class="text-center">{{ $stdcr->roll_no }}</td>
        
        @php 
            $marks = ($stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first());

        @endphp

        @if( Auth::user()->role->name == "Admin"  || 
             ($ansdistteacher != Null && $loginteacher->id == $ansdistteacher->teacher_id  && $ansdistteacher->finlz_dt == '') )
            <td>
            
            <div class="input-group">
                <div class="input-group-addon">
                    <input type="checkbox" aria-label="Checkbox for following text input" class="chkbox" name="{{$stdcr->id}}">                
                </div>
                <input  type="text" class="form-control marks{{$stdcr->id}}"  aria-label="Text input with checkbox"               
                    value="{{ $marks < 0 ? 'AB' : $marks  }}"
                    onkeyup="if (/\D/g.test(this.value))  this.value = this.value.replace(/\D/g,'')">        
            </div>  


            
            </td>
            <td><button class="btn btn-primary btnSave" 
                    data-sid="{{$stdcr->id}}"
                    data-etc="{{$extpcls->id}}"
                    data-csc="{{$clsc->id}}"
                    data-csb="{{$clsb->id}}" >Save</button>

            </td>
        @else
            <td class="text-center">{{ $marks < 0 ? 'AB' : $marks }} </td>
            <td class="text-center"></td>
        @endif
        <td id="{{$stdcr->id}}"></td>
    </tr>
    @endforeach

</tbody>
</table>
@if( Auth::user()->role->name == "Admin"  || 
            ($ansdistteacher != Null && $loginteacher->id == $ansdistteacher->teacher_id))

    @if( $ansdistteacher )
        
        @if($ansdistteacher->finlz_dt != '')
            <a class="btn btn-danger btn-lg" href="{{ route('testRoute',[$extpcls->id, $clsc->id, $ansdistteacher->teacher_id]) }}">
                Already Marks Entry Finalized !!!{{ $ansdistteacher->fnlz_dt }}
            </a>
            <hr>
        @else
            <a class="btn btn-success btn-lg" href="{{ route('testRoute',[$extpcls->id, $clsc->id, $ansdistteacher->teacher_id]) }}">
                Finalize Marks Entry !!! {{ $ansdistteacher->fnlz_dt or 'NA'}}
            </a>
        @endif

    @endif

@endif
{{--  <br>session {{ $ansdistteacher->session_id }}
<br>clss    {{ $ansdistteacher->clss_id }}
<br>section {{ $ansdistteacher->section_id }}
<br>exam    {{ $ansdistteacher->exam_id }}
<br>extype  {{ $ansdistteacher->extype_id }}
<br>teacher {{ $ansdistteacher->teacher_id }}
<br>fnlz_dt {{ $ansdistteacher->finlz_dt }}  --}}


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
                $('#dataTable #dataRow #'+sid).text("Updated!!");
            },
            error: function(data){
                $('#dataTable #dataRow #'+sid).text("Not Updated!!");
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

    $('.btnSave').click(function(){
        //var ss = $(this).data('sid');   
        //$('#dataTable #dataRow #'+ss).text("Updated!!");     
        //var xx = $('#dataTable #dataRow #'+ss).text();
        
        //$('#dataTable #dataRow #'+ss).text("Updated!!");
    });


  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
