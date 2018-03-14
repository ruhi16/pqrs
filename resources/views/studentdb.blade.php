@extends('layouts.baselayout')

@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Student's Detail Records...</h1>

<button 
   type="button" 
   class="btn btn-primary btn-lg" 
   data-toggle="modal" 
   data-target="#favoritesModal">
  Add Students
</button>
<br>

<table class="table table-bordered">
<thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>Class</th>
        <th>Sec</th>
        <th>Select Section</th>
        <th>Adm Sl & Adm Date</th>
    </tr>
</thead>
@foreach($stds as $std)
<tr id="tr{{$std->id}}">
    <td>{{$std->id}}</td>
    <td>{{$std->name}}</td>
    <td>{{$std->fname}}</td>
    <td>{{$std->stclss_id}}</td>
    <td id="tdsec{{$std->id}}">{{$std->stsec_id or " "}}</td>
    <td>
    @if($std->stsec_id == NULL)
      <!-- Select Option -->
      <div class="form-group">      
      <select class="form-control std_sec" id="sel1">
        <option></option>
        @foreach($allClsSec as $allCS)
            @if($std->stclss_id == $allCS->clss_id)
              <option value="{{$std->id}}-{{$allCS->section->id}}">{{ $allCS->section->name }}</option>
            @endif
        @endforeach  
      </select>
    </div>
    @else
      Section Alloted
    @endif
    </td>

    <td>{{$std->roll_no or 'NA'}}</td>
</tr>
@endforeach
</table>



<!-- Modal Starts for Student Information Entry -->
<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="post" class="form-horizontal" action="{!! url('studentdb-submit') !!}" value="{{ csrf_token() }}">  
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">The Sun Also Rises</h4>
      </div>
      <div class="modal-body">

       
        <div class="form-group">
          <label class="control-label col-sm-1" for="name">Name:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Students Name">
          </div>

          <label class="control-label col-sm-1" for="clss">Class:</label>
          <div class="col-sm-2">
            <select class="form-control" name="clss" id="cl">
                <option value="0"></option>
                @foreach($clss as $cls)              
                  <option value="{{$cls->id}}">{{$cls->name}}</option>              
                @endforeach
            </select>
          </div>

          <label class="control-label col-sm-1 text-left" for="secs">Section:</label>
          <div class="col-sm-2">
          <select class="form-control" name="secs" id="sc">
                <option value="0"></option>
                @foreach($secs as $sec)              
                  <option value="{{$sec->id}}">{{$sec->name}}</option>              
                @endforeach
            </select>            
          </div>

          

        </div>




        <div class="form-group">
          <label class="control-label col-sm-1 text-left" for="ssex">Gender:</label>
          <div class="col-sm-2">
          <select class="form-control" name="ssex" id="sx">
                <option value="0"></option>
                @foreach($ssex as $sex)              
                  <option value="{{$sex->options}}">{{$sex->options}}</option>              
                @endforeach
            </select>            
          </div>

          <label class="control-label col-sm-1 text-left" for="relg">Religion:</label>
          <div class="col-sm-2">
          <select class="form-control" name="relg" id="rl">
                <option value="0"></option>
                @foreach($relg as $rel)              
                  <option value="{{$rel->id}}">{{$rel->options}}</option>              
                @endforeach
            </select>            
          </div>

          <label class="control-label col-sm-1 text-left" for="cste">Caste:</label>
          <div class="col-sm-2">
          <select class="form-control" name="cste" id="cs">
                <option value="0"></option>
                @foreach($cste as $cst)              
                  <option value="{{$cst->options}}">{{$cst->options}}</option>              
                @endforeach
            </select>            
          </div>

          <label class="control-label col-sm-1 text-left" for="natn">Nation:</label>
          <div class="col-sm-2">
          <select class="form-control" name="natn" id="nt">
                <option value="0"></option>
                @foreach($natn as $nat)              
                  <option value="{{$nat->options}}" {{$nat->options != 'Indian'?:'selected'}}>{{$nat->options}}</option>              
                @endforeach
            </select>            
          </div>
         
        </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="submit" class="btn btn-primary">Submit</button>
        </span>
      </div>
    </form>
    </div>
  </div>
</div>




<script type="text/javascript">
  $(document).ready(function(e){
    
    $('.std_sec').change(function(){
      


      var sec = $(this).val();
      // alert(sec);
       
      var u = '{{url("/updateSection")}}';//'{{url("/updateRoll")}}';
      var t = '{{ csrf_token() }}';
      $.ajax({
        method: 'post',
        url: u,
        data:{sec:sec,  _token:t},
        success: function(msg){
          console.log('StdDB Id:'+msg['sid']+", Section Id:"+msg['ssec']);
          $('#tr'+msg['sid']+' #tdsec'+msg['sid']).html(msg['ssec']);
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
