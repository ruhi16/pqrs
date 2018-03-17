<!DOCTYPE html>
<html>
<head>
    

</head>
<body>
<a href="{{url('/PdfSheetExStudentDb')}}">PDF Download</a>
<table class="table table-bordered">
<thead>
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Mobile</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>1</td>
        <td>Ayantika</td>
        <td>123456</td>
    </tr>
</tbody>
</table>
{{--  @foreach($subjects as $subj)
    {{$subj->name}}<br>

@endforeach
@foreach($clsses as $clss)
    {{$clss->name}}<br>

@endforeach  --}}

{{--  <style>
.page-break {
    page-break-after: always;
}
</style>
<h1>Page 1</h1>
<div class="page-break"></div>
<h1>Page 2</h1>
      --}}
</body>
</html>
