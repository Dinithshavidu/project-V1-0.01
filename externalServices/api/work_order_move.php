<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

if (!isset($params->resource)) {

  $now = (new DateTime("now"))->format('Y-m-d H:i:s');

  $stmt = $db->prepare("UPDATE events SET resource_id = null, ordinal = :ordinal, ordinal_priority = :priority WHERE id = :id");
  $stmt->bindParam(':id', $params->id);
  $stmt->bindParam(':ordinal', $params->position);
  $stmt->bindParam(':priority', $now);
  $stmt->execute();
}
else {
  $stmt = $db->prepare("UPDATE events SET start = :start, end = :end, resource_id = :resource, ordinal = null, ordinal_priority = null WHERE id = :id");
  $stmt->bindParam(':id', $params->id);
  $stmt->bindParam(':start', $params->start);
  $stmt->bindParam(':end', $params->end);
  $stmt->bindParam(':resource', $params->resource);
  $stmt->execute();
}

db_compact_ordinals();

class Result {}

$response = $params;

header('Content-Type: application/json');
echo json_encode($response);
