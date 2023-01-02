<?php
class Formation{
// dbection
private $db;
// Table
private $db_table = "formation";
// Columns
public $id;
public $name;
public $startDate;
public $endDate;
public $maxParticipant;
public $participant;
public $priceEuro;
public $created;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getFormations(){
$sqlQuery = "SELECT id, name, startDate, endDate, maxParticipant, participant, priceEuro, created FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createFormation(){
// sanitize
$this->name=htmlspecialchars(strip_tags($this->name));
$this->startDate=htmlspecialchars(strip_tags($this->startDate));
$this->endDate=htmlspecialchars(strip_tags($this->endDate));
$this->maxParticipant=htmlspecialchars(strip_tags($this->maxParticipant));
$this->participant=htmlspecialchars(strip_tags($this->participant));
$this->priceEuro=htmlspecialchars(strip_tags($this->priceEuro));
$this->created=htmlspecialchars(strip_tags($this->created));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET name = '".$this->name."',
startDate = '".$this->startDate."',
endDate = '".$this->endDate."',
maxParticipant = '".$this->maxParticipant."',
participant = '".$this->participant."',
priceEuro = '".$this->priceEuro."',created = '".$this->created."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleFormation(){
$sqlQuery = "SELECT id, name, startDate, endDate, maxParticipant, participant, priceEuro, created FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->name = $dataRow['name'];
$this->startDate = $dataRow['startDate'];
$this->endDate = $dataRow['endDate'];
$this->maxParticipant = $dataRow['maxParticipant'];
$this->participant = $dataRow['participant'];
$this->priceEuro = $dataRow['priceEuro'];
$this->created = $dataRow['created'];
}

// UPDATE
public function updateFormation(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->startDate=htmlspecialchars(strip_tags($this->startDate));
$this->endDate=htmlspecialchars(strip_tags($this->endDate));
$this->maxParticipant=htmlspecialchars(strip_tags($this->maxParticipant));
$this->participant=htmlspecialchars(strip_tags($this->participant));
$this->priceEuro=htmlspecialchars(strip_tags($this->priceEuro));
$this->created=htmlspecialchars(strip_tags($this->created));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
startDate = '".$this->startDate."',
endDate = '".$this->endDate."',
maxParticipant = '".$this->maxParticipant."',
participant = '".$this->participant."',
priceEuro = '".$this->priceEuro."',
participant = '".$this->participant."',
created = '".$this->created."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteFormation(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>