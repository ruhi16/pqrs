@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Subject View...</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            
            @foreach($clss as $cls)
                <th>
                    {{ $cls->name }}                   
                    = Total Subjects: {{ $clssubs->where('clss_id', ($cls->id))->count() }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($extps as $extp)
            <tr>
                <td>{{ $extp->name }}</td>
                @foreach($clss as $cls)
                    <td>
                    <ul>
                        @foreach($clssubs as $clssub)
                            @if( $clssub->clss_id == $cls->id && $extp->id == $clssub->subject->extype_id)
                                <li>
                                    {{ $clssub->subject->name }}{{ $clssub->subject->combination_id }} 
                                    <a  href="#" class="btn-comb" data-toggle="modal" data-target="#exampleModal" 
                                        data-sbid="{{ $clssub->subject->id }}"
                                        data-clid="{{ $clssub->clss->id }}">Comb</a>
                                    /
                                    <a  href="#" class="btn-addl" data-toggle="modal" data-target="#exampleModalAddl" 
                                        data-sbid="{{ $clssub->subject->id }}"
                                        data-clid="{{ $clssub->clss->id }}">Addl</a>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Launch demo modal
                                    </button> --}}
                                    {{-- <button class="btn btn-primary btn-sm">C</button> --}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    </td>
                @endforeach
            </tr>
        @endforeach
        {{--  @foreach($clssubs as $clssub)
        <tr>
            <td>{{$clssub->id}}</td>
            <td>{{ $clss->where('id', ($clssub->clss_id))->first()->name }}</td>
            <td>{{ $subjects->where('id', ($clssub->subject_id))->first()->name }}</td>
            @foreach($clss as $cls)
                <td>{{ $cls->name }}</td>
            @endforeach
        </tr>
        @endforeach  --}}
    </tbody>
</table>



<!-- Modal Combine Subject -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="form-horizontal" action="{!! url('clssubsView-ModalSubmit') !!}" value="{{ csrf_token() }}">  
        {{ csrf_field() }}

        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Combine Subjects</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        
        <div class="modal-body">
            <input type="hidden" name="clss" value="">
            <div class="subjectDetails">
                {{--  <input type="text" class="form-control subjectName" value="{{ $subjects->where('id',1)->first()->name }}">  --}}
            </div>
        </div>



        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>

        {{--  <button type="submit" class="btn btn-primary">Submit</button>  --}}
        </form>
    </div>
</div>

<!-- end of Modal Combine subject -->



<!-- Modal Addl Subject -->
<div class="modal fade" id="exampleModalAddl" tabindex="-1" role="dialog" aria-labelledby="exampleModalAddlLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="form-horizontal" action="{!! url('clssubsView-ModalSubmitAddl') !!}" value="{{ csrf_token() }}">  
        {{ csrf_field() }}

        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalAddlLabel">Addl Subjects</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        
        <div class="modal-body">
            <input type="text" name="clssAddl" value="">
            <div class="subjectDetailsAddl">
                {{--  <input type="text" class="form-control subjectName" value="{{ $subjects->where('id',1)->first()->name }}">  --}}
            </div>
        </div>



        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>

        {{--  <button type="submit" class="btn btn-primary">Submit</button>  --}}
        </form>
    </div>
</div>


<!-- end of Modal Additional subject -->





<script type="text/javascript">
  $(document).ready(function(e){
      $('.btn-comb').on("click", function(){          
        var subjectId = $(this).data('sbid');
        var clssId = $(this).data('clid');

        $('input[name="clss"]').val(clssId);

        // alert(subjectId+'='+clssId)
        var u = '{{ url("/clssubsView-combineSubject") }}';//'{{url("/updateRoll")}}';
        var t = '{{ csrf_token() }}';
        
        $.ajax({
            method: 'post',
            url: u,
            data:{sid:subjectId, cid:clssId, _token:t},
            success: function(msg){                
                var str ='';                
                str +="<div class='panel panel-default'><div class='panel-heading'>Panel Heading</div><div class='panel-body'>";//A Basic Panel</div></div>";
                
                if(msg){                    
                    //var len = msg.length;
                    //console.log( msg );
                    //console.log(jQuery.parseJSON( msg )[0].id)
                    var idstr = '';
                    var obj = jQuery.parseJSON( msg );
                    for(i = 0; i < obj.length; i++){
                        str += "<label class='checkbox-inline'><input type='checkbox' name='subj[]' value='"+obj[i].id+"'"+obj[i].status+">";//"'>Option 1</label>
                        str += obj[i].name;
                        str += "</label>";
                        idstr += obj[i].id +'-';
                        
                        //console.log(idstr);
                         $('input[name="clss"]').val(idstr.slice(0, -1));
                    }
                }

                str += "</div></div>";
                
                $(".subjectDetails").html( str );

                //console.log(msg['sid']);
            },
            error: function(data){
                console.log(data);
            }
        });
        
      });









      $('.btn-addl').on("click", function(){          
        var subjectId = $(this).data('sbid');
        var clssId = $(this).data('clid');

        $('input[name="clssAddl"]').val(clssId);

        //alert(subjectId+'='+clssId)
        var u = '{{ url("/clssubsView-additionalSubject") }}';//'{{url("/updateRoll")}}';
        var t = '{{ csrf_token() }}';
        
        $.ajax({
            method: 'post',
            url: u,
            data:{sid:subjectId, cid:clssId, _token:t},
            success: function(msg){                
                var str ='';                
                str +="<div class='panel panel-default'><div class='panel-heading'>Panel Heading</div><div class='panel-body'>";//A Basic Panel</div></div>";
                
                if(msg){                    
                    //var len = msg.length;
                    //console.log( msg );
                    //console.log(jQuery.parseJSON( msg )[0].id)
                    var idstr = '';
                    var obj = jQuery.parseJSON( msg );
                    for(i = 0; i < obj.length; i++){
                        str += "<label class='checkbox-inline'><input type='checkbox' name='subjAddl[]' value='"+obj[i].id+"'"+obj[i].status+">";//"'>Option 1</label>
                        str += obj[i].name;
                        str += "</label>";
                        idstr += obj[i].id +'-';
                        
                        //console.log(idstr);
                         $('input[name="clssAddl"]').val(idstr.slice(0, -1));
                    }
                }
                str += "</div></div>";                
                $(".subjectDetailsAddl").html( str );
                //console.log(msg['sid']);
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
