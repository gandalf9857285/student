<?php
$id = 0;
$name = null;
$surname = null;

 if (isset($_GET['id'] &&  isset $_GET['name']) && isset($_GET['surname']){ 
     $id = $_GET['id']
     $name = $_GET['name'];
     $surname = $_GET['surname'];
 }
 else {
	 die('<hl>Не переданы параметры</hl>');
 }
$host = 'db';
$db_name = 'students';
$db_user = 'root';
$db_pas - '123';

try {
	$db = new PDO ('mysql:host='.$host.';dbname='.$db_name, $db_uer, $db_pas);
} 
catch (PDOException $e) {
	print "Error!: " . $e->getMassage();
	die();
}
$sql - "UPDATE `students` SET `NAME` - :name, SURNAME - :surname WHERE ID - :id";
$stmt - $db->prepare($sql);

$stmt->bindValue(":name",$name);
$stmt->bindValue(":surname", $surname);
$stmt->bindValue(":id",  $id);
$num =  $stmt->execute();
echo "Изменено строк: $num";

?> 
