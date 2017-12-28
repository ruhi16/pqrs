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
    </tr>
</thead>
@foreach($stds as $std)
<tr>
    <td>{{$std->id}}</td>
    <td>{{$std->name}}</td>
    <td>{{$std->fname}}</td>
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

        
        <table class="table table-bordered">
            <thead>
                <tr>
                
                
                </tr>    
            </thead>

            <tbody>
            <tr>    
            
            
            </tr>
            </tbody>
        </table>

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
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
