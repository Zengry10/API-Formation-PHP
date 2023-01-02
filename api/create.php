
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


$item->name = $_GET['name'];
$item->startDate = $_GET['startDate'];
$item->endDate = $_GET['endDate'];
$item->maxParticipant = $_GET['maxParticipant'];
$item->participant = $_GET['participant'];
$item->priceEuro = $_GET['priceEuro'];
$item->created = date('Y-m-d H:i:s');
if($item->createFormation()){
echo 'Formation created successfully.';
} else{
echo 'Formation could not be created.';
}
?>