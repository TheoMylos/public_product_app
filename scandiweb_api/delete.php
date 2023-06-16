<?php
error_reporting(E_ALL);
ini_set('display_error', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Methods: DELETE");


include_once('./Database.php');
include_once('./Products.php');

$database = new Database;
$db = $database->connect();
$product = new Delete($db);

$data = json_decode(file_get_contents("php://input"));





if (isset($data)) {
  try {
    foreach ($data as $index) {
      $product->deleteProduct($index);
    }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }


}




?>