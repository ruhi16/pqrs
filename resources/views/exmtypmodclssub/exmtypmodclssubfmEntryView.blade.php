@extends('layouts.baselayout')
@section('title','Home')

@section('header')
	@include('layouts.navbar')
@endsection

@section('content')
<h1>Exam Exam-Type Class Subject Wise Full Marks Distribution</h1>


<table class="table table-bordered">
<caption class = "text-center"><h3>For Class: {{ $cls->name }}</h3></caption>
<input type="hidden" name="clsId" value="{{ $cls->id }}">
<thead>
    <tr>
        <th rowspan="2" class="text-center">Exam Type</th>
        <th rowspan="2" class="text-center">Subject</th>
        @foreach($exams as $exam)
            <th colspan="2" class="text-center">{{ $exam->name }}</th>
        @endforeach
        <th rowspan="2">Total</th>
    </tr>
    <tr>        
        @foreach($exams as $exam)
            <th class="text-center">ORAL</th>
            <th class="text-center">WRITTEN</th>
        @endforeach        
    </tr>
</thead>
<tbody>    
    @foreach($clsbs as $clsb)
        @if($clsb->clss_id == $cls->id)
        @php $subTotal = 0; @endphp
        <tr>
            <td>{{ $clsb->subject->extype->name }}</td>
            <td>{{ $clsb->subject->name }}</td>
            
            @foreach($exams as $exm)
                @foreach($exmds as $emd)
                    @php
                        $flag = $etmcs->where('exam_id', $exm->id)
                                      ->where('extype_id', $clsb->subject->extype_id)
                                      ->where('mode_id', $emd->id)
                                      ->first();
                    @endphp

                    
                    @if($flag)
                        @php
                            $fm = $etmcsfm->where('exam_id', $exm->id)
                                ->where('extype_id', $clsb->subject->extype_id)
                                ->where('mode_id', $emd->id)
                                ->where('subject_id', $clsb->subject_id)
                                ->pluck('fm')->first()
                                ;
                                $subTotal += $fm;
                        @endphp

                        <td class="text-center">                        
                            {{ $fm }}
                        </td> 
                    @else
                        <td></td>
                    @endif
                    
                @endforeach
            @endforeach
            
            <td class="text-center"><b>{{ $subTotal }}</b></td>
        </tr>
        @endif
    @endforeach
</tbody>
</table>

{{-- <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

<br>

<script type="text/javascript">
  $(document).ready(function(e){
    
  });  
</script>

@endsection

@section('footer')
	@include('layouts.footer')
@endsection
