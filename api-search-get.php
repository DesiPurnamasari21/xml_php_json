<?php
//this is GET method example
header("content-type: application/json"); 
header("Access-Control-Allow-Origin: *"); 


//url bar se value lengy like ?search=prince
$search=isset($_GET["search"]) ? $_GET["search"]: die();

include "config.php";

$sql="SELECT * FROM plant WHERE nama_tanaman LIKE '%{$search}%'";

$result=mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
  $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
  echo json_encode($output);
}else{
  echo json_encode(array("message"=> "Data Tidak Ditemukan","status"=> FALSE));
}

?>