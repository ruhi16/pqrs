@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h2>Class:      <b>{{ $clssec->clss->name }}</b> , 
    Section:    <b>{{ $clssec->section->name }}</b>, 
    CT:         <b>{{$clsTeacher->first()->teacher->name }}</b>, 
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
            <th>Description</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    
        @foreach($stdcrs as  $stdcr)
            <tr>
                <td>{{ $stdcr->id }}</td>
                <td>
                    {{ $stdcr->studentdb->name }}<br>
                    {{ $stdcr->clss->name }} - 
                    {{ $stdcr->section->name }} - 
                    {{ $stdcr->roll_no }}
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
                <td>
                    @if( $stdcr->result == 'Promoted' )
                        {{ $stdcr->clss->parent->name }}
                    @else 
                        {{ $stdcr->clss->name }}
                    @endif
                    {{--  {{ $clssec }}  --}}
                </td>
                <td>
                    @if( $stdcr->result == 'Promoted' )
                        <select class="form-control" name="stCaste" id="stCaste">
                            <option value=""></option>
                            @foreach($nextclssec as $nextclsc)
                                <option value="{{ $nextclsc->section->name }}-{{$stdcr->id}}">
                                    {{ $nextclsc->section->name }}</option>
                            @endforeach
                        </select>
                    @else 
                        <select class="form-control nextSection" name="nextSection" id="nextSection">
                            <option value=""></option>
                            @foreach($currclssec as $currclsc)
                                <option value="{{ $currclsc->section->name }}-{{$stdcr->id}}">
                                    {{ $currclsc->section->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </td>

                <td>
                    <button class="btn btn-success btnPromote" id="btnPromote{{$stdcr->id}}"
                        data-crid  ="{{$stdcr->id}}"
                        data-dbid ="{{$stdcr->studentdb->id}}"
                        data-nextclss ="{{$nextclssec->first()->clss->id}}"
                        {{-- data-nextsect ="{{$clsc->id}}"  --}}
                        >
                        
                        Promote{{$stdcr->studentdb->id}}
                    </button>

                </td>
            </tr>
        @endforeach        
        
    </table>








<script type="text/javascript">
  $(document).ready(function(e){
      $('.btnPromote').prop("disabled", true);


      $('.btnPromote').click(function(){
            var stdCrId = $(this).data('crid');
            var stdDbId = $(this).data('dbid');
            var stdNxCl = $(this).data('nextclss');
            alert("Hello:" +stdCrId+'/'+stdDbId+'/'+stdNxCl);
      });




      $('select').on('change', function(){            
          var value = $("option:selected", this).val();     //to select value use val(),  to select text use text()
          if(value == '')  
            alert("No Value Selected");
          else{
            
            var result = value.split('-');
            alert("Changed:" + value + result[0]+'--'+result[1]);
            $('#btnPromote'+result[1]).prop("disabled", false);        //$('.btnPromote').attr("disabled", true);

          }

      });

      //$('select').on('change', function(){            
      //      alert("Changed");
      //});

    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
