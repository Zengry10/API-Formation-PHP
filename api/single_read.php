<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../formations.php';
$database = new Database();
$db = $database->getConnection();
$item = new Formation($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleFormation();
if($item->name != null){

// create array
$emp_arr = array(
"id" => $item->id,
"name" => $item->name,
"startDate" => $item->startDate,
"endDate" => $item->endDate,
"maxParticipant" => $item->maxParticipant,
"participant" => $item->participant,
"priceEuro" => $item->priceEuro,
"created" => $item->created
);

http_response_code(200);
echo json_encode($emp_arr);
}
else{
http_response_code(404);
echo json_encode("Formation not found.");
}
?>