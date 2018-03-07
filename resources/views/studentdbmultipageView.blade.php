@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Students DB Multipage View...</h1>


{{--  {{ $stddb->dump() }}  --}}

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Adm Book No</th>
    <th>Adm Sl No</th>
    <th>Prev Class</th>
    <th>Prev SChool</th>
    <th>Adm Date</th>

    <th>Name</th>
    <th>Adhaar</th>
    <th>Father Name</th>
    <th>Father Adhaar</th>
    <th>Mother Name</th>
    <th>Mother Adhaar</th>
    <th>Date of Birth</th>
    <th>Village</th>
    <th>Post Office</th>
    <th>Police Station</th>
    <th>District</th>
    <th>Pin</th>
    <th>Mobile No</th>
    
    <th>Gender</th>
    <th>Phy Challanged</th>
    <th>Religion</th>
    <th>Caste</th>
    <th>Nationality</th>
    
    <th>Account No</th>
    <th>IFSC</th>
    <th>MICR</th>
    <th>Bank Name</th>
    <th>Branch Name</th>
    
    <th>Start Class</th>
    <th>Start Section</th>
    <th>Start Roll</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
    <tr> 
    @foreach($stddb as $sdb)       
        <td>{{ $sdb->id }} </td>    
        <td>{{ $sdb->admBookNo }} </td>
        <td>{{ $sdb->admSlNo }} </td>    
        <td>{{ $sdb->prCls }} </td>    
        <td>{{ $sdb->prSch }} </td>    
        <td>{{ $sdb->admDate }} </td>  
        
        <td>{{ $sdb->name }} </td>    
        <td>{{ $sdb->adhaar }} </td>    
        <td>{{ $sdb->fname }} </td>    
        <td>{{ $sdb->fadhaar }} </td>    
        <td>{{ $sdb->mname }} </td>    
        <td>{{ $sdb->madhaar }} </td>    

        <td>{{ $sdb->dob }} </td>    
        <td>{{ $sdb->vill }} </td>    
        <td>{{ $sdb->post }} </td>    
        <td>{{ $sdb->pstn }} </td>    
        <td>{{ $sdb->dist }} </td>    
        <td>{{ $sdb->pin }} </td>    
        <td>{{ $sdb->mobl }} </td>    
        
        <td>{{ $sdb->ssex }} </td>    
        <td>{{ $sdb->phch }} </td>    
        <td>{{ $sdb->relg }} </td>    
        <td>{{ $sdb->cste }} </td>    
        <td>{{ $sdb->natn }} </td>  

        <td>{{ $sdb->accno }} </td>    
        <td>{{ $sdb->ifsc }} </td>    
        <td>{{ $sdb->micr }} </td>    
        <td>{{ $sdb->bnnm }} </td>    
        <td>{{ $sdb->brnm }} </td> 
        
        <td>{{ $sdb->stclss_id }} </td>    
        <td>{{ $sdb->stsec_id }} </td>    
        <td>{{ $sdb->stsession_id }} </td>  
        <td>
            <a href="{{url('/studentdbmultipage-edit/1')}}" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-warning">Delete</a>
        </td>
    @endforeach
    </tr>
</tbody>


</table>



<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
