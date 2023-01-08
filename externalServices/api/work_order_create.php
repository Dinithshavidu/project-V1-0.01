<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$start = new DateTime($params->start);
$end = new DateTime($params->end);

$stmt = $db->prepare("INSERT INTO events (name, start, end, resource_id) VALUES (:name, :start, :end, :resource)");
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->bindParam(':name', $params->text);
$stmt->bindParam(':resource', $params->resource);
$stmt->execute();

class Result {}

$response = new Result();
$response->start = $params->start;
$response->end = $params->end;
$response->resource = $params->resource;
$response->text = $params->text;
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);
