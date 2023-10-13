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
        <td></td>
        <th>Full Marks</th>
        <td>{{ $clsc->section->name }}</td>
    </tr>    
</table>


<table class="table table-bordered" id="dataTable"> 
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roll Nos</th>
        @foreach($clsb as $cs)
            <th class='text-center'>
                {{ $cs->subject->name }} <br>(FM:{{ $extpmdclsbs->where('subject_id', $cs->subject_id)->first()->fm }})
            
            </th>
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
                {{--  {{ $cs->id }}   - {{ $cs->subject_id }}  --}}
                <input  type="text" class="form-control 
                                            fmarks fmarks-{{$stdcr->id}} fmarks-{{$stdcr->id}}-{{$cs->id}}
                                            marks{{$stdcr->id}}-{{$cs->id}} text-center"  aria-label="Text input with checkbox" id="{{$cs->id}}" name="m{{$stdcr->id}}[]"
                    data-id = "{{$stdcr->id}}"
                    data-csid = "{{$cs->subject->id}}"
                    value="{{ $stdmrks->where('studentcr_id', $stdcr->id)->where('clssub_id', $cs->id)->pluck('marks')->first() < 0 ? 'AB' : 
                                $stdmrks->where('studentcr_id', $stdcr->id)->where('clssub_id', $cs->id)->pluck('marks')->first()}}" >        
            </div> 
            </td>
        @endforeach

        <td><button class="btn btn-primary btnSave"
                    data-id  ="{{$stdcr->id}}"                    
                    data-sid ="{{$stdcr->id}}-{{$cs->id}}"
                    data-etc ="{{$extpmdcl->id}}"
                    data-csc ="{{$clsc->id}}"                    
                                                            >Save</button>
        
        </td>
        <td id="{{$stdcr->id}}"></td>
        
    </tr>
    @endforeach

</tbody>
</table>
<script type="text/javascript" src="{{url('bs337/js/jquery.bootstrap-grow.min.js')}}" integrity=""></script>
<script type="text/javascript">
  $(document).ready(function(e){
        
    $('.btn').click(function(){
        var sid = $(this).data('sid');
        var  id = $(this).data('id');   //studentcr_id
        var a = 'm'+id+'[]';
        var info = [];
        $("input[name='"+a+"'").each(function(index){
            //console.log($(this).val()+", Id:"+$(this).attr('id'));
            info.push({subid:$(this).attr('id'), marks:$(this).val()}); //clssub_id & marks
        });

        
        var etc = $(this).data('etc');
        var csc = $(this).data('csc');        
        var u = '{{url("/updateForAllSubjMarks")}}';
        var t = '{{ csrf_token() }}';
        $.ajax({
            method: 'post',
            url: u,
            data:{id:id, mrk:info, etc:etc, csc:csc,  _token:t},
            success: function(msg){
                console.log("StdCR_ID("+msg['sid']+'): '+msg['data']);
                $.bootstrapGrowl(msg['sid']+"'s Record Updated Successfully!",{
                    type: 'info', // success, error, info, warning
                    delay: 1000,
                });
                $('#dataTable #dataRow #'+id).text("Updated!!");
            },
            error: function(data){
                $('#dataTable #dataRow #'+id).text("Not Updated!!");
                console.log(data);
            } 
        });

        });  


    $('.fmarks').keyup(function(){
        
        var id =  $(this).attr('data-id');
        var csid =  $(this).attr('data-csid');
        
        var mrk = $(this).val();
        console.log('mrk:'+mrk)
        console.log('csid:'+csid)
        var flag = false;

        //$('.fmarks').val(mrk); 
        
        if(csid == 11){
            $('.fmarks-'+id).val(mrk);        
        }
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
