<?php

$host = 'db';
$db_name = 'institut';
$db_user = 'root';
$db_pas = '123';

try {
	$db = new PDO('mysql:localhost='.$host='.dbname='.$db_name, $db_user, $db_pas);
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage();
	die();
}

$stmt = $db->query("SELECT s.ID, s.SURNAME, s.NAME, g.TITLE FROM `students` AS s JOIN `groups` AS g ON s.ID_GROUP=g.ID;");

while ($row = $stmt->fetch()) {
	echo $row['SURNAME'] . '<br>';
}
echo '<table>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>фамилия</th>';
echo '<th>Имя</th>';
echo '<th>Группа</th>';
echo '</tr>';
while ($row = $stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['ID'].'</td>';
        echo '<td>'.$row['SURNAME'].'</td>';
	echo '<td>'.$row['NAME'].'</td>';
	echo '<td>'.$row['TITLE'].'</td>';
        echo '</tr>';
}


?>

