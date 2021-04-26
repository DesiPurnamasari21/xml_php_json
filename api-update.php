<?php

header("Content-Type: application/json"); 
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Mehtods: PUT");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");


/* use id for update record
{  
	"sid": 2,
	"sname": "Prince",
	"sjenis":"Bunga",
	"sjumlah":"20";
}*/

//json format data converted to associative array
$data=json_decode(file_get_contents("php://input"),TRUE); 

$id=$data['sid'];
$name=$data['sname'];
$jenis=$data['sjenis'];
$jumlah=$data['sjumlah'];

include "config.php";

$sql="UPDATE plant SET nama_tanaman='{$name}',jenis='{$jenis}',jumlah={$jumlah} WHERE id={$id} ";


if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=> "Data Tanaman Berhasil Diubah","status"=> TRUE));
}else{
	echo json_encode(array("message"=> "Data Tanaman Gagal Diubah","status"=> FALSE));
}
?>