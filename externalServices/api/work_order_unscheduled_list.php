<?php
require_once '_db.php';

$result = db_get_unscheduled();

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id'];
  $e->text = $row['name'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $e->color = $row['color'];

  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);
