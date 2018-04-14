<?php

	// function to print class active for the navbars
	function classActive($page, $listItem)
	{

		return $page == $listItem ? print 'class="active"' : print '';
				
	}

	function uploadErrors()
	{

		return	array(
		UPLOAD_ERR_OK 			=> 'Your file was uploaded successfuly',
		UPLOAD_ERR_INI_SIZE 	=> 'The uploaded file exceeds the upload max filesize.',
		UPLOAD_ERR_FORM_SIZE 	=> 'The uploaded file exceeds the form upload max filesize.',
		UPLOAD_ERR_PARTIAL 		=> 'The uploaded file was only partially uploaded. Try re-uploading the file again please.',
		UPLOAD_ERR_NO_FILE 		=> 'No file was uploaded.',
		UPLOAD_ERR_NO_TMP_DIR 	=> 'Upload Internal Server Error. Try again later.',
		UPLOAD_ERR_CANT_WRITE 	=> 'Upload Internal Server Error. Try again later.',
		UPLOAD_ERR_EXTENSION 	=> 'Upload Internal Server Error. Try again later.'
		);

	}

	function requireAuth()
	{

		if (!User::isLoggedIn())
		{
			
			Redirect::to('/login/');

		}

	}

	function requireAdmin()
	{

		requireAuth();

		if (!User::isAdmin())
		{
			
			die('<center><h2>Unauthorized Access. This attempt will be reported to administrators</h2></center>');

		}

	}

?>

