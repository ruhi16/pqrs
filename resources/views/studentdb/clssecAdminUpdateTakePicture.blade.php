<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="{{ asset('bs337/webcam/jquery.min.js') }}"></script>
    <script src="{{ asset('bs337/webcam/webcam.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bs337/webcam/bootstrap.min.css') }}" />
    
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Capture webcam image with php and jquery - ItSolutionStuff.com</h1>
    <h2>Student Name: {{ $studentdb->name }}    </h2>
    <h3>StudentDB Id: {{ $studentdb->id }}</h3>

    
    <form method="POST" action="{{ url('clssecAdminUpdate-takePicture-done', [$studentdb->id, $clteacher_id, $clss_id, $section_id]) }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-right">
                <br/>
                <button class="btn btn-success btn-submit" id="mySubmit" disabled >Submit</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );

        document.getElementById("mySubmit").disabled = false;
    }
</script>
 
</body>
</html>