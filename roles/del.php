<?php

// del.php

$id = $_GET['id'];

$db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '');
$stmt = $db->prepare("DELETE FROM roles WHERE id = :id");
$stmt->execute(['id' => $id]);

header('location: index.php');
