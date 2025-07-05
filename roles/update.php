<?php

// update.php

$id = $_POST['id'];
$name = $_POST['name'];
$value = $_POST['value'];

$db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '');
$stmt = $db->prepare("UPDATE roles SET name=:name, value=:value WHERE id=:id");
$stmt->execute([ 'name' => $name, 'value' => $value, 'id' => $id ]);

header('location: index.php');
