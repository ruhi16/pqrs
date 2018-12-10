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
            <th>Verification</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stds as $std)
    <tr id="tr{{$std->id}}">
        <td id="id">{{$std->id}}</td>
        <td id="name">{{$std->name}}</td>
        <td id="fname">{{$std->fname}}</td>
        <td id="clss">{{$std->clss->name}}</td>
        <td id="section">{{$std->section->name}}</td>
        
        
            @php  $allSecs = $allClsSec->where('clss_id', $std->stclss_id);    @endphp            
            @if($std->crstatus == NULL)
            <td>
            <select class="form-control std_sec" name="sec" data-sid="{{$std->id}}">
                    <option ></option>
                @foreach($allSecs as $sec)
                    <option value="{{ $sec->id }}">{{ $sec->section->name }}</option></option>
                    
                @endforeach
            </select>
            </td>
            <td>
                {{--  @if($std->stsec_id == NULL)  --}}
                    {{--  Verified  --}}
                {{--  @else  --}}
                    <button class="btn btn-info btn-verify" data-sid="{{$std->id}}" >Verify</button>
                {{--  @endif  --}}
            </td>
            @else
                <td>Selected</td>
                <td>Verified</td>
            @endif
        
    </tr>
    @endforeach
    </tbody>
    </table>


</div>


 <script type="text/javascript">
  $(document).ready(function(e){
    $('.std_sec').change(function(){
        var sec = $(this).val();
        var sid = $(this).data('sid');
        //alert(sec);
        //console.log('aaa');
        
        var u = '{{ url("/studentdbmultipage-updateSection") }}';//'{{url("/updateRoll")}}';
        var t = '{{ csrf_token() }}';
        // alert(t);
        $.ajax({
            method: 'post',
            url: u,
            data:{sid:sid, sec:sec, _token:t},
            success: function(msg){
                console.log("from Ajax");
                
                console.log('StdDB Id:'+msg['sid']+", Section Id:"+msg['sec']+", Cr Status:"+msg['crst']);
                $('#tr'+msg['sid']+' #section').html(msg['sec']);
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    $('.btn-verify').click(function(){
        var sid = $(this).data('sid');
        // alert(sid);
        var u = '{{ url("/studentdbmultipage-verifySection") }}';
        var t = '{{ csrf_token() }}';
        $.ajax({
            method: 'post',
            url: u,
            data:{sid:sid, _token:t},
            success: function(msg){
                console.log('verify section success:'+msg['m']);
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
