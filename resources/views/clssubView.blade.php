@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Class Subject View...</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            
            @foreach($clss as $cls)
                <th>
                    {{ $cls->name }}                   
                    = Total Subjects: {{ $clssubs->where('clss_id', ($cls->id))->count() }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($extps as $extp)
            <tr>
                <td>{{ $extp->name }}</td>
                @foreach($clss as $cls)
                    <td>
                    <ul>
                        @foreach($clssubs as $clssub)
                            @if( $clssub->clss_id == $cls->id && $extp->id == $clssub->subject->extype_id)
                                <li>{{ $clssub->subject->name }} </li>
                            @endif
                        @endforeach
                    </ul>
                    </td>
                @endforeach
            </tr>
        @endforeach
        {{--  @foreach($clssubs as $clssub)
        <tr>
            <td>{{$clssub->id}}</td>
            <td>{{ $clss->where('id', ($clssub->clss_id))->first()->name }}</td>
            <td>{{ $subjects->where('id', ($clssub->subject_id))->first()->name }}</td>
            @foreach($clss as $cls)
                <td>{{ $cls->name }}</td>
            @endforeach
        </tr>
        @endforeach  --}}
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
