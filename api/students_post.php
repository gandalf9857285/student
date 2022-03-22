<?php 
$name = null;
$surname = null;
$id_group = 0;
$logo = null;

if (isset($_GET['name']) && isset($_GET['surname']) &&
isset ($_GET['id_group']) && isset($_GET['logo'])) {
$name = $_GET['name'];
$surname = $_GET['surname'];
$id_group = $_GET ['id_group'];
$logo = $_GET['logo'];
}
else {
	die ('<h1> Не передан параметр id </h1>');
}
$host = 'db';
$db_name = 'institut';
$db_user = 'root';
$db_pas = '123';
try {
	$db = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_pas);
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage();
	die();
}
$sql = "INSERT INTO `students` (`NAME`, SURNAME, ID_GROUP, LOGO) VALUES (:name, :surname, :id_group, :logo);";
$stmt= $db->prepare($sql);

$stmt->bindValue(":name", $name);
$stmt->bindValue(":surname", $surname);
$stmt->bindValue(":id_group", $id_group);
$stmt->bindValue(":logo", $logo);

$num = $stmt->execute();
echo "Добавление строк: ($num)";
?>