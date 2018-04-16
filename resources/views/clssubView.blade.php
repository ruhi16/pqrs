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
                                        data-id="{{ $clssub->subject->id }}">Comb</a>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Combine Subjects</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        
        <div class="modal-body">
            Subjects Id:
            <div>
                <input type="text" class="form-control subjectName" value="">
            </div>
        </div>



        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>





<script type="text/javascript">
  $(document).ready(function(e){
      $('.btn-comb').on("click", function(){          
        var subjectId = $(this).data('id');        
        $(".subjectName").val( subjectId );
        
      });
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
