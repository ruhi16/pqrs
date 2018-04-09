@extends('layouts.baselayout')

@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Newly Admited Students, waiting for Section Allotment</h1>
<div class="row">
    <table class="table table-bordered table-striped" id="tabclss">
    <thead class="thead-dark">
        <tr>
            <th>Adm Sl-Date</th>
            <th>Name</th>
            <th>Fathers Name</th>
            <th>Class</th>
            <th>Sec</th>            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stds as $std)
    <tr id="tr{{$std->id}}">
        <td id="id">{{$std->id}}</td>
        <td id="name">{{$std->name}}</td>
        <td id="fname">{{$std->fname}}</td>
        <td id="clss">{{$std->clss->name}}</td>
        <td id="section"></td>
        
        <td>
            @php 
                $allSecs = $allClsSec->where('clss_id', $std->stclss_id) 

            @endphp            
            <select class="form-control std_sec" name="sec">
                @foreach($allSecs as $sec)
                    <option >{{ $sec->section->name }}</option></option>
                    
                @endforeach
            </select>            
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>


</div>


 <script type="text/javascript">
  $(document).ready(function(e){
    $('.std_sec').change(function(){
        var sec = $(this).val();
        //alert(sec);
        var u = '{{ url("/studentdbmultipage-updateSection") }}';//'{{url("/updateRoll")}}';
        var t = '{{ csrf_token() }}';
        $.ajax({
            method: 'post',
            url: u,
            data:{sec:sec,  _token:t},
            //success: function(msg){
                //console.log('StdDB Id:'+msg['sid']+", Section Id:"+msg['ssec']);
                //$('#tr'+msg['sid']+' #tdsec'+msg['sid']).html(msg['ssec']);
            //},
            //error: function(data){
                //console.log(data);
            //}
        });
    });
});  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
