<?php

	$page = 'admin';
	$section = 'upload';
	requireAdmin();
	$courses = Database::getInstance()->query('SELECT course_name FROM courses')->results();
	$lecturers = Database::getInstance()->query('SELECT name FROM lecturers')->results();
	$uploadErrors = uploadErrors();
	$notesPath = ROOTPATH . '/downloads/notes/';
	$notesRootPath = file_exists($notesPath) ? $notesPath : mkdir($notesPath, 0777, true);
	$timeTablesPath = ROOTPATH . '/downloads/timetables/';
	$timeTablesRootPath = file_exists($timeTablesPath) ? $timeTablesPath : mkdir($timeTablesPath, 0777, true);
	$maxFileSize = 5000000;

	if (isset($_POST['submitnotes'])) 
	{
		$notesName = $_POST['name'];
		$lecturerName = $_POST['lecturer'];
		$courseName = $_POST['course'];
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$notesFile = $_FILES['file'];
		$uploadError = $notesFile['error'];
		$error = $uploadErrors[$uploadError];

		if ($notesFile['size'] <= $maxFileSize && $notesFile['error'] == 0) 
		{
			$newFileName = date("Y-m-d-h-i-s-a") . '-' . $notesFile['name'];
			$moveFile = move_uploaded_file($notesFile['tmp_name'], $notesRootPath . $newFileName);
			$notesRootPath = $notesRootPath . $newFileName;
			$array = array($notesName,$lecturerName,$courseName,$year,$semester,$notesRootPath);

			if ($moveFile) 
			{
				$sqlQuery = 'INSERT INTO notes(name, lecturer, course, year, semester, rootpath) VALUES(?, ?, ?, ?, ?, ?)';

				if (Database::getInstance()->query($sqlQuery, $array)) 
				{
					Redirect::to('/upload/?notestatus=success');
				}
				else
				{
					$errorListNotes[] = Database::getInstance()->query($sqlQuery, $array)->error();					
				}
			}
			else 
			{
				error_log('Failed to move file. This could be because of permisions or there is no such file or directory', 3, $errorStore);
				$errorListNotes[] = 'Failed to upload file, Try again later';
			}
		}
		else 
		{
			$errorListNotes[] = $error;
		}
	}

	if (isset($_POST['submittimetable'])) 
	{
		$timeTableName = $_POST['name'];
		$uploadedBy = $_POST['lecturer'];
		$academicYear = $_POST['year'];
		$timetableFile = $_FILES['file'];
		$uploadError = $timetableFile['error'];
		$error = $uploadErrors[$uploadError];

		if ($timetableFile['size'] <= $maxFileSize && $timetableFile['error'] == 0) 
		{
			$newFileName = date("Y-m-d-h-i-s-a") . '-' . $timetableFile['name'];
			$moveFile = move_uploaded_file($timetableFile['tmp_name'], $timeTablesRootPath . $newFileName);
			$timeTablesRootPath = $timeTablesRootPath . $newFileName;
			$array = array($timeTableName,$uploadedBy,$academicYear,$timeTablesRootPath);

			if ($moveFile) 
			{
				$sqlQuery = 'INSERT INTO timetables(name, addedby, year, rootpath) VALUES(?, ?, ?, ?)';

				if (Database::getInstance()->query($sqlQuery, $array)) 
				{
					Redirect::to('/upload/?timetablestatus=success');
				}
				else
				{
					$errorListTimeTable[] = Database::getInstance()->query($sqlQuery, $array)->error();
				}
			}
			else 
			{
				error_log('Failed to move file. This could be because of permisions or there is no such file or directory', 3, $errorStore);
				$errorListTimeTable[] = 'Failed to upload file, Try again later';
			}
		}
		else 
		{
			$errorListTimeTable[] = $error;
		}		
	}  

	require_once HEADER;

	require_once ROOTPATH . '/src/templates/upload.php';

	require_once FOOTER;

?>