@extends('layouts.baselayout')

@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Student's Detail Records...</h1>

<table class="table table-bordered">
<thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Father's Name</th>
        <th>Class</th>
        <th>Sec</th>
        <th>Sec Action</th>
        <th>Adm Sl & Adm Date</th>
    </tr>
</thead>
@foreach($stds as $std)
<tr>
    <td>{{$std->id}}</td>
    <td>{{$std->name}}</td>
    <td>{{$std->fname}}</td>
    <td>{{$std->stclss_id}}</td>
    <td></td>
    <td>
      <!-- Select Option -->
      <div class="form-group">      
      <select class="form-control std_sec" id="sel1">
        @foreach($allClsSec as $allCS)
            @if($std->stclss_id == $allCS->clss_id)
              <option value="{{$std->id}}-{{$allCS->section->id}}">{{ $allCS->section->name }}</option>
            @endif
        @endforeach  

      </select>
    </div>
    </td>
    <td>{{$std->roll_no or 'NA'}}</td>
</tr>
@endforeach
</table>


<button 
   type="button" 
   class="btn btn-primary btn-lg" 
   data-toggle="modal" 
   data-target="#favoritesModal">
  Add to Favorites
</button>




<div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
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

        
        {{--  <table class="table table-bordered">
            <thead>
                <tr>
                  
                
                </tr>    
            </thead>

            <tbody>
            <tr>    
              
            
            </tr>
            </tbody>
        </table>  --}}

        <div class="form-group">
          <label class="control-label col-sm-1" for="name">Name:</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Students Name">
          </div>

          <label class="control-label col-sm-1" for="clss">Class:</label>
          <div class="col-sm-2">
            <select class="form-control" name="clss" id="cl">
                <option value="0"></option>
              @foreach($allClsSec as $cls)              
                <option value="{{$cls->id}}">{{$cls->name}}</option>              
              @endforeach
            </select>
          </div>
        </div>




        <div class="form-group">
          <label class="control-label col-sm-3 text-left" for="fname">Father's Name:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Father's Name">
          </div>

         
        </div>

{{--  
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>  --}}


      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            Add to Favorites
          </button>
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
      //alert(sec);
      var u = '{{url("/updateSection")}}';//'{{url("/updateRoll")}}';
      var t = '{{csrf_token()}}}';
      $.ajax({
        method: 'post',
        url: u,
        data:{sec:sec,  _token:t},
        success: function(mst){
          console.log(msg['m']);
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
