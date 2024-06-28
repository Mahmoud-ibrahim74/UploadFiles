function _(element) {
    return document.getElementById(element);
}

_('select_file').onchange = function(event) {
    var form_data = new FormData();
    var image_number = 1;
    var error = '';

    for (var count = 0; count < _('select_file').files.length; count++) {
        form_data.append("files[]", _('select_file').files[count]);
        image_number++;
    }

    _('progress_bar').style.display = 'block';

    var ajax_request = new XMLHttpRequest();
    ajax_request.open("POST", "upload.php");

    ajax_request.upload.addEventListener('progress', function(event) {
        var percent_completed = Math.round((event.loaded / event.total) * 100);
        _('progress_bar_process').style.width = percent_completed + '%';
        _('progress_bar_process').innerHTML = percent_completed + '% completed';
    });

    ajax_request.addEventListener('load', function(event) {
        console.log("form_data", image_number);
        var alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success';
        alertDiv.innerText = image_number > 1 ? 'Files uploaded sucessfully' : 'File uploaded sucessfully';
        alertDiv.style.fontSize = '18px';
        alertDiv.style.fontWeight = 'bolder';

        _('uploaded_image').appendChild(alertDiv);
        _('select_file').value = '';

        setTimeout(function() {
            alertDiv.remove();
            window.location.reload(); // Reload the window after 3 seconds
        }, 3000);
    });

    ajax_request.send(form_data);
};

