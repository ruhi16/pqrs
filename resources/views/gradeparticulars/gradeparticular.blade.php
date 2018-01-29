@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Gradeparticular Information...</h1>

<div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h3 class="panel-title pull-left">
          Grade Particular Details
              </h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            Add New Gradeparticular
          </button>
          <div class="clearfix"></div>
      
      </div>
      {{--  <div class="panel-body">
        <p>...</p>
      </div>  --}}
  
          <table class="table table-bordered" id="tabclss">
              <thead>
                  <tr>
            <th>#</th>
            <th>Grade Paticular</th>
            <th>Session</th>          
            <th>Status</th> 
            <th>Action</th>         
                  </tr>
              </thead>
              <tbody>
        @foreach($grparts as $grpart)
          <tr id="tr{{$grpart->id}}">
            <th id="id">{{$grpart->id}}</th>
            <th id="name">{{ $grpart->name }}</th>
            <td>{{ $grpart->session_id }}</td>
            <td>{{ $grpart->session_id }}</td>
            <td>
                <button class="btn btn-success btn-sm btnEdit" data-id="{{$grpart->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
                <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$grpart->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
            </td>
          </tr>
        @endforeach
              </tbody>
          </table>
    </div><!--/panel starting div -->
  </div><!--/1st row within 2nd column -->
  



<!-- Modal Starts to Add New Grade Paticular -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        {!! Form::open(['url'=>'/gradeparticulars-submit','method'=>'post', 'class'=>'form-horizontal']) !!}
              <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Enter New Grade Particular...</h4>
        </div>
        <div class="modal-body">        
  
  
            <div class="form-group">
              <label class="control-label col-sm-5" for="grPart">Enter New Grade Particular:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="grPart" name="grPart" placeholder="enter new grade particular">
                </div>         
            </div>
  
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
              {!! Form::close() !!}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal Ends -->




<!-- Modal Starts to Edit Grade Particulars -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            {!! Form::open(['url'=>'/gradeparticulars-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit or Update Grade Particulars ...</h4>
            </div>
            <div class="modal-body"> 
                <div class="form-group">
                    <label class="control-label col-sm-4" for="editGrPartName">Grade Particular Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="editGrPartName" name="editGrPartName" placeholder="Grade Particular Name">
                    </div>         
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="editGrPartId" name="editGrPartId" placeholder="Grade Particular Name">
                    </div>         
                </div>            
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                  {!! Form::close() !!}
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- Modal Ends -->
      
      
      <!-- Modal Starts to Delete grade particulars -->
      <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            {!! Form::open(['url'=>'/gradeparticulars-deltsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
                  <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Do You Want to Delete Class...</h4>
            </div>
            <div class="modal-body">        
      
      
                <div class="form-group">
                  <label class="control-label col-sm-5" for="deltGrPartName">Grade Particular Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="deltGrPartName" name="deltGrPartName" placeholder="existing exam term name" disabled>
                    </div>         
                <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="deltGrPartId" name="deltGrPartId" placeholder="existing exam term name">
                </div>         
                </div>
      
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                  {!! Form::close() !!}
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- Modal Ends -->
      
      
      
      <script type="text/javascript">
        $(document).ready(function(e){    
          $('.btnEdit').on('click', function(){
            var v = $(this).data('id');
            var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
            var name = $("#tabclss #tr"+v+" #name").text();
            //alert(name);
      
      
            $('input[name="editGrPartName"]').val(name);
            $('input[name="editGrPartId"]').val(v);
            //$('#editModal').modal('show');
          });
      


          $('.btnDelt').on('click', function(){
            var v = $(this).data('id');
            var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
            var name = $("#tabclss #tr"+v+" #name").text();
            //alert(name);
      
            $('input[name="deltGrPartName"]').val(name);
            $('input[name="deltGrPartId"]').val(v);  
          });
        });  
      </script>
@endsection

@section('footer')
	@include('layouts.footer')
@endsection
