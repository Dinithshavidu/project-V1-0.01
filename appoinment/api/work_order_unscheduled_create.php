<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$ordinal = db_get_max_ordinal() + 1;

$stmt = $db->prepare("INSERT INTO events (name, start, end, color, ordinal) VALUES (:name, :start, :end, :color, :ordinal)");
$stmt->bindParam(':name', $params->text);
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->bindParam(':color', $params->color);
$stmt->bindParam(':ordinal', $ordinal);
$stmt->execute();

db_compact_ordinals();

class Result {}

$response = new Result();
$response->start = $params->start;
$response->end = $params->end;
$response->text = $params->text;
$response->color = $params->color;
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);
