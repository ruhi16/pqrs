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
        
        <h2 align="center">{{ $school->name }}</h2>
        <h3 align="center">Studets Master Roll for ___________________________________, Session: {{ $session->name }}</h3>
        <h4 align="center">Class: <b>{{ $clss->name }}, Section: {{ $section->name }}, Teacher: ______________________________, Date: ______________</b></h4>
        
        <table border="1" width="100%">
            <thead>
            <tr height="200">
                <th width="5%"><small>Roll</small></th>
                <th width="20%">Name(<small>{{ $clss->name }}-{{ $section->name }})</small></th>
                <th width="10%">DOB</th>
                <th width="30%">Bank Details</th>
                <th width="10%"><small>Adm Sl - Date</small></th>
                <th width="25%"><small>Aadhaar/Caste</small></th>
                                
            </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($stdList as $std)
                <tr>
                    <td height="60" align="center"><small>{{ $i++ }}</small></td>
                    <td valign="top"><small>{{ $std->studentdb->name }}<BR/>FN:<BR/>V/P:</small></td>                
                    <td></td>
                    <td><small>A/c No:<BR/>Bank/Br: <br/>IFSC:</small></td>
                    <td></td>
                    <td valign="bottom"><hr><small>GEN/SC/ST/OBC-A/OBC-B</small></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

    </body>
</html>
