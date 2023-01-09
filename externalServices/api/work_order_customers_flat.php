<?php
require_once '_db.php';
    
class Customer {}
$resources = array();

$stmt = $db->prepare('SELECT * FROM customers ORDER BY cust_name');
$stmt->execute();
$scheduler_resources = $stmt->fetchAll();

foreach($scheduler_resources as $customer) {
  $r = new Customer();
  $r->cust_id = $customer['cust_id'];
  $r->cust_name = $customer['cust_name'];
  $resources[] = $r;
}

header('Content-Type: application/json');
echo json_encode($resources);
