<!DOCTYPE html>
<html>
    <head>
        <title>Html Result Format</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        border-spacing: 0px;
        {{--  width: 100%;  --}}
        font-size: 14px;
        {{--  border-collapse: collapse;  --}}
        
    }
    th, td {
    padding: 2px;
    }
    </style>
    <style>
    .page-break {
        page-break-after: always;
    }
    </style>


    <body>
        <center>
        <h2>{{ $school->name }}</h2>
        <h3>Formative Marks for 1st/2nd/3rd Term Exam, Session: {{ $session->name }}</h3>
        <h4>Class: <b>{{ $clss->name }}, Section: {{ $section->name }}, Teacher: ________________________________, Date: ________</b></h4>
        </center>
        <table border="1" width="100%">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Roll</th>
                {{-- @foreach($exms as $ex)
                    <th>{{ $ex->name }}</th>
                @endforeach --}}
                @foreach($subjs as $subj)
                    <th>{{ $subj->code }}</th>
                @endforeach
                {{--  <th>Signature</th>
                <th>Remarks</th>  --}}
            </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($stdList as $std)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $std->name }}</td>
                    <td>{{ $i++ }}</td>
                    {{-- @foreach($exms as $ex)
                        <td></td>
                    @endforeach --}}
                    @foreach($subjs as $subj)
                        <th></th>
                    @endforeach
                    {{--  <td></td>
                    <td></td>  --}}
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
