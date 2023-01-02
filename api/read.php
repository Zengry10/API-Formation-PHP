
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../formations.php';
$database = new Database();

$db = $database->getConnection();
$items = new Formation($db);
$records = $items->getFormations();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$formationArr = array();
$formationArr["body"] = array();
$formationArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($formationArr["body"], $row);
}
echo json_encode($formationArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>