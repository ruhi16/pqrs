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
        <td>{{ $extpmdcl->exam->name }} / {{ $extpmdcl->extype->name }}</td>
        <td></td>        
        <th>Class</th>
        <td>{{ $extpmdcl->clss->name }}</td>
        <td></td>
        <th>Section</th>
        <td>{{ $clsc->section->name }}</td>
    </tr>    
</table>


<table class="table table-bordered" id="dataTable"> 
<thead>
    <tr>
        <th>@</th>
        <th>Name</th>
        <th>Roll Nos</th>
        @foreach($clsb as $cs)
            <th>{{ $cs->name }}</th>
        @endforeach
        <th>Action</th>
        <th>Remarks</th>
    </tr>
</thead>
<tbody>
    @foreach($stdcrs as $stdcr)
    <tr id="dataRow">
        <td>{{ $stdcr->id }}</td>
        <td>{{ $stdcr->studentdb->name }}</td>
        <td>{{ $stdcr->roll_no }}</td>
        @foreach($clsb as $cs)
            <td>
            <div>
                <div class="input-group-addon">
                    <input type="checkbox" aria-label="Checkbox for following text input" class="chkbox" name="{{$stdcr->id}}-{{$cs->id}}">                
                </div>    
                <input  type="text" class="form-control marks{{$stdcr->id}}-{{$cs->id}}"  aria-label="Text input with checkbox" id="{{$cs->id}}" name="m{{$stdcr->id}}[]"
                    value="" >        
            </div> 
            </td>
        @endforeach

        <td><button class="btn btn-primary btnSave"
                    data-id ="{{$stdcr->id}}"
                    data-sid="{{$stdcr->id}}-{{$cs->id}}">Save</button>
        
        </td>
        <td></td>

        {{--  <td>         
        <div class="input-group">
            <div class="input-group-addon">
                <input type="checkbox" aria-label="Checkbox for following text input" class="chkbox" name="{{$stdcr->id}}">                
            </div>
            <input  type="text" class="form-control marks{{$stdcr->id}}"  aria-label="Text input with checkbox"               
                value="{{ ($stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() < 0 ? 'AB' : 
                                            $stdmrks->where('studentcr_id', $stdcr->id)->pluck('marks')->first() ) }}">        
        </div>
        </td>

        <td><button class="btn btn-primary btnSave" 
                data-sid="{{$stdcr->id}}"
                data-etc="{{$extpcls->id}}"
                data-csc="{{$clsc->id}}"
                data-csb="{{$clsb->id}}" >Save</button>

        </td>
        <td id="{{$stdcr->id}}"></td>  --}}
    </tr>
    @endforeach

</tbody>
</table>
<script type="text/javascript" src="{{url('bs337/js/jquery.bootstrap-grow.min.js')}}" integrity=""></script>
<script type="text/javascript">
  $(document).ready(function(e){
        
    $('.btn').click(function(){
        var sid = $(this).data('sid');

        var  id = $(this).data('id');

        var a = 'm'+id+'[]';
        var info = [];
        $("input[name='"+a+"'").each(function(index){
            //console.log($(this).val()+", Id:"+$(this).attr('id'));
            info.push({subid:$(this).attr('id'),marks:$(this).val()})
        });

        //for(i=0; i<info.length; i++){
        //    console.log("Sub Id: "+info[i].subid+", Marks: "+info[i].marks);
        //}

        //var values = $("input[name='marks22[]']")
        //      .map(function(){return $(this).val();}).get();
        //alert(a);
        //$.each(values, function(in, vl){
        //    alert(in+":"+vl);
        //});

        //var etc = $(this).data('etc');
        //var csc = $(this).data('csc');
        //var csb = $(this).data('csb');
        
        
        //var mrk = $('.marks'+sid).val();
        var u = '{{url("/updateForAllSubjMarks")}}';//'{{url("/updateRoll")}}';
        var t = '{{ csrf_token() }}';
        $.ajax({
            method: 'post',
            url: u,
            data:{mrk:info,  _token:t},
            success: function(msg){
                console.log("Hello: "+msg['data']);
                //console.log("Successful: sid="+msg['sid']+", etc="+msg['etc']+", cl-sc="+msg['csc']+", cl-sb="+msg['csb']+", mrk="+msg['mrk']);
                //$.bootstrapGrowl(msg['sid']+"'s Record Updated Successfully!",{
                //    type: 'info', // success, error, info, warning
                //    delay: 1000,
                //});
            },
            error: function(data){
                console.log(data);
            } 
        });

        });  






    $('.chkbox').click(function() {        
        if($(this).is(":checked")){            
            var ssid = $(this).attr('name');
            //alert(ssid);
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
        var ss = $(this).data('sid');        
        //var xx = $('#dataTable #dataRow #'+ss).text();
        
        //$('#dataTable #dataRow #'+ss).text("Updated!!");
    });


  });  
</script>  

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
