@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h2>Class:      <b>{{ $clssec->clss->name }}</b> , 
    Section:    <b>{{ $clssec->section->name }}</b>, 
    CT:         <b>{{$clsTeacher->first()->teacher->name or ''}}</b>, 
    Session:    {{ $session->name }},    Promotional Assessment</h2>

    <a href="{{ url('/clssec-PromotionalStdCrStatusRefresh', [$clssec->id])}}" class='btn btn-primary btn-lg pull-right'>Refresh</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name<br>Class-Sec-Roll</th>
            @foreach($extps as $extp)
                <th>{{$extp->name}} <br> OM/FM (? Ds)<br>Status</th>
            @endforeach
            <th>Overall Results</th>
            <th>New Class-Section</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    
        @foreach($stdcrs as  $stdcr)
            <tr>
                <td>{{ $stdcr->id }}</td>
                <td>                    
                    <b>{{ $stdcr->studentdb->name }}</b><br>
                    <small>
                    {{ $stdcr->clss->name }} - 
                    {{ $stdcr->section->name }} - 
                    {{ $stdcr->roll_no }}
                    </small>
                </td>                
                @foreach($extps as $extp)
                <td>
                    @if( $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first() )
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->obtnmarks }}/
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->fullmarks }}
                        ({{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->noofds }}Ds)
                        {{ $resultcr->where('studentcr_id', $stdcr->id)->where('extype_id', $extp->id)->first()->results }}
                    @endif
                </td>                
                @endforeach                    
                <td>
                    {{ $stdcr->result }}
                </td>
                <td class="text-center">
                    @if( $stdcr->result == 'Promoted' )
                        <b> {{ $stdcr->clss->parent->name }} -- {{$stdcr->next_section->name or ''}} </b>
                    @else 
                        {{ $stdcr->clss->name }}-{{$stdcr->next_section_id}}:{{ $stdcr->section->name }}
                    @endif
                    {{--  {{ $clssec }}  --}}
                </td>
                <td>
                    @if( !$stdcr->next_section_id )
                        @if( $stdcr->result == 'Promoted' )
                            <select class="form-control nextSection" name="nextSection" id="nextSection{{$stdcr->id}}">
                                <option value="-{{$stdcr->id}}"></option>
                                @foreach($nextclssec as $nextclsc)
                                    <option value="{{ $nextclsc->section->id }}-{{$stdcr->id}}"
                                        {{-- "{{ $stdcr->section->id == $currclsc->section->id ? 'selected' : '' }}" --}}
                                        >
                                        {{ $nextclsc->section->name }}</option>
                                @endforeach
                            </select>
                        @else 
                            <select class="form-control nextSection" name="nextSection" id="nextSection{{$stdcr->id}}">
                                <option value="-{{$stdcr->id}}"></option>
                                @foreach($currclssec as $currclsc)
                                    <option value="{{ $currclsc->section->id }}-{{$stdcr->id}}">
                                        {{ $currclsc->section->name }}</option>
                                @endforeach
                            </select>
                        @endif

                    @else
                        @if( $stdcr->crstatus == NULL )
                            <a class="btn btn-default btn-sm" href="{{url('/reupdateClssSectionPromotionalInfo', [$stdcr->id])}}">Update</a>
                        @else
                            <small>Roll No Issued</small>
                        @endif
                    @endif
                </td>

                <td>
                    @if( !$stdcr->next_section_id )
                        <button class="btn btn-success btnPromote" id="btnPromote{{$stdcr->id}}"
                            data-crid  ="{{$stdcr->id}}"
                            data-dbid ="{{$stdcr->studentdb->id}}"
                            data-nextclss = "{{ $stdcr->result == 'Promoted' ? $nextclssec->first()->clss->id :  $currclssec->first()->clss->id}}"                     
                            >
                            
                            Submit
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach        
        
    </table>







<script type="text/javascript" src="{{url('bs337/js/jquery.bootstrap-grow.min.js')}}" integrity=""></script>
<script type="text/javascript">
  $(document).ready(function(e){
      $('.btnPromote').attr("disabled", true);


      $('.btnPromote').click(function(){          

            var stdCrId = $(this).data('crid');
            var stdDbId = $(this).data('dbid');
            var stdNxCl = $(this).data('nextclss');
            
            var data1   = $('#nextSection'+ stdCrId +' option:selected').val().trim();
            var data2   = data1.split('-');
            var stdNxSc = data2[0]; //selected section_id
            
            var u = '{{url("/updateClssSectionPromotionalInfo")}}';
            var t = '{{ csrf_token() }}';
            
            $.ajax({
                method: 'post',
                url: u,
                data:{stcrid:stdCrId, stdbid:stdDbId, nxclid:stdNxCl, nxscid:stdNxSc,  _token:t},
                success: function(msg){
                    //console.log("StdCR_ID("+msg['sid']+'): '+msg['data']);
                    //console.log("Successfully");
                    console.log(msg['info']);//+msg['scrid']+msg['sdbid']+msg['nclid']+msg['nscid']);
                    $.bootstrapGrowl(msg['sname']+"'s Record Promoted for Next Class Successfully!",{
                        type: 'info', // success, error, info, warning
                        delay: 3000,
                    });
                    //$('#dataTable #dataRow #'+id).text("Updated!!");
                },
                error: function(data){
                    //$('#dataTable #dataRow #'+id).text("Not Updated!!");
                    console.log(data);
                    $.bootstrapGrowl(data, {
                        type: 'error', // success, error, info, warning
                        delay: 1000,
                    });
                } 
            });

      });




      $('select').on('change', function(){            
            var value = $("option:selected", this).val();     //to select value use val(),  to select text use text()
            var result = value.split('-');

            if(result[0] == ''){ 
                //alert("No Value Selected:"+result[1]);
                $('#btnPromote'+result[1]).prop("disabled", true);  
            }else{                        
                //alert("Changed:" + value + result[0]+'--'+result[1]);
                $('#btnPromote'+result[1]).prop("disabled", false);        //$('.btnPromote').attr("disabled", true);

            }

      });



    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
