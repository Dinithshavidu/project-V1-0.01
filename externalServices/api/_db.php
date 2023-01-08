<?php

// use sqlite
// require_once '_db_sqlite.php';

// use MySQL
require_once '_db_mysql.php';


function db_get_max_ordinal() {
  global $db;
  $str = "SELECT max(ordinal) FROM events WHERE resource_id is null";
  $stmt = $db->prepare($str);
  $stmt->execute();
  return $stmt->fetchColumn(0) ?: 0;
}


function db_compact_ordinals() {
  $children = db_get_unscheduled();
  $size = count($children);
  for ($i = 0; $i < $size; $i++) {
    $row = $children[$i];
    db_update_ordinal($row["id"], $i);
  }
}

function db_update_ordinal($id, $ordinal) {
  global $db;

  $now = (new DateTime("now"))->format('Y-m-d H:i:s');

  $str = "UPDATE events SET ordinal = :ordinal, ordinal_priority = :priority WHERE id = :id";
  $stmt = $db->prepare($str);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":ordinal", $ordinal);
  $stmt->bindParam(":priority", $now);
  $stmt->execute();
}

function db_get_unscheduled() {
  global $db;

  $str = 'SELECT * FROM events WHERE resource_id is null ORDER BY ordinal, ordinal_priority desc';
  $stmt = $db->prepare($str);

  $stmt->execute();
  return $stmt->fetchAll();
}