<?php
//phpinfo();

error_reporting(-1);
ini_set("display_errors",1);
try{
$pdo = new \PDO(
    'mysql:host=db;dbname=new',
    'admin',
    '**ChangeMe**'
);
 

} catch (Exception $e)
{
	echo $e->getMessage();
}