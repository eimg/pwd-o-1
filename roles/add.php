<?php

// add.php

$name = $_POST['name'];
$value = $_POST['value'];

$sql = "INSERT INTO roles (name, value) VALUES (:name, :value)";
echo $sql;

$db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '');
$statement = $db->prepare($sql);
$statement->execute(['name' => $name, 'value' => $value]);

header("location: index.php");
