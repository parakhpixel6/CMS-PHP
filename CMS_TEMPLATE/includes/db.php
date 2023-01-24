<?php ob_start();

 $db['db_host'] = "localhost";
 $db['db_user'] = "root";
 $db['db_pass'] = "Shaavi@210119";
 $db['db_name'] = "cms";

 foreach($db as $key => $value){
   define(strtoupper($key), $value);
}

 $connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);



 $query = "SET NAMES utf8";
mysqli_query($connection,$query);

//if($connection) {
//
//echo "We are connected";
//
//}



// $connection = mysqli_connect('localhost', 'root', 'Shaavi@210119', 'login');
// if($connection){
//    echo "We are Connected";
// } else {
//    die("Database Connection Failed");
// }


error_reporting(E_ALL ^ E_WARNING); 






?>