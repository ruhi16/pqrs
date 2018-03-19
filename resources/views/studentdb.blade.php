@extends('layouts.baselayout')

@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Students Detail Records...</h1>
<div class="row">
<button 
   type="button" 
   class="btn btn-success btn-lg pull-right" 
   data-toggle="modal" 
   data-target="#newStudentData">
  Add New Students
</button>
</div><br>
<table class="table table-bordered table-striped" id="tabclss">
<thead class="thead-dark">
    <tr>
        <th>id</th>
        <th>Name</th>
        {{--  <th>Father's Name</th>  --}}
        <th>Class</th>
        <th>Sec</th>
        <th>Roll</th>
        <th>Gender</th>
        <th>Religion</th>
        <th>Caste</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($stds as $std)
<tr id="tr{{$std->id}}">
    <td id="id">{{$std->id}}</td>
    <td id="name">{{$std->name}}</td>
    <td id="clss">{{$std->clss->name}}</td>
    <td id="section">{{$std->section->name}}</td>
    {{--  <td id="tdsec{{$std->id}}">{{$std->stsec_id or " "}}</td>  --}}
    <td>{{$std->roll_no or 'NA'}}</td>
    <td id="ssex">{{$std->ssex}}
    {{--  @if($std->stsec_id == NULL)
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
    @endif  --}}
    </td>
    <td id="relg">{{$std->relg}}</td>
    <td id="cste">{{$std->cste}}</td>
    
    <td>
      <button class="btn btn-primary btnEdit" data-id="{{$std->id}}" data-toggle="modal" data-target="#editStudentData">Edit</button>
      <button class="btn btn-danger  btnDelt">Delete</button>
    </td>
</tr>
@endforeach
</tbody>
</table>



<!-- Modal Starts for Student Information Entry -->
<div class="modal fade" id="newStudentData" 
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
                  <option value="{{$rel->options}}">{{$rel->options}}</option>              
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



<!-- Modal Starts for Edit Student Information -->
<div class="modal fade" id="editStudentData" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="post" class="form-horizontal" action="{!! url('studentdbEdit-submit') !!}" value="{{ csrf_token() }}">  
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Student Detais...</h4>
      </div>
      <div class="modal-body">

        <input type="hidden" class="form-control" id="edStdId" name="edStdId">

        <div class="form-group">
          <label class="control-label col-sm-1" for="edName">Name:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="edName" name="edName" placeholder="Enter Students Name">
          </div>

          <label class="control-label col-sm-1" for="edClss">Class:</label>
          <div class="col-sm-2">
            <select class="form-control" name="edClss" id="edClss">
                <option value="0"></option>
                @foreach($clss as $cls)              
                  <option value="{{$cls->id}}">{{$cls->name}}</option>              
                @endforeach
            </select>
          </div>
          {{--  //=====  --}}
          {{--  <div class="col-sm-1">
            <input type="text" class="form-control" id="edClssText" name="edClssText">
          </div>  --}}
          {{--  //=====  --}}

          <label class="control-label col-sm-1 text-left" for="edSecn">Section:</label>
          <div class="col-sm-2">
          <select class="form-control" name="edSecn" id="edSecn">
                <option value="0"></option>
                @foreach($secs as $sec)              
                  <option value="{{$sec->id}}">{{$sec->name}}</option>              
                @endforeach
            </select>            
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-1 text-left" for="edGndr">Gender:</label>
          <div class="col-sm-2">
          <select class="form-control" name="edGndr" id="edGndr">
                <option value="0"></option>
                @foreach($ssex as $sex)              
                  <option value="{{$sex->options}}">{{$sex->options}}</option>              
                @endforeach
            </select>            
          </div>

          <label class="control-label col-sm-1 text-left" for="edRelg">Religion:</label>
          <div class="col-sm-2">
          <select class="form-control" name="edRelg" id="edRelg">
                <option value="0"></option>
                @foreach($relg as $rel)              
                  <option value="{{$rel->options}}">{{$rel->options}}</option>              
                @endforeach
            </select>            
          </div>


          <label class="control-label col-sm-1 text-left" for="edCste">Caste:</label>
          <div class="col-sm-2">
          <select class="form-control" name="edCste" id="edCste">
                <option value="0"></option>
                @foreach($cste as $cst)              
                  <option value="{{$cst->options}}">{{$cst->options}}</option>              
                @endforeach
            </select>            
          </div>

          <label class="control-label col-sm-1 text-left" for="edNatn">Nation:</label>
          <div class="col-sm-2">
          <select class="form-control" name="edNatn" id="edNatn">
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
    $('.btnEdit').on('click', function(){

      var v = $(this).data('id');
      
      var name = $("#tabclss #tr"+v+" #name").text();
      var clss = $("#tabclss #tr"+v+" #clss").text();
      var secn = $("#tabclss #tr"+v+" #section").text();
      var gndr = $("#tabclss #tr"+v+" #ssex").text();
      var relg = $("#tabclss #tr"+v+" #relg").text();
      var cste = $("#tabclss #tr"+v+" #cste").text();     
      
      alert ("id:"+gndr);
      
      $('input[name="edStdId"]').val(v);//hidden text box to transfer student_id only
      $('input[name="edName"]').val(name);      
      {{--  $('inpu[name="edClssText"]').text(clss);  --}}
      $('select[name="edClss"]').find('option:contains('+clss+')').attr("selected",true);
      $('select[name="edSecn"]').find('option:contains('+secn+')').prop("selected",true);
      $('select[name="edGndr"]').find('option:contains('+gndr+')').prop("selected",true);
      $('select[name="edRelg"]').find('option:contains('+relg+')').prop("selected",true);
      $('select[name="edCste"]').find('option:contains('+cste+')').prop("selected",true);

      
      //$('#editStudentData').modal('show');
    });

  });
</script>

 <script type="text/javascript">
//  $(document).ready(function(e){
//    $('.std_sec').change(function(){
//      var sec = $(this).val();
      
       
//      var u = '{{url("/updateSection")}}';//'{{url("/updateRoll")}}';
//      var t = '{{ csrf_token() }}';
//      $.ajax({
//        method: 'post',
//        url: u,
//        data:{sec:sec,  _token:t},
//        success: function(msg){
//          console.log('StdDB Id:'+msg['sid']+", Section Id:"+msg['ssec']);
//          $('#tr'+msg['sid']+' #tdsec'+msg['sid']).html(msg['ssec']);
//        },
//        error: function(data){
//          console.log(data);
//        }
//      });
//    });
//});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
