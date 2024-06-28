<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <link rel="icon" href="diskette.png" type="image/icon type">
        <title>رفع ملفات</title>
    </head>
    <body>

        <div class="container">
            <h1 class="mt-3 mb-3 text-center">رفع ملفات</h1>

            <div class="card">
                <div class="card-header"> اختيار ملف</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            
                            <td width="50%">
                                <input type="file" id="select_file" multiple />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br />
            <div class="progress" id="progress_bar" style="display:none; ">

                <div class="progress-bar" id="progress_bar_process" role="progressbar" style="width:0%;font-weight: bolder;font-size: 18px;">0%</div>

            </div>

            <div id="uploaded_image" class="row mt-5"></div>
        </div>
    </body>
</html>

<script>

function _(element)
{
    return document.getElementById(element);
}

_('select_file').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('select_file').files.length; count++)  
    {
        form_data.append("files[]", _('select_file').files[count]);
        image_number++;
    }

    _('progress_bar').style.display = 'block';
    _('progress_bar').style.height = '2rem';
    _('progress_bar_process').style.height = '2rem';


        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "upload.php");
        // _('progress_bar_process').style.height = '200px';

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);
            _('progress_bar_process').style.width = percent_completed + '%';
            _('progress_bar_process').innerHTML = percent_completed + '% completed';

        });

          ajax_request.addEventListener('load', function(event) {
                    var alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success';
                    alertDiv.innerText = 'تم رفع الملف بنجاح';
                    alertDiv.style.fontSize  = '18px';
                    alertDiv.style.fontWeight = 'bolder';
                    _('uploaded_image').appendChild(alertDiv);
                    _('select_file').value = '';
                    setTimeout(function() {
                       // alertDiv.remove();
                        window.location.reload(); // Reload the window after 3 seconds
                    }, 2000);

                });


        ajax_request.send(form_data);

};

</script>
