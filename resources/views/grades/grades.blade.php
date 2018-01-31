@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Grade Information Details...</h1>

<div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h3 class="panel-title pull-left">
          Grade Infromation Details
              </h3>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            Add New Grade
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
                <th>Exam Type</th>
                <th>Grade</th>
                <th>Start Percentage</th>
                <th>End Percentage</th>
                <th>Session</th>          
                <th>Description</th> 
                <th>Action</th>         
              </tr>
            </thead>
            <tbody>
              @foreach($grades as $grade)
                <tr id="tr{{$grade->id}}">
                  <th id="id">{{$grade->id}}</th>
                  <th id="extyp">{{ $grade->extype->name }}</th>
                  <td id="grade">{{ $grade->gradeparticular->name }}</td>
                  <td id="stper">{{ $grade->stpercentage }}</td>
                  <td id="enper">{{ $grade->enpercentage }}</td>
                  <td>           {{ $grade->session->name }}</td>
                  <td id="descr">{{ $grade->descrp }}</td>
                  <td>
                      <button class="btn btn-success btn-sm btnEdit" data-id="{{$grade->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
                      <button  class="btn btn-danger btn-sm btnDelt" data-id="{{$grade->id}}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                      {{--  <a href="{{url('/clssesDelt',[$clss->id])}}" class="btn btn-danger  btn-sm btnDelt">Delete</a>  --}}
                  </td>
                </tr>
              @endforeach
              </tbody>
          </table>
    </div><!--/panel starting div -->
  </div><!--/1st row within 2nd column -->
  



<!-- Modal Starts to Add New Grade -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        {!! Form::open(['url'=>'/grades-submit','method'=>'post', 'class'=>'form-horizontal']) !!}
              <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Enter New Grade Particular...</h4>
        </div>
        <div class="modal-body">        
  
  
            <div class="form-group">
              <label class="control-label col-sm-2" for="exType">Exam Type:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="extype" id="extype">
                      <option value="0"></option>
                    @foreach($extypes as $extype)              
                      <option value="{{$extype->id}}">{{$extype->name}}</option>              
                    @endforeach
                  </select>

                </div>
                <label class="control-label col-sm-1" for="grade">Grade:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="grade" id="grade">
                      <option value="0"></option>
                    @foreach($grparts as $grpart)              
                      <option value="{{$grpart->id}}">{{ $grpart->name }}</option>              
                    @endforeach
                  </select>
                </div>         
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="stperc">Start Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="stperc" name="stperc" placeholder="start percentage">
              </div> 
              <label class="control-label col-sm-2" for="enperc">End Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="enperc" name="enperc" placeholder="end percentage">
              </div> 
            </div>  

            <div class="form-group">
              <label class="control-label col-sm-2" for="descr">Description:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="descr" name="descr" placeholder="enter description, if any">
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




<!-- Modal Starts to Edit Grade -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            {!! Form::open(['url'=>'/grades-editsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit or Update Grade Particulars ...</h4>
            </div>    
            <div class="modal-body"> 


  
            <div class="form-group">            
              <input type="hidden" class="form-control" id="editGradeId" name="editGradeId" placeholder="Grade Particular Name">
            
              <label class="control-label col-sm-2" for="editExType">Exam Type:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="editExType" id="editExType">
                      <option value="0"></option>
                    @foreach($extypes as $extype)              
                      <option value="{{$extype->id}}">{{$extype->name}}</option>              
                    @endforeach
                  </select>

                </div>
                <label class="control-label col-sm-1" for="editGrade">Grade:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="editGrade" id="editGrade">
                      <option value="0"></option>
                    @foreach($grparts as $grpart)              
                      <option value="{{$grpart->id}}">{{ $grpart->name }}</option>              
                    @endforeach
                  </select>
                </div>         
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="editStperc">Start Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="editStperc" name="editStperc" placeholder="start percentage">
              </div> 
              <label class="control-label col-sm-2" for="editEnperc">End Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="editEnperc" name="editEnperc" placeholder="end percentage">
              </div> 
            </div>  

            <div class="form-group">
              <label class="control-label col-sm-2" for="editDescr">Description:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editDescr" name="editDescr" placeholder="enter description, if any">
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
      
      
      <!-- Modal Starts to Delete Grade -->
      <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            {!! Form::open(['url'=>'/grades-deltsubmit','method'=>'post', 'class'=>'form-horizontal']) !!}
                  <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Do You Want to Delete Class...</h4>
            </div>
            <div class="modal-body">        
      
      
            <div class="form-group">            
              <input type="hidden" class="form-control" id="deltGradeId" name="deltGradeId" placeholder="Grade Particular Name">
            
              <label class="control-label col-sm-2" for="deltExType">Exam Type:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="deltExType" id="deltExType" disabled>
                      <option value="0"></option>
                    @foreach($extypes as $extype)              
                      <option value="{{$extype->id}}">{{$extype->name}}</option>              
                    @endforeach
                  </select>

                </div>
                <label class="control-label col-sm-1" for="deltGrade">Grade:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="deltGrade" id="deltGrade" disabled>
                      <option value="0"></option>
                    @foreach($grparts as $grpart)              
                      <option value="{{$grpart->id}}">{{ $grpart->name }}</option>              
                    @endforeach
                  </select>
                </div>         
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="deltStperc">Start Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="deltStperc" name="deltStperc" placeholder="start percentage" disabled>
              </div> 
              <label class="control-label col-sm-2" for="deltEnperc">End Perc:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="deltEnperc" name="deltEnperc" placeholder="end percentage" disabled>
              </div> 
            </div>  

            <div class="form-group">
              <label class="control-label col-sm-2" for="deltDescr">Description:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="deltDescr" name="deltDescr" placeholder="enter description, if any" disabled>
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
            //var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
            var extyp = $("#tabclss #tr"+v+" #extyp").text();
            var grade = $("#tabclss #tr"+v+" #grade").text();
            var stper = $("#tabclss #tr"+v+" #stper").text();
            var enper = $("#tabclss #tr"+v+" #enper").text();
            var descr = $("#tabclss #tr"+v+" #descr").text();
            //alert(extype);
      
            $('select[name="editExType"]').find('option:contains('+extyp+')').prop("selected",true);
            $('select[name="editGrade"]').find('option:contains('+grade+')').prop("selected",true);
            
            $('input[name="editStperc"]').val(stper);
            $('input[name="editEnperc"]').val(enper);
            $('input[name="editDescr"]').val(descr);

            $('input[name="deltGradeId"]').val(v);
            //$('#editModal').modal('show');
          });
      


          $('.btnDelt').on('click', function(){
            var v = $(this).data('id');
            //var MyRows = $('table#tabclss').find('tbody').find('tr+text').text();
            var extyp = $("#tabclss #tr"+v+" #extyp").text();
            var grade = $("#tabclss #tr"+v+" #grade").text();
            var stper = $("#tabclss #tr"+v+" #stper").text();
            var enper = $("#tabclss #tr"+v+" #enper").text();
            var descr = $("#tabclss #tr"+v+" #descr").text();
            //alert(v);
      
            $('select[name="deltExType"]').find('option:contains('+extyp+')').prop("selected",true);
            $('select[name="deltGrade"]').find('option:contains('+grade+')').prop("selected",true);
            
            $('input[name="deltStperc"]').val(stper);
            $('input[name="deltEnperc"]').val(enper);
            $('input[name="deltDescr"]').val(descr);

            $('input[name="deltGradeId"]').val(v);

            //$('select[name="deltExType"]').find('option:contains('+extyp+')').prop('disabled', true);
            //$('#editModal').modal('show');  
          });
        });  
      </script>
@endsection

@section('footer')
	@include('layouts.footer')
@endsection
