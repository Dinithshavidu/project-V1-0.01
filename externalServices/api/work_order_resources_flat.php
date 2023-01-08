<?php
require_once '_db.php';
    
$scheduler_groups = $db->query('SELECT * FROM groups ORDER BY name');

class Resource {}
$resources = array();

$stmt = $db->prepare('SELECT * FROM users ORDER BY name');
$stmt->execute();
$scheduler_resources = $stmt->fetchAll();

foreach($scheduler_resources as $resource) {
  $r = new Resource();
  $r->id = $resource['user_id'];
  $r->name = $resource['user_name'];
  $resources[] = $r;
}

header('Content-Type: application/json');
echo json_encode($resources);
