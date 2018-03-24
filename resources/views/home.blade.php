{{--  @extends('layouts.app')  --}}
{{--  @section('content')  --}}
@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!XXX
                    <a href="{{url('/start')}}">start</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  @endsection  --}}
<script type="text/javascript">
$(document).ready(function(e){
    
});  
</script>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection
  
