<?php

require_once './db.php';

// DB table to use
$table = 'students';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = [
	['db' => 'id', 'dt' => 0],
	['db' => 'username', 'dt' => 1],
	['db' => 'email', 'dt' => 2],
	['db' => 'first_name', 'dt' => 3],
	['db' => 'last_name', 'dt' => 4],
	['db' => 'course', 'dt' => 5],
	[
		'db' => 'username',
		'dt' => 6,
		'formatter' => function($id)
		{
			return "<a class='btn btn-info' href='/users/view/$id'>View Profile</a>";
		}
	]
];

require_once __DIR__ . DIRECTORY_SEPARATOR . 'SSP.php';
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns));
