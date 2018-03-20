@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Type Wise Each Subjects Grade-Description Details...</h1>

{!! Form::open(['url'=>'/gradedescription-submit','method'=>'post', 'class'=>'form-horizontal']) !!}

<input type="hidden" value="{{$extype_id}}" name="extype">

@foreach($extps as $etp)
@if($etp->id == $extype_id)
    <h1>Exam Type: <small>{{$etp->name}}</small></h1>
    <table class="table table-bordered" id="table{{$etp->id}}">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Subject</th>
                @foreach($grads as $grd)
                    @if( $etp->id == $grd->extype_id )
                        <th>{{ $grd->gradeparticular->name }}</th>
                    @endif
                @endforeach
                
            </tr>
        </thead>
        <tbody>
    @foreach($subjs as $sub)
        @if( $etp->id == $sub->extype_id )
            <tr id="tr{{$sub->id}}">
                <td>{{ $sub->id}}</td>
                <td>{{ $sub->name }}</td>
                @foreach($grads as $grd)
                    @if( $etp->id == $grd->extype_id )
                        <td id="td{{$grd->id}}">
                            {{--  <input type="hidden" value="{{$grd->id}}"            name="grdid{{$etp->id}}{{$sub->id}}[]">  --}}
                            <textarea class="form-control" rows="5" id="comment" name="descr{{$etp->id}}{{$sub->id}}[{{$grd->id}}]"></textarea>
                        </td>
                    @endif
                @endforeach
                {{--  <td><a href="" class="btn btn-info btnEdit" data-toggle="modal" data-target="#myModal"
                               data-etp_id="{{$etp->id}}" 
                               data-sub_id="{{$sub->id}}" 
                               data-grd_id="{{$grd->id}}" >Edit</a></td>  --}}
            </tr>
        @endif
    @endforeach
    </tbody>
    </table>
@endif
@endforeach

    {{--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  --}}
    <button type="submit" class="btn btn-primary">Save changes</button>

{!! Form::close() !!}

<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Grade Description</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
  $(document).ready(function(e){    
    $('.btnEdit').on('click', function(){
        var etp = $(this).data('etp_id');
        var sub = $(this).data('sub_id');
        
        //alert(etp+":"+sub); // for all grade :)
    
        {{--  $('table tr td').each(function(){
            var texto = $(this).text();
            //alert(texto);
        });  --}}
        {{--  table.find('tr').each(function (i, el) {
            var $tds = $(this).find('td'),
            productId = $tds.eq(0).text(),
            alert(productId);
            //product = $tds.eq(1).text(),
            //Quantity = $tds.eq(2).text();
        // do something with productId, product, Quantity
            });  --}}
        {{--  $('#table'+etp+' #tr'+sub).each(function(){
           alert(etp+':'+sub) ;
        });  --}}
    
    });
    






    
    {{--  $('.btnEdit').on('click', function(){
      var v = $(this).data('id');
      var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
      var name = $("#tabclss #tr"+v+" #name").text();
      //alert(name);


      $('input[name="editclssName"]').val(name);
      $('input[name="editclssId"]').val(v);
      //$('#editModal').modal('show');
    });

    $('.btnDelt').on('click', function(){
      var v = $(this).data('id');
      var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
      var name = $("#tabclss #tr"+v+" #name").text();
      //alert(name);

      $('input[name="deltclssName"]').val(name);
      $('input[name="deltclssId"]').val(v);  
    });  --}}
  });  
</script>





@endsection

@section('footer')
	@include('layouts.footer')
@endsection
