<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="diskette.png" type="image/icon type">
    <title>رفع ملفات</title>

</head>
<style>
    .container-bottom{
        position: absolute;
        bottom: 20%;
    }
</style>

<body>
    <div class="title">
        <h3>Mahmoud - 2024</h3>
        <h1>Welcome To Files Upload</h1>
        <h3><strong> E M A I L - </strong>mhmoud.ibrahim74@gmail.com</h3>
    </div>
    <div class="container-fluid  justify-content-end align-items-end container-bottom">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">SELECT FILES</div>
                    <div class="card-body">
                        <input type="file" id="select_file" class="form-control" multiple />
                    </div>
                </div>
                <br />
                <div class="progress" id="progress_bar" style="display:none;">
                    <div class="progress-bar" id="progress_bar_process" role="progressbar" style="width:0%;font-weight: bolder;font-size: 18px;">0%</div>
                </div>
                <div id="uploaded_image" class="row mt-5"></div>
            </div>
        </div>
        <script src="../UploadFiles/js/jquery-3.6.0.min.js"></script>
        <script src="../UploadFiles/js/animate.js"></script>
        <script src="../UploadFiles/js/upload.js"></script>
</body>

</html>