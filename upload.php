<?php

//upload.php

if(isset($_FILES['files']))
{

	for($count = 0; $count < count($_FILES['files']['name']); $count++)
	{
		$extension = pathinfo($_FILES['files']['name'][$count], PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['files']['tmp_name'][$count], 'files/' . $_FILES['files']['name'][$count]);

	}
}



?>
