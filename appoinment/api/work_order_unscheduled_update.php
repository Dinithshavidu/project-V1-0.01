<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$stmt = $db->prepare("UPDATE events SET name = :text, start = :start, end = :end, color = :color WHERE id = :id");
$stmt->bindParam(':id', $params->id);
$stmt->bindParam(':text', $params->text);
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->bindParam(':color', $params->color);
$stmt->execute();

class Result {}

$response = new Result();
$response->id = $params->id;
$response->text = $params->text;
$response->start = $params->start;
$response->end = $params->end;
$response->color = $params->color;

header('Content-Type: application/json');
echo json_encode($response);
