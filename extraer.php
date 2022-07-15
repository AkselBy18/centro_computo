<?php 
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => 'root', 
'db'   => 'e_serverside'
); 
// mysql db table to use 
$table = 'usuarios'; 
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
array( 'db' => 'nombre', 'dt' => 0 ), 
array( 'db' => 'apellidos',  'dt' => 1 ), 
array( 'db' => 'email',      'dt' => 2 ), 
array( 'db' => 'genero',     'dt' => 3 ), 
array( 'db' => 'pais',    'dt' => 4 ), 
array( 
'db'        => 'creado', 
'dt'        => 5, 
'formatter' => function( $d, $row ) { 
return date( 'jS M Y', strtotime($d)); 
} 
), 
array( 
'db'        => 'estado', 
'dt'        => 6, 
'formatter' => function( $d, $row ) { 
return ($d == 1)?'Activo':'Inactivo'; 
} 
) 
); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);